<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\Que;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
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

Route::get('/', [Controller::class, 'home'])->name('login');


Route::get('/register', function () {
    
    return view('register');
})->name("register");
Route::get('/rightAns', function () {
    $ques = DB::select("SELECT * FROM `ques`");
    $ans = DB::select("SELECT answers.*,ques.* FROM answers JOIN ques ON ques.quesNo = answers.quesNo");
  return view("/rightAns",compact("ques","ans"));
})->name("rightAns");
Route::get('/profile', function () {
    $user = User::find(session('id'));
    return view('profile',compact('user'));
})->middleware("admin")->name("profile");

Route::put('/update/{id}', [UserController::class, 'update'])->middleware("admin")->name("update");


Route::post('/store', [Controller::class, 'store'])->name('storingdata');

Route::any('/dashboard', [Controller::class, 'check'])->name('dashboard');
Route::any('/logout', [Controller::class, 'logout'])->middleware("admin")->name('logout');
////////////////////

Route::get('/ajax', function () {
    $que = Que::all();
    $ans = Answer::all();
    $counter = 1;
    foreach ($que as $item){
        if($item->quesNo == 1){
   echo ' <div data-test = '. $item->id .' class="test active">';
        }else{
            echo ' <div data-test = '. $item->id .' class="test">';
        }
    echo ' <h1>Question '. $counter .' of 5 </h1>
   

    <h4>
    Ques '. $item->quesNo .':'. $item->ques .'</h4>
    <form>
    
       ';
       $counter++;
       foreach($ans as $item2){
        if($item2->quesNo == $item->quesNo){
            if($item2->rightAns == 1){
        echo '
        <div class="form-group">
        <input value="'.$item2->ans.'" type="radio" data-id="1" name="ans'. $item->quesNo .'"/> '. $item2->ans .'

        </div>
        ';
        }else{
            echo '
            <div class="form-group">
            <input value="'.$item2->ans.'" type="radio" data-id="0" name="ans'. $item->quesNo .'"/> '. $item2->ans .'
    
            </div>
            ';  
        }
    }
       }
       echo '
    </form>
    <button class="next20" >next </button>
    </div>
   
    ';
  
    ;
    }
   
})->name("ajax");
////////////////admin routes////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware(['admin2'])->group(function () {
    Route::get("/admin/login",function(){
        if(!session('idadmin')){
        return view('admin.dash');
        }else{
            return view('admin.entered');
        }
    })->name('admin1');

    Route::any('/admin/dashboard', [AdminController::class, 'login'])->name('check2');
   Route::get('/admin/logout',  [AdminController::class, 'logout'])->name('adminlogout');
   Route::get('/admin/manageusers', function () {
       $users = User::where("status",0)->get();
       return view("admin.manageusers",compact('users'));
   })->name('manageusers');
   /////////////////////////////////////////////////////////////////////////////////////////
   Route::delete('/admin/deletemember/{id}', [AdminController::class, 'delete'])->name("deletemember");
   /////////add question view //////////////////////////////////////////////
   Route::get('/admin/add',function(){
    /// getting the last recored
    $que = DB::select("SELECT * FROM `ques` ORDER BY quesNo DESC LIMIT 1");
    foreach($que as $item){
        $num =  $item->quesNo;
    }
    return view('admin.add',compact('num'));
   })->name('addque');
   //////taking data and inserting it to database
   Route::post('/admin/addque',[AdminController::class, 'addque'] )->name('addque2');
   /////////////////////////////////////////////////
   Route::get('/admin/quelist',function(){
    /// getting the last recored
    $que = DB::select("SELECT * FROM `ques` ");
   
    return view('admin.que',compact('que'));
})->name('quelist');
//////////////
Route::delete('/admin/deleteque/{id}', [AdminController::class, 'deleteque'])->name("deleteque");
});