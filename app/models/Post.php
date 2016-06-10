<?php

class Post extends Eloquent {

    protected $table = 'posts';

    protected $fillable = array('user_id','title','content');

    public function user(){
        return $this->belongsTo('User');
    }

    public static function validate($input){

        $rules = array(
            'title'=>'required|min:3|max:50', //|unique:posts ?
            'content'=>'required|min:3|max:1000'
        );

        return Validator::make($input,$rules);
    }
}