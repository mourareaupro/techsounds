<?php

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

use Illuminate\Support\Facades\Storage;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

//Subscription plans
Route::get('/plans', 'PlanController@index')->name('plans.index');
Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');

//backoffice
Route::middleware ('admin')->group (function () {

    Route::get('/admin' , 'AdminController@index')->name('admin.dashboard');
    Route::get('/admin/orders' ,  'AdminOrderController@index')->name('admin.orders');

    Route::get('/admin/products' ,  'AdminProductController@index')->name('admin.products');
    Route::get('/admin/new/product' ,  'AdminProductController@create')->name('admin.new.product');
    Route::post('/admin/store/product' ,  'AdminProductController@store')->name('admin.store.product');
    Route::get('/admin/edit/product/{slug}' ,  'AdminProductController@edit')->name('admin.edit.product');
    Route::post('/admin/update/product/{id}' ,  'AdminProductController@update')->name('admin.udpate.product');
    Route::post('/admin/update/product/image/{id}' ,  'AdminProductController@update')->name('admin.udpate.product.image');

    Route::get('/admin/posts' ,  'AdminPostController@index')->name('admin.posts');
    Route::get('/admin/new/post' ,  'AdminPostController@create')->name('admin.new.post');
    Route::get('/admin/edit/post/{slug}' ,  'AdminPostController@edit')->name('admin.edit.post');

    Route::get('/admin/users' ,  'AdminUserController@index')->name('admin.users');
    Route::get('/admin/user/{id}' ,  'AdminUserController@show')->name('admin.show.user');

    Route::name ('maintenance.')->prefix('maintenance')->group(function () {
        Route::name ('index')->get ('/', 'AdminController@editMaintenance');
        Route::name ('update')->put ('/', 'AdminController@updateMaintenance');
    });
});


//Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
//Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/delete/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

//Coupon
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');


//Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');
Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

//facebook login
Route::get('/facebook/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/facebook/callback', 'SocialAuthFacebookController@callback');


Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('profile.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('profile.update');
    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-downloads', 'OrdersController@downloads')->name('orders.downloads');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
    Route::get('/my-orders/invoice/{order}', 'OrdersController@invoicePDF')->name('orders.invoice');
});

//Product
Route::get('products' , 'ProductController@index')->name('product.index');
Route::get('products/samples' , 'ProductController@indexSamples')->name('product.samples');
Route::get('products/synths' , 'ProductController@indexSynths')->name('product.synths');
Route::get('products/courses' , 'ProductController@indexCourses')->name('product.courses');
Route::get('products/templates' , 'ProductController@indexTemplates')->name('product.templates');


Route::get('product/{slug}' , 'ProductController@show')->name('product.show');
Route::get('download/{product}' , 'ProductController@download')->name('product.download');
Route::get('ajax/product/{id}' , 'ProductController@getAjaxProduct');


//Free download
Route::get('free-download/{product}' , 'ProductController@freeDownload')->name('product.free')->middleware('auth');

//Blog
Route::get('blog' , 'PostController@index')->name('blog.index');
Route::get('blog/{slug}' , 'PostController@show')->name('post.show');

//Services
Route::get('services' , 'ServicesController@index')->name('services.index');

//Newsletter
Route::post('subscribe-newsletter' , 'NewsletterController@store')->name('newsletter.store');

//Privacy
Route::get('privacy', function () {
    return 'Hello World';
});
