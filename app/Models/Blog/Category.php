<?php
namespace cobates\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Carbon\Carbon;

class Category extends Eloquent {
	
	protected $table = 'sb_categories';
	protected $fillable = array('name','enabled','parent_id');

	public static $rules = array(
		'name'=>'required|min:3',
		'description'=>'max:50'
		);

	public function posts() {
		return $this->belongsToMany('cobates\Models\Blog\Post','sb_post_to_cat', 'category_id', 'post_id');
	}

	public function postsEnabled() {
		return $this->posts()->where('enabled','=','1')->where('post_date','<=',Carbon::now()->addHours(7));
	}
}