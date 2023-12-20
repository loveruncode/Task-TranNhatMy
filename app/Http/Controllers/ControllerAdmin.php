<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ControllerAdmin extends Controller
{
     public function dangkyadmin(Request $request){

        $validator  = Validator::make($request->all(),[
            'username' => 'required|string|max:30|regex:/^[a-zA-Z0-9 ]+$/',
            'email' => 'required|string',
            'password' => 'required',
            'confirm_password' =>'required|same:passowrd',
     ],[
         'username.required' => "Khong duoc thieu username",
         'email.required' => 'Email khong duoc trong',
         'password' => 'password khong duoc bo trong',
         'confirm_password'=> 'Mat khau giong giong nhau hay vui long nhap lai',
     ]);

      $pas1 = $request->input('password');
      $pas2 = $request->input('confirm_password');
      $name = $request->input('username');
      $email = $request->input('email');
       if($pas1 !== $pas2){
        return redirect()->back()->withErrors($validator)->withInput();

       }

       $admin = new AdminModel();
       $admin->name = $name;
       $admin->email = $email;
       $admin->password = Hash::make($pas1);

       $admin->save();

       return redirect()->back()->with('success', 'Đăng Ký cho admin Thành Công');



     }

     public function loginAdmin(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    // Replace 'admins' with your actual table name
    $admin = DB::table('admin')->where('email', $email)->first();

    if ($admin && Hash::check($password, $admin->password)) {

        return redirect('/quanlypageAdmin')->with('success', 'Đăng Nhập Thành Công');
    } else {

        return redirect()->back()->with('error', 'Đăng nhập thất bại');
    }
}




}
