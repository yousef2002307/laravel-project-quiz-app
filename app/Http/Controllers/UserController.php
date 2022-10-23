<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function update($id, Request $request){
        
        if($request->password == null){
          $post = User::find($id);
          $post->update(['username' => $request->username,'email' => $request->email]);
          session(['name' => $request->username]);
        session(['email' => $request->email]);
        session()->flash('updmsg',"your account has been updated");
          return back();
        }else{
          $post = User::find($id);
          $post->update(['username' => $request->username,'email' => $request->email,"password" => sha1($request->password)]);
          session(['name' => $request->username]);
          session(['email' => $request->email]);
          session()->flash('updmsg',"your account has been updated");
          return back();
        }
      }
}
