<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home(){
        if(session("id")){
            return redirect()->route("dashboard");
        }
        return view("welcome");
    }
    public function store(){
        request()->validate([
            'name' => 'required|min:3|max:30',
            'password' => "required",
            'email' => 'required|email'
        ]);
       $name =  request()->name;
      $password =  sha1(request()->password);
      $email = request()->email;
        $user = User::create(['name'=>$name,'password' => $password, "email" => $email]);
        session()->flash("login","now you can login");
        return redirect()->route("login");
    }


    public function check(){
        if(!session('id')){
        request()->validate([
          
            'password' => "required",
            'email' => 'required|email'
        ]);
     
      $password =  sha1(request()->password);
      $email = request()->email;
      $users = DB::select('select * from users where email = ? AND password = ? LIMIT 1', [$email,$password]);
     $count =  count($users);
     if($count > 0){
        foreach($users as $user){
            $id = $user->id;
           $name= $user->name;
        }
        session(['id' => $id]);
        session(['name' => $name]);
        session(['email' => $email]);
        $user = User::find(session('id'));
        return view("dashboard",compact('user'));
     }else{
        return back();
     }
    }else{
        $user = User::find(session('id'));
        return view("dashboard",compact('user'));
       
    }
    }

    public function logout(){
        
     session()->flush();
     return redirect("/");
     
    }

   
}
