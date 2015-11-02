@extends('layouts.main')
<?php 
	$availability = new \cobates\Libs\Availability;
?>

@section('promo')
	<section id="promo">
		<div id="promo-details">
			<h1>Today's Deals</h1>
			<p>Checkout this section of<br />
			products at a discounted price.</p>
			<a href="#" class="default-btn">Shop Now</a>
		</div><!-- end promo-details -->
		{!!HTML::image('img/promo.png', 'Promotional Ad')!!}
	</section>
@stop

@section('content')
	<h2>New Products</h2>
	<hr>
    <div id="products">
    	@foreach($products as $product)
        <div class="product">
            <a href="store/view/{{$product->id}}">
             {!!HTML::image($product->image, $product->title, array('class' => 'feature', 'width'=>'240', 'height' => '127'))!!}
         	</a>

            <h3><a href="store/view/{{$product->id}}">{{$product->title}}</a></h3>

            <p>{{$product->description}}</p>

            <h5>Availability: 
	            <span class="{{$availability->displayClass($product->availability)}}">
	            	{{$availability->display($product->availability)}}
	            </span>
        	</h5>

            <p>
                <a href="#" class="cart-btn">
                    <span class="price">{{$product->price}}</span>
                    {!!HTML::image('img/white-cart.gif', 'Add to Cart')!!}
                      ADD TO CART
                </a>
            </p>
        </div><!-- end products -->
     @endforeach
   </div>
@stop