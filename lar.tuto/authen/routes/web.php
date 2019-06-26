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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 *Route cho adminstrater
 */
// phải có tiền tố admin trên URL khi vào admin.gom nhóm
Route::prefix('admin')->group(function (){
// Gom nhóm các route  cho phần admin

    /**
     *  URL authen.com/admin/
     * Route mặc định của phần admin
     */
    Route::get('/', 'AdminController@index')-> name('admin.dashboard'); // class Admincontroller phương thức index

    /**
     * URL authen.com/admin/dashboard
     * Route đăng nhập admin thành công
     */
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL authen.com/admin/register
     * Route trả về view dùng để đăng ký tài khoản
     */
    Route::get('register','AdminController@create')->name('admin.register');

    /**
     * Xử lý dữ liệu đăng ký admin
     * URL athen.com/admin/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 admin từ form POST
     */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /**
     * Route trả về view đăng nhập admin
     */
    /**
     * Route xử lý quá trình đăng nhập admin
     *
     */

});
