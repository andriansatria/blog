<?php
namespace cobates\Models\Blog;

use cobates\Models\Blog\Category;
use cobates\Models\Blog\User;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Carbon\Carbon;

class Post extends Eloquent {
	
	protected $table = 'sb_posts';
	protected $fillable = array('title','article', 'img_banner', 'file', 'enabled', 'comments_enabled', 'post_date', 'views');

	public static $rules = array(
		'title'=>'required|min:3',
		'article'=> 'required|min:20',
		'post_date' => 'required|date'
	);

	public function scopeEnabled($query) {
		return $query->where('enabled','=','1')->where('post_date','<=',Carbon::now()->addHours(7))->orderBy('post_date', 'DESC');
	}

	public function scopeMinimum($query) {
		return $query->select(array('id','title','post_date','user_id'));
	}

	public function categories() {
		return $this->belongsToMany("cobates\Models\Blog\Category",'sb_post_to_cat', 'post_id', 'category_id');
	}

	public function users() {
		return $this->belongsTo('cobates\Models\Blog\User','user_id');
	}

	public function comments() {
		return $this->hasMany('cobates\Models\Blog\Comment');
	}

}