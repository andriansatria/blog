<?php
namespace cobates\Http\Controllers\Blog;
use cobates\Http\Controllers\Controller;
use cobates\Models\Blog\Post;
use cobates\Models\Blog\User;
use cobates\Models\Blog\Category;
use Validator;
use Input;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class PostsController extends Controller {
	public function __contruct() {
		$this->middleware('blogauth', ['except' => ['index','show']]);
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		$categories = array();

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		return View::make('blog.posts.index')
			->with('posts', Post::orderBy('id','DESC')->paginate(10))
			->with('categories', $categories)
			->with('i',0);
	}

	public function getNew() {
		$categories = array();

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		return View::make('blog.posts.new')
			->with('categories', $categories)
			->with('carbon', Carbon::now()->addHours(7));
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Post::$rules);

		if($validator->passes()) {
			$post = new Post;

			//$post->categories->category_id = Input::get('category_id');
			$post->title = Input::get('title');
			$post->user_id = '1';
			$post->article = Input::get('article');
			//separated header with content
			$head_article = explode('[break]', Input::get('article'));
			$post->head_article = $head_article[0];
			$post->img_banner = Input::get('img_banner');
			$post->file = Input::get('file');
			$post->enabled = (Input::get('enabled')==1) ? 1 : 0;
			$post->post_date = Carbon::createFromFormat('Y-n-d G:i:s', Input::get('post_date'));
			$post->save();
			foreach (Input::get('category_id') as $category_id) {
				$post->categories()->attach(array($category_id));
			} //multiple select input on many to many
			

			return Redirect::to('blog/admin/posts/index')
				->with('message', 'Post Created'.Input::get('post_date'));
		}

		return Redirect::to('blog/admin/posts/new')
			->with('message', 'Something wrong')
			->withErrors($validator)
			->withInput();	
	}

	public function getEdit($id) {
		$post = Post::find($id);

		$categories = array();

		$postcats = array();

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		

		if($post) {
			foreach ($post->categories as $postcat) {
			$postcats[$postcat->id] = $postcat->id;
		}
			return View::make('blog.posts.edit')
				->with('post', $post)
				->with('categories', $categories)
				->with('postcats', $postcats);
		}

	}



	public function postUpdate() {
		$validator = Validator::make(Input::all(), Post::$rules);

		if($validator->passes()) {
			$post = Post::find(Input::get('id'));
			$post->title = Input::get('title');
			$post->user_id = '1';
			$post->article = Input::get('article');
			//separated header with content
			$head_article = explode('[break]', Input::get('article'));
			$post->head_article = $head_article[0];
			$post->enabled = (Input::get('enabled')==1) ? 1 : 0;	
			$post->img_banner = Input::get('img_banner');
			$post->file = Input::get('file');
			$post->post_date = Carbon::createFromFormat('Y-n-d G:i:s', Input::get('post_date'));
			$post->save();
			$post->categories()->detach();
			foreach (Input::get('category_id') as $category_id) {
				$post->categories()->attach(array($category_id));
			} //multiple select input on many to many
			return Redirect::to('blog/admin/posts/index')
				->with('message', 'Post Updated');
		}
		return Redirect::back()
			->with('message', 'Something wrong')
			->withErrors($validator)
			->withInput();	
	}

	public function postDestroy() {
		$post = Post::find(Input::get('id'));

		if($post) {
			$post->delete();
			return Redirect::back()
				->with('message', 'Post Deleted');
		}

		return Redirect::back()
			->with('message','Something went wrong, please try again');
	}
}