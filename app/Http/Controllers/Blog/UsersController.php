<?php
namespace cobates\Http\Controllers\Blog;
use cobates\Http\Controllers\Controller;
use cobates\Models\Blog\Category;
use cobates\Models\Blog\User;
use Validator;
use Input;
use Redirect;
use Session;
use View;
use Image;
use File;
use Auth;

class UsersController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		return View::make('blog.users.index')
			->with('users', User::orderBy('id')->paginate(20));
	}


	public function getSignin() {
		return View::make('blog.users.signin');
	}

	public function postSignin() {
		if(Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password') ))) {
			return Redirect::to('blog')->with('message','Thanks for signin in');
		}

		return Redirect::back()->with('message',Input::get('password'));
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->passes()) {
			$user = new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->display_name = Input::get('display_name');
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->save();

			return Redirect::to('users/signin')
				->with('message','Thank you for creating a new account, Please sign in');
		}

		return Redirect::to('users/newaccount')
			->with('message','Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function getSignout () {
		Auth::logout();
		return Redirect::to('blog/users/signin')->with('message','You have been Sign Out');
	}

}