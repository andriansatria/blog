<?php
namespace cobates\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class User extends Eloquent {
	
	protected $table = 'sb_users';
	protected $fillable = array('email','password','display_name','first_name','last_name','role_id');

	public static $rules = array(
		'email'		=> 'required|email|unique:users',
		'password'	=> 'required|alpha_num|between:6,12|confirmed',
		'password_confirmation' => 'required|between:6,12',
		'display_name'=>'required|min:3',
		);

	public function posts() {
		return $this->hasMany('cobates\Models\Blog\Post');
	}
}