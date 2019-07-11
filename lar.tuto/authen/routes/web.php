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
 * phải có tiền tố admin trên URL khi vào admin.gom nhóm
 * Gom nhóm các route  cho phần admin group()
 */
//
Route::prefix('admin')->group(function (){

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
     * METHOD : GET
     * URL authen.com/admin/login
     * Route trả về view đăng nhập admin
     */
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * METHOD : POST
     * Route xử lý quá trình đăng nhập admin
     * URL authen.com/admin/login
     */
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * METHOD : POST
     * URL authen.com/admin/logout
     * ROute xử lú quá trình đăng xuất ADmin
     */

    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});



/**
 * Route cho các nhà cung cấp sản phẩm SELLER
 */
Route::prefix('seller')->group( function (){

    /**
     *  URL authen.com/seller/
     * Route mặc định của phần seller
     */
    Route::get('/', 'SellerController@index')-> name('seller.dashboard'); // class Admincontroller phương thức index

    /**
     * URL authen.com/seller/dashboard
     * Route đăng nhập seller thành công
     */
    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL authen.com/seller/register
     * Route trả về view dùng để đăng ký tài khoản seller
     */
    Route::get('register','SellerController@create')->name('seller.register');

    /**
     * Xử lý dữ liệu đăng ký seller
     * URL athen.com/seller/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 seller từ form POST
     */
    Route::post('register','SellerController@store')->name('seller.register.store');

    /**
     * METHOD : GET
     * URL authen.com/seller/login
     * Route trả về view đăng nhập seller
     */
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * METHOD : POST
     * Route xử lý quá trình đăng nhập seller
     * URL authen.com/seller/login
     */
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * METHOD : POST
     * URL authen.com/seller/logout
     * ROute xử lú quá trình đăng xuất seller
     */

    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});


/**
 * Route cho các nhà vận chuyển SHIPPER
 */
Route::prefix('shipper')->group( function (){

    /**
     *  URL authen.com/shipper/
     * Route mặc định của phần shipper
     */
    Route::get('/', 'ShipperController@index')-> name('shipper.dashboard'); // class Admincontroller phương thức index

    /**
     * URL authen.com/shipper/dashboard
     * Route đăng nhập shipper thành công
     */
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL authen.com/shipper/register
     * Route trả về view dùng để đăng ký tài khoản shipper
     */
    Route::get('register','ShipperController@create')->name('shipper.register');

    /**
     * Xử lý dữ liệu đăng ký shipper
     * URL athen.com/shipper/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 shipper từ form POST
     */
    Route::post('register','ShipperController@store')->name('shipper.register.store');

    /**
     * METHOD : GET
     * URL authen.com/shipper/login
     * Route trả về view đăng nhập shipper
     */
    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * METHOD : POST
     * Route xử lý quá trình đăng nhập Shipper
     * URL authen.com/shipper/login
     */
    Route::post('login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    /**
     * METHOD : POST
     * URL authen.com/shipper/logout
     * ROute xử lú quá trình đăng xuất shipper
     */

    Route::post('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});
