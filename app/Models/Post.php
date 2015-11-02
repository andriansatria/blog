<?php
namespace cobates\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Post extends Eloquent {
	
	protected $table = 'sb_posts';
	protected $fillable = array('title','article', 'img_banner', 'file', 'enabled', 'comments_enabled', 'post_date', 'views');

	public static $rules = array(
		'title'=>'required|min:3',
		'article'=> 'required|min:20',
	);

	public function categories() {
		return $this->belongsToMany('cobates\Models\Category');
	}
}