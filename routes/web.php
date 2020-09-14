<?php


use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('articles', ArticleController::class);
/*Route::resource('articles', 'ArticleController@index')->name('articles');*/
Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
    Route::get('/stripe', 'StripePaymentController@stripe')->name('stripe.index');

    Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

    Route::get('/articles', 'ArticleController@create')->name('articles');
    Route::get('/', 'ArticleController@index')->name('articles.index');

    Route::post('/charge', 'CheckoutController@charge');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
