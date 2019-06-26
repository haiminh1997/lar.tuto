<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Phương thức trả về view khi đăng nhập admin thành công
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin.dashboard');
    }

    /**
     * Được gọi đến trong view của file web.php
     * Phương thức trả về view để đăng ký tài khoản admin
     */
    public function create(){
        return view('admin.auth.register');
    }
    /**
     * Được gọi đến trong xử lý dữ liệu của file web.php
     * request lấy tất cả dữ liệu đc gửi đi
     */
    public function store(Request $request){
        // validate dữ liệu được gửi từ form(điều kiện của các trường dữ liệu)
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        // Khởi tạo model để lưu admin mới
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password=  bcrypt($request->password) ;
        $adminModel->save();

        //@todo
        return redirect()->route();

    }
}
