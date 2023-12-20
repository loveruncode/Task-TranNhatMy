<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


     public function registerUser(Request $request){

            //   username
            //   email
            // password
         //  confirm_password
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

          $users = new User();
          $users->name = $name;
          $users->email = $email;
          $users->password = Hash::make($pas1);

          $users->save();

          return redirect()->back()->with('success', 'Đăng Ký Thành Công');

     }
     public function kiemtraUserlogin(Request $request){

            $cre =$request->only('email', 'password');

        if(Auth::attempt($cre)){

            return redirect()->route('bloguser')->with('success','Đăng Nhập Thành Công ');
        }else{

            return redirect()->back()->with('error', 'Đăng nhập thất bại');
        }

     }
     public function checkUserLoginStatus()
     {
         if (Auth::check()) {
             // Người dùng đã đăng nhập
             return "Đã đăng nhập";
         } else {
             // Người dùng chưa đăng nhập
             return redirect('/')->with('error', 'Hãy Vui Lòng Đăng Nhập');
         }
     }


}
