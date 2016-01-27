<?php

class UsersController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin', array('only' =>
            array('getIndex')));
    }

    public function getNewaccount()
    {
        return View::make('users.newaccount');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->telephone = Input::get('telephone');
            $user->save();

            return Redirect::to('users/signin')
                ->with('message', 'Thank you for creating a new account. Please sign in.');
        }

        return Redirect::to('users/newaccount')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function getSignin()
    {
        return View::make('users.signin');
    }

    public function postSignin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            if (Auth::user()->admin == 2) {
                return Redirect::to('/')->with('message', 'You have been banned');
            }
            return Redirect::to('/')->with('message', 'Thanks for signing in');
        }


        return Redirect::to('users/signin')->with('message', 'Your email/password combo was incorrect');
    }

    public function getSignout()
    {
        Auth::logout();
        return Redirect::to('users/signin')->with('message', 'You have been signed out');
    }

    public function getIndex()
    {
        return View::make('users.index')
//            ->with('users', User::all()->orderBy('admin', 'DESC'));
            ->with('users', User::orderBy('created_at', 'DESC')->get());

    }


    public function postDestroy()
    {
        $user = User::find(Input::get('id'));

        if ($user) {
            $user->delete();
            return Redirect::to('users')
                ->with('message', 'User Deleted');
        }
        return Redirect::to('users')
            ->with('message', 'Something went wrong, please try again');
    }

    public function postBan()
    {
        $user = User::find(Input::get('id'));
        $user->admin = 2;
        $user->save();
        return Redirect::to('users')
            ->with('message', 'User Banned');
    }

    public function postUnban()
    {
        $user = User::find(Input::get('id'));
        $user->admin = 0;
        $user->save();
        return Redirect::to('users')
            ->with('message', 'User Unbanned');
    }

    public function getProfile()
    {
        return View::make('users.profile')
            ->with('users', Auth::user());
    }

    public function postEdit()
    {
        $user = Auth::user();

        if ($user->update(Input::all())) {
            return Redirect::to('users/profile')
                ->with('message', 'Your Account was updated successfully');
        }

    }
}