<?php

namespace cobates\Http\Controllers\json;

use cobates\Http\Controllers\Controller;

use cobates\Models\Blog\Post;
use Validator;
use Input;
use Redirect;
use Session;
use View;

class JsonController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		return View::make('json.index');
	}

	public function getData() {
		$posts = Post::minimum()->get();
		$json = '{"records" : '.json_encode(Post::minimum()->with('categories')->with('users')->take(2)->get()).'}'; /*this how to make json formated for table relation*/
		return $json;
	}
}

