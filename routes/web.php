<?php

$front_img_path ='http://localhost/foodie/storage/app/';
View::share(['front_img_path'=>$front_img_path]);

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/order', 'HomeController@order')->name('order');
Route::get('menu/{menu}', 'HomeController@menu')->name('menu');

Route::get('/cart', 'Users\CartController@cart')->name('cart');
Route::post('/add-cart', 'Users\CartController@addCart')->name('cart.add');
Route::post('/delete-cart', 'Users\CartController@deleteItem')->name('cart.delete');
Route::post('/update-cart', 'Users\CartController@updateCart')->name('cart.update');

Route::post('/cart-checkout', 'Users\CheckoutController@order')->name('cart.checkout');
Route::get('user/orders',"Users\CheckoutController@userOrders")->name('my-orders');
Route::post('/order/save', 'Users\CheckoutController@saveOrder')->name('save.order');
Route::post('/order/{orderId}/delete', 'Users\CheckoutController@deleteOrder')->name('delete.order');


Route::get('/order/{orderId}/pay', 'Users\CheckoutController@editOrder')->name('update.order');
Route::post('/order/{orderId}/pay', 'Users\CheckoutController@updateOrder');

Route::post('/order/pay', 'PaymentController@makePayment')->name('pay');


Route::get('/payment/callback','PaymentController@handlePaymentCallback');

Route::get('admin/dashboard',function(){
    return view('dashboard.index');
})->name('admin.dashboard');

Route::namespace('Admin')->group(function(){

    Route::resource('admin/menus','MenuController');
    Route::resource('admin/foods','FoodController');
    Route::get('admin/orders','OrderController@index')->name('orders.index');
    Route::get('admin/orders/{id}','OrderController@detail')->name('order.detail');

    Route::post('admin/foods/offer','FoodController@createDiscount')->name('food.offer');
    Route::get('admin/offers','FoodController@specialOffers')->name('food.offers');
    Route::delete('admin/offers/destroy','FoodController@deleteOffer')->name('offer.destroy');




});
