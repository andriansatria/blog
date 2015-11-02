<?php
namespace cobates\Http\Controllers\Book;
use cobates\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Session;
use View;
use Illuminate\Support\Str; //need for Str class below
use Response;


class BooksController extends Controller {
	
	public function getIndex() {
		return 
		"<h1>materi dari buku Laravel Aplication Development Cookbook</h1>
		<ul>
			<li><a href='/book/fileform'>fileform</a></li>
			<li><a href='/book/autocomplete'>autocomplete</a></li>
		</ul>";
	}

	public function getFileform() {
		 return View::make('book.fileform');
	}

	public function postFileform() {
	  $rules = array(
       	'myfile' => 'image'//membutuhkan phpfileinfo plugin untuk di aktifkan, pada hosting status biasanya nonaktif
	     );
	    $validation = Validator::make(Input::all(), $rules);

	    if($validation->fails()) {
	        return Redirect::to('fileform')->withErrors($validation)->withInput();
	    } 
	    else 
	    {
	        $file = Input::file('myfile');
		        if($file->move('uploads', 'newfilename-.jpg'))
		        {
		            return 'SUccess';
		        }
		        else
		        {
		            return 'Error';
		        }    
	    }
	}

	public function getAutocomplete() {
		return View::make('book.autocomplete');
	}

	public function getGetdata() {
		$term = Str::lower(Input::get('term'));
	    $data = array(
	    'R' => 'Red',
	    'O' => 'Orange',
	    'Y' => 'Yellow',
	    'G' => 'Green',
	    'B' => 'Blue',
	    'I' => 'Indigo',
	    'V' => 'Violet',
	    );
	    $return_array = array();
	    foreach ($data as $k => $v) {
	        if (strpos(Str::lower($v), $term) !== FALSE) {
	            $return_array[] = array('value' => $v, 'id' =>
	            $k);
	        }
	    }
	    return Response::json($return_array);
	}

}