<?php

class Feedback extends Eloquent{

    protected  $fillable = array('title', 'body','published_at', 'user_id');

    protected $dates = ['published_at'];

    public static $rules = array('title'=>'required|min:3', 'body'=> 'required|min:6');

    public function user()
    {
        return $this->belongsTo('User');
    }
}