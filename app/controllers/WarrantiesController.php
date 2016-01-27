<?php

class WarrantiesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getIndex()
    {

        return View::make('warranty.index')
//            ->with('warranties', Warranty::all())
            ->with('warranties', Warranty::where('user_id','=',Auth::user()->id)->get())
            ->with('users', Auth::user()->id);
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), Warranty::$rules);

        if ($validator->passes()) {
            $warranty = new Warranty;
            $warranty->user_id = Auth::user()->id;
            $warranty->title = Input::get('title');
            $warranty->extra = Input::get('extra');
            $warranty->save();

            return Redirect::to('warranty/index')
                ->with('message', 'Warranty Request Sent');
        }

        return Redirect::to('warranty/index')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy()
    {
        $warranty = Warranty::find(Input::get('id'));

        if ($warranty) {
            $warranty->delete();
            return Redirect::to('warranty')
                ->with('message', 'Request Deleted');
        }
        return Redirect::to('warranty')
            ->with('message', 'Something went wrong, please try again');
    }


}