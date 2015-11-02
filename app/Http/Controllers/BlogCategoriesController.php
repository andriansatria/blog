<?
namespace cobates\Http\Controllers;

use cobates\Models\Blog\Category;
use Validator;
use Input;
use Redirect;
use Session;
use View;

class BlogCategoriesController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {
		return View::make('blog.categories.index')
			->with('categories', Category::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()) {
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('blog/admin/categories/index')
				->with('messsage', 'Category Created');
		}

		return Redirect::to('blog/admin/categories/index')
			->with('messsage', 'Something wrong')
			->withErrors($validator)
			->withInput();	
	}

	public function postDestroy() {
		$category = Category::find(input::get('id'));

		if($category) {
			$category->delete();
			return Redirect::to('blog/admin/categories/index')
				->with('messsage', 'Category Deleted');
		}

		return Redirect::to('blog/admin/categories/index')
			->with('messsage','Something went wrong, please try again');
	}
}

