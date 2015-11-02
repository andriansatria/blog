<?php namespace cobates\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Author extends Eloquent {

	protected $table='authors';
	protected $fillable = array('name','bio');


}
