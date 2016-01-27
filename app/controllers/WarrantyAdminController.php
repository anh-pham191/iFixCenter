<?php

class WarrantyAdminController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin');
    }

    public function getIndex()
    {

//        $categories = array();
//
//        foreach(Category::all() as $category){
//            $categories[$category->id] = $category->name;
//        }
        $users = array();
        foreach (Warranty::all() as $warranty) {
            $user = User::where('id', '=', $warranty->user_id)->get()->first();
            $users[$warranty->user_id] = $user->email;
        }
        return View::make('warranties.index')
            ->with('warranties', Warranty::all())
            ->with('users', $users);
    }


    public function postDestroy()
    {
        $warranty = Warranty::find(Input::get('id'));

        if ($warranty) {
            $warranty->delete();
            return Redirect::to('admin/warranties')
                ->with('message', 'Request Deleted');
        }
        return Redirect::to('warranties')
            ->with('message', 'Something went wrong, please try again');
    }

    public function getView($id)
    {
        return View::make('warranties.view')
            ->with('warranty', Warranty::find($id));
    }


}