<?php namespace cobates\Http\Controllers;

use View;
use cobates\Models\Category;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	public function __construct() {
		$this->beforeFilter(function() {
			View::share('catnav', Category::all());
		});
	}

	use DispatchesCommands, ValidatesRequests;

}
