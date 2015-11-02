<?php
namespace cobates\Http\Controllers\Blog;
use cobates\Http\Controllers\Controller;
use cobates\Models\Blog\Comment;
use Validator;
use Input;
use Redirect;
use Session;
use View;

class CommentsController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		return View::make('blog.comments.index')
			->with('comments', Comment::orderBy('created_at','DESC')->paginate(10));
	}

	public function postUpdate() {
		$comment = Comment::find(Input::get('id'));

		if ($comment) {
			$comment->enabled = (Input::get('cm_enabled')==1) ? 1 : 0;
			$comment->save();
			return Redirect::back()->with('message','Comment Updated');
		}

		return Redirect::back()->with('message','Invalid Comment');
	}

	public function postDestroy() {
		$comment = Comment::find(Input::get('id'));

		if($comment) {
			$comment->delete();
			return Redirect::to('blog/admin/comments/index')
				->with('message', 'Comment Deleted');
		}

		return Redirect::to('blog/admin/comments/index')
			->with('message','Something went wrong, please try again');
	}
}