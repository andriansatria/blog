<?php 
namespace cobates\Http\Controllers;

use cobates\Models\Author;
use Input;
use Redirect;
use Session;

class Authors extends Controller {
	
	public $restful = true;
	public function index() {
		return View('authors.index')
			->with('title','Caracter and Bio')
			->with('authors',Author::orderBy('name')->get());
	}

	public function view($id) {
		return View('authors.view')
			->with('title','Author View Page')
			->with('author',Author::find($id));
	}

	public function add() {
		return View('authors.new')
			->with('title','Add New Actor');
	}

	public function create() {
		Author::create(array(
			'name'=>Input::get('name'),
			'bio'=>Input::get('bio')
		));
		return Redirect::to('authors')
			->with('message','The Char was created succesfully!');
	}
}

?>