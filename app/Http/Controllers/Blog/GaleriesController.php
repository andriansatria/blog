<?php
namespace cobates\Http\Controllers\Blog;
use cobates\Http\Controllers\Controller;
use cobates\Models\Blog\Category;
use cobates\Models\Blog\Galery;
use Validator;
use Input;
use Redirect;
use Session;
use View;
use Image;
use File;

class GaleriesController extends Controller {

	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		return View::make('blog.galeries.index')
			->with('galeries', Galery::orderBy('id','DESC')->paginate(20));
	}


	public function postCreate() {

		
			$galery = new Galery;

			$ext = explode(".",basename($_FILES["path"]["name"]));

			if(end($ext) !== 'jpg' && end($ext) !== 'jpeg' && end($ext) !== 'gif' && end($ext) !== 'bmp' && end($ext) !== 'png' && end($ext) !== 'pdf' && end($ext) !== 'rar' && end($ext) !== 'zip') {
				return Redirect::back()
		           	->with('message','Your file is not supported, please input image, pdf or compressed file. your file is : '.end($ext))
		           	->withInput();
			}

			if ($_FILES["path"]["size"] > 500000) {
			    return Redirect::back()
		           	->with('message','Sorry your file is too large, max file to upload is 500kb')
		           	->withInput();
			} 

			$file = Input::file('path');



			
			$filename = date('d-H-i-s')."-".basename($_FILES["path"]["name"]); //manual upload without intervention


			if($file->move(public_path('/uploads/galeries/'.date('Y')), $filename))
		        {
		           // Image::make($file->getRealPath())->save($path);
					$galery->path = '/uploads/galeries/'.date('Y').'/'.$filename;
					$galery->save();

					return Redirect::back()
						->with('message','Galery Added')
						->with('galeries', Galery::orderBy('id','DESC')->paginate(20));
		        }
		        else
		        {
		           return Redirect::back()
		           	->with('message','Fail to upload data!')
		           	->withInput();
		        }    
			
		
		return Redirect::back()
			->with('message', 'Something wrong')
			->with('galeries', Galery::orderBy('id','DESC')->paginate(20))
			->withErrors($validator)
			->withInput();	
	}

	public function postDestroy() {
		$galery = Galery::find(Input::get('id'));

		if($galery) {
			File::delete(public_path($galery->path));
			$galery->delete();
			return Redirect::back()
				->with('message','Product Deleted');
		}

		return Redirect::back()
			->with('message','Something went wrong, please try again!');
	}

}