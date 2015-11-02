<?php
namespace cobates\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Comment extends Eloquent {
	
	protected $table = 'sb_comments';
	protected $fillable = array('comment','user','email','reply_from_id');

	public static $rules = array(
		'comment'=>'required|min:10|max:200',
		'user'=>'required|min:3|alphanum',
		'email'=>'required|email');

	public function posts() {
		return $this->belongsTo('cobates\Models\Blog\Post','post_id');
	}

	public function replies() {
		return $this->hasMany('cobates\Models\Blog\Comment','reply_from_id');
	}

	public function scopeEnabled($query) {
		return $query->where('enabled','=','1');
	}
}