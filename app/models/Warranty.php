<?php


class Warranty extends Eloquent{

    protected  $fillable = array('category_id', 'title', 'extra');

    public static $rules=array(
        'title'=>'required|min:2',
        'extra'=>'required|min:5',
    );
    public function category(){
        return $this->belongsTo('Category');
    }

    public function user(){
        return $this->belongsTo('User');
    }
}