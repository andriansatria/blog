<?php

namespace cobates\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Category extends Eloquent {
	protected $fillabel = array('name');

	public static $rules = array('name'=>'required|min:3');

	public  function products() {
		return $this->hasMany('Product');
	} 
}