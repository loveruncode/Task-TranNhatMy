<?php

use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

///// view
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function(){

    return view ('register');
});

Route::get('/admin', function(){

    return view ('Blogadmin.LoginAdmin');

});

Route::get('/registeradmin', function(){


    return view ('Blogadmin.RegisterAdmin');
});




Route::get('/usersBlog',[UserController::class,'checkUserLoginStatus'])->name('bloguser');

Route::get('/quanlypageAdmin', function(){

    return view ('Blogadmin.AdminQL');
})->name('quanlypageadmin');


Route::get('/addPost', function(){

    return view ('Blogadmin.addPost');
});


Route::get('/update/{id}',[PostController::class, 'update']);

/////



// login user
Route::post('/loginuser', [UserController::class, 'kiemtraUserlogin']);

// login admin

Route::post('/quanlypage', [ControllerAdmin::class, 'loginAdmin']);

 ///dang ky user

 Route::post('/dangkyuser', [UserController::class, 'registerUser']);


// dang ky admin

Route::post('/dangkyadmin', [ControllerAdmin::class, 'dangkyadmin']);



//get value for adminQL

Route::get('/quanlypageAdmin',[PostController::class, 'index']);



///// add POST  BLogs


Route::post('/insertPost', [PostController::class, 'insertPost']);


//// get value qua ben AdminQL


Route::post('/deletePost/{id}', [PostController::class, 'delete']);


/////
Route::post('/updateForm/{id}', [PostController::class, 'Updateform']);



Route::post('/deleteSelect', [PostController::class, 'deleteSelect']);
