<?php

class FeedbacksController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin', array('only' =>
        array('getIndex','getView')));
    }

    public function getIndex()
    {
        $users = array();
        foreach (Feedback::all() as $feedback) {
            $user = User::where('id', '=', $feedback->user_id)->get()->first();
            $users[$feedback->user_id] = $user->email;
        }
        return View::make('feedbacks.index')
            ->with('feedbacks', Feedback::all())
            ->with('users', $users);
    }

    public function formcreate()
    {
        return View::make('feedbacks.formcreate');
    }
    public function postCreate()
    {

        $validator = Validator::make(Input::all(), Feedback::$rules);

        if ($validator->passes()) {
            $feedback = new Feedback;
            $feedback->title = Input::get('title');
            $feedback->body = Input::get('body');
            $user = Auth::user();
            $feedback->user_id = $user->id;
            $feedback->save();

            return Redirect::to('feedbacks/index')
                ->with('message', 'Feedback Created');
        }

        return Redirect::to('feedbacks/formcreate')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy()
    {

        $feedback = Feedback::find(Input::get('id'));

        if ($feedback) {
            $feedback->delete();
            return Redirect::to('feedbacks/index')
                ->with('message', 'Feedback Deleted');
        }
        return Redirect::to('feedbacks/index')
            ->with('message', 'Something went wrong, please try again');
    }
    public function getView($id){
        return View::make('feedbacks.view')
            ->with('feedback', Feedback::find($id));
    }
}