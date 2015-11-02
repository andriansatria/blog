<?php
namespace cobates\Http\Controllers\Blog;
use cobates\Http\Controllers\Controller;
use cobates\Models\Blog\Category;
use cobates\Models\Blog\Post;
use cobates\Models\Blog\Comment;
use Validator;
use Input;
use Redirect;
use Session;
use View;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
class PagesController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		return View::make('blog.pages.index')
			->with('posts', Post::enabled()->simplePaginate(5))
			->with('lastposts', Post::enabled()->take(4)->get())
			->with('lastcomments', Comment::where('enabled','=','1')->take(4)->orderBy('created_at','DESC')->get())
			->with('categories', Category::all());
	}

	
	public function getArticle($id) {
		$post = Post::enabled()->find($id);
		$comments =  $post->comments()->where('enabled','=','1');
		
		$prev = Post::enabled()->minimum()->where('id', '<', $id)->orderBy('id','ASC')->take(1)->get();

    	$next = Post::enabled()->minimum()->where('id', '>', $id)->orderBy('id','DESC')->take(1)->get();



		return View::make('blog.pages.article')
			->with('post', $post)
			->with('comments', $comments)
			->with('preview', 0)
			->with('lastposts', Post::enabled()->minimum()->take(4)->get())
			->with('lastcomments', Comment::enabled()->take(4)->orderBy('created_at','DESC')->get())
			->with('categories', Category::all())
			->with('next', $next)
			->with('previous', $prev);
	}

	public function getPreview($id) {
		$this->callSidebar();
		$post = Post::find($id);
		$comments =  $post->comments()->where('enabled','=','1');

		return View::make('blog.pages.article')
			->with('post', $post)
			->with('comments', $comments)
			->with('preview', 1)
			->with('lastposts', Post::enabled()->minimum()->take(4)->get())
			->with('lastcomments', Comment::enabled()->take(4)->orderBy('created_at','DESC')->get())
			->with('categories', Category::all());
	}

	public function getSearch() {
		$keyword = Input::get('keyword');
		$posts = Post::where('enabled','=','1')->where('post_date','<=',Carbon::now())->where('title','LIKE', '%'.$keyword.'%')->orderBy('post_date', 'DESC');
		$count = $posts->count();

		$posts = $posts->paginate(5);
		$posts->appends(['keyword' => $keyword]); //add "keyword" to
		return View::make('blog.pages.search')
			->with('posts',$posts )
			->with('count', $count)
			->with('keyword',$keyword)
			->with('lastposts', Post::enabled()->minimum()->take(4)->get())
			->with('lastcomments', Comment::enabled()->take(4)->orderBy('created_at','DESC')->get())
			->with('categories', Category::all());
	}

	public function getCategory($id) {
		$category = Category::find($id);
		$posts = $category->posts()->where('enabled','=','1')->where('post_date','<=',Carbon::now())->orderBy('post_date', 'desc')->paginate(4);

		//here some example using manual DB select and make paginator with that
		//$posts = DB::select("SELECT p.id, p.title, p.article, p.created_at, p.head_article, c.name FROM sb_posts as p, sb_post_to_cat as pc, sb_categories as c  WHERE c.id = '3' AND c.id = pc.category_id AND pc.post_id = p.id");
		//$posts = new LengthAwarePaginator(array_slice($posts, 1, 4), $category->posts->count(), 4);
		
		return View::make('blog.pages.category')
			->with('posts', $posts)
			->with('category', $category)
			->with('lastposts', Post::enabled()->minimum()->take(4)->get())
			->with('lastcomments', Comment::enabled()->take(4)->orderBy('created_at','DESC')->get())
			->with('categories', Category::all());

	}

	public function postComments() {
		$validator = Validator::make(Input::all(), Comment::$rules);

		if($validator->passes()) {
			$comment = new Comment;
			$comment->post_id = Input::get('post_id');
			$comment->reply_from_id = Input::get('reply_from_id');
			$comment->user = Input::get('user');
			$comment->enabled = 0;
			$comment->email = Input::get('email');
			$comment->comment = Input::get('comment');
			$comment->save();

			return Redirect::back();
		}

		return Redirect::back()
			->withErrors($validator)
			->withInput();	
	}

	

}