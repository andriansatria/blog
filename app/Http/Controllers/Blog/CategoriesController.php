<?php
namespace cobates\Http\Controllers\Blog;
use cobates\Http\Controllers\Controller;
use cobates\Models\Blog\Category;
use Validator;
use Input;
use Redirect;
use Session;
use View;

class CategoriesController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		foreach (Category::orderBy('id')->get() as $parent) {
			$parents[$parent->id] = $parent->name;
		}

		return View::make('blog.categories.index')
			->with('categories', Category::orderBy('id')->paginate(10))
			->with('parents',$parents);
	}

	public function getEdit() {
		$category = Category::find(Input::get('id'));

		foreach (Category::orderBy('id')->get() as $parent) {
			$parents[$parent->id] = $parent->name;
		}
		return View::make('blog.categories.edit')
			->with('category',$category);
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()) {
			$category = new Category;
			$category->name = Input::get('name');
			$category->description = Input::get('description');
			$category->save();

			return Redirect::to('blog/admin/categories/index')
				->with('message', 'Category Created');
		}

		return Redirect::to('blog/admin/categories/index')
			->with('message', 'Something wrong')
			->withErrors($validator)
			->withInput();	
	}

	


	public function postUpdate() {
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()) {
			$category = Category::find(Input::get('id'));
			$category->name = Input::get('name');
			$category->description = Input::get('description');
			$category->save();

			return Redirect::to('/blog/admin/categories/index')
				->with('message', 'Category updated');
		}

		return Redirect::back()
			->with('message', 'Something wrong')
			->withErrors($validator)
			->withInput();	
	}	

	public function postDestroy() {
		$category = Category::find(input::get('id'));

		if($category) {
			$category->delete();
			return Redirect::to('/blog/admin/categories/index')
				->with('message', 'Category Deleted');
		}

		return Redirect::to('/blog/admin/categories/index')
			->with('message','Something went wrong, please try again');
	}

}