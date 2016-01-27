<?php

class MessagesController extends BaseController
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
        return View::make('messages.index')
            ->with('messages', Message::all());
    }

    public function formcreate()
    {
        return View::make('messages.formcreate');
    }
    public function postCreate()
    {

        $validator = Validator::make(Input::all(), Message::$rules);

        if ($validator->passes()) {
            $message = new Message;
            $message->title = Input::get('title');
            $message->body = Input::get('body');
            $message->save();

            return Redirect::to('messages/index')
                ->with('message', 'Feedback Created');
        }

        return Redirect::to('messages/formcreate')
            ->with('message', 'Something went wrong')
            ->withErrors($validator)
            ->withInput();
    }

    public function postDestroy()
    {

        $message = Message::find(Input::get('id'));

        if ($message) {
            $message->delete();
            return Redirect::to('messages/index')
                ->with('message', 'Feedback Deleted');
        }
        return Redirect::to('feedbacks/index')
            ->with('message', 'Something went wrong, please try again');
    }
    public function getView($id){
        return View::make('messages.view')
            ->with('message', Message::find($id));
    }
}