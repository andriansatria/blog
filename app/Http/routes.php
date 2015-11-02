<?php
use cobates\Models\Blog\Post;
use cobates\Models\Blog\Category;
use Illuminate\Support\Str; //need for Str class below
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controller('/json','Json\JsonController');
Route::controller('/angular','Angular\ProductApiController');


Route::get('/blog/tes',function()
{
    return "Halo, bro!";
});


Route::get('/halo-juga','SiteController@haloJuga');

Route::get('/authors',array('uses'=>'authors@index'));

Route::get('author/{id}',array('as' => 'author', 'uses'=>'authors@view'));

Route::get('authors/new', array('as'=>'new_author','uses'=>'authors@add'));

Route::post('authors/create', array('uses'=>'authors@create'));



//ecommerce
Route::get('/', array('uses'=>'storeController@getIndex'));
Route::get('index/', array('uses'=>'storeController@getIndex'));

Route::controllers([
	//'/admin/categories' => 'CategoriesController',
	'/admin/products'	=> 'ProductsController',
	'store'				=> 'StoreController',
	'users'				=> 'UsersController'

]);

$router->group(['middleware' => 'adminauth'], function($router)
{
     $router->controller('/admin/categories', 'CategoriesController');
      $router->controller('/admin/products', 'ProductsController');

});


//exception create comments
Route::post('/blog/admin/comments/create', 'Blog\CommentsController@postCreate' );
Route::controller('/blog/users','Blog\UsersController');

//blog route with authentication
$router->group(['middleware' => 'blogauth'], function($router)
{
    $router->controller('blog/admin/categories', 'Blog\CategoriesController');
    $router->controller('/blog/admin/posts','Blog\PostsController');
     $router->controller('/blog/admin/comments','Blog\CommentsController');
     $router->controller('/blog/admin/galeries','Blog\GaleriesController');

});
//blog route without authentication

Route::controller('/blog','Blog\PagesController');






/*
bisa juga menggunakan cara di atas
Route::controller('/admin/categories','CategoriesController');
Route::controller('/admin/products','ProductsController');
Route::controller('store','StoreController');
Route::controller('users','UsersController');*/
//Route::controller('/blog/admin/categories','Blog\CategoriesController');
//Route::controller('/blog/admin/posts','Blog\PostsController');
//Route::controller('/blog/admin/comments','Blog\CommentsController');
//Route::controller('/blog/admin/galeries','Blog\GaleriesController');


//new route for laravel application development cookbook


Route::controller('book', 'Book\BooksController');