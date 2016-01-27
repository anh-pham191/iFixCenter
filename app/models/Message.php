<?php

class Message extends Eloquent{

    protected  $fillable = array('title', 'body','published_at');

    protected $dates = ['published_at'];

    public static $rules = array('title'=>'required|min:3', 'body'=> 'required|min:6');

}