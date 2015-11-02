<?php
namespace cobates\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Galery extends Eloquent {
	
	protected $table = 'sb_galeries';
	protected $fillable = array('path','type','user_id');

	public static $rules = array(
		'path'=>'required'
		);

	public function posts() {
		return $this->belongsToMany('Post');
	}
}