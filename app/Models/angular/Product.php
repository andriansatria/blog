<?php
namespace cobates\Models\angular;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Product extends Eloquent {
	 protected $primaryKey = 'productId';
	protected $table = 'ng_product';
	protected $fillable = array('productName','productCode',
								'releaseDate', 'description', 
								'cost', 'price', 
								'category', 'tags', 
								'imageUrl');
}