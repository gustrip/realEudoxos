<?php

// AuthenticateUsers Changes

use Gloudemans\Shoppingcart\Facades\Cart;


Auth::routes();

Route::get('/', 'Frontend\FrontController@getHomepage')->name('homepage');

Route::get('books/all', 'Frontend\FrontController@allBooks')->name('all_books');
Route::get('books/bestSellers','Frontend\FrontController@bestSellers')->name('best_sellers');
Route::get('books/category/{id}','Frontend\FrontController@booksByCategory')->name('category_books');
Route::get('book/{id}', 'Frontend\FrontController@singleBook')->name('single_book');

// Front User Login
Route::get('/system/login', 'FrontUserController@generalLoginForm')->name('general_login_form');
Route::get('/fuser/logout', 'FrontUserController@logout')->name('user_logout');

Route::get('/system/register', 'FrontUserController@generalRegisterForm')->name('general_register_form');

Route::get('/verifyemail/{token}', 'FrontUserController@verify')->name('verify');

Route::prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::resource('book', 'BookController');

	Route::resource('category', 'CategoryController');

	Route::post('category/{id}/createsub','CategoryController@createSub');
	Route::post('category/{id}/storesub','CategoryController@storeSub');
	Route::delete('category/{id}/destroysub','CategoryController@destroySub');
	Route::get('category/{id}/editsub','CategoryController@editSub');
	Route::put('category/{id}/updatesub','CategoryController@updateSub');
	Route::get('category/{id}/bookShow','CategoryController@showBooks');


	Route::resource('users', 'UsersController');

	Route::get('users/{id}/show/student','UsersController@studentShow')->name('users.studentShow');
	Route::get('users/create/student','UsersController@studentCreate')->name('users.studentCreate');
	Route::post('users/store/student','UsersController@studentStore')->name('users.studentStore');
	Route::delete('users/{id}/student/destroy','UsersController@studentDestroy')->name('users.studentDestroy');
	Route::get('users/{id}/student/edit','UsersController@studentEdit')->name('users.studentEdit');
	Route::put('users/student/update','UsersController@studentUpdate')->name('users.studentUpdate');

	Route::get('users/{id}/history','UsersController@showHistory')->name('users.user.showhistory');
	Route::get('users/student/{id}/history','UsersController@studentShowHistory')->name('users.user.studentshowhistory');
	
	Route::get('battle/start','AdminController@startBattle')->name('battle.start');
	Route::get('battle/setLimit','AdminController@showSetLimit')->name('battle.showsetlimit');
	Route::post('battle/setLimit','AdminController@setLimit')->name('battle.setlimit');
	Route::get('battle/updateWeights','AdminController@updateWeights')->name('battle.updateWeights');
	Route::get('battle/restart','AdminController@restartBattle')->name('battle.restart');
	Route::get('battle/stop','AdminController@stopBattle')->name('battle.stop');
	Route::get('battle','AdminController@seeBattle')->name('battle.see');

});

Route::prefix('student')->group(function(){
	
	Route::get('/login', 'Student\StudentLoginController@showLoginForm')->name('student.login');
	Route::post('/login', 'Student\StudentLoginController@login')->name('student.login.submit');
	Route::post('/register','Student\StudentRegisterController@register')->name('student.register.submit');
	Route::get('/logout', 'Student\StudentLoginController@logout')->name('student_logout');
	
	Route::get('/verifyemail/{token}', 'Student\StudentRegisterController@verify')->name('student_verify');

	Route::get('/reset', 'Student\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
	Route::post('/email', 'Student\StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
	Route::get('/reset/{token}', 'Student\StudentResetPasswordController@showResetForm');
	Route::post('/reset', 'Student\StudentResetPasswordController@reset')->name('student.password.reset');

	Route::get('/universitiesbattle', 'Frontend\BattleController@getBattle')->name('battle');
});

Route::group(['prefix' => 'cart'], function(){
    Route::post('/add', 'Frontend\CartController@addItem')->name('add_to_cart');
    Route::get('/get', 'Frontend\CartController@getCurrentCart')->name('get_cart');
    Route::get('/get_test', 'Frontend\CartController@getCurrentCartTest')->name('get_cart_test');
    Route::get('/show', 'Frontend\CartController@showCart')->name('show_cart');
    Route::post('/clear', 'Frontend\CartController@clearCart')->name('clear_cart');
    Route::post('/deleteItem', 'Frontend\CartController@deleteCartItem')->name('delete_cart_item');
});

Route::group(['prefix' => 'order'], function() {
    Route::get('/all', 'Frontend\OrderController@getAllOrders')->name('all_orders');
    Route::post('/new', 'Frontend\OrderController@newOrder')->name('new_order');
});