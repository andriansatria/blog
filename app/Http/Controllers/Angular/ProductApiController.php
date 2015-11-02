<?php

namespace cobates\Http\Controllers\Angular;

use cobates\Http\Controllers\Controller;

use cobates\Models\Angular\Product;
use Validator;
use Input;
use Redirect;
use Session;
use View;

class ProductApiController extends Controller {
	public function __contruct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {

		return View::make('angular.index');
	}

	public function getData() {
		$product = Product::all(); 
		return $product;
	}

	public function getProduct($productId) {
		$product = Product::find($productId);
		return $product->toArray();
	}
}

