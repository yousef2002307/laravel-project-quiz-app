<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Que;

use App\Models\Answer;
class AdminController extends Controller
{
    public function login(Request $request){
     
        $validated = $request->validate([
            'adminUser' => 'required',
            'adminPass' => 'required',
        ]);
       $adminname = $request->adminUser;
       $adminpass = $request->adminPass;
       $useremail = User::whereEmail($adminname)->where('id',session('id'))->get();
       $userpass = User::wherePassword(sha1($adminpass))->where('id',session('id'))->get();
       
     if(count($useremail) > 0  && count($userpass)>0){
        session(['idadmin' => $useremail[0]->id]);
       return view('admin.entered');
    
     }else{
        session()->flash('adminwronginfo' , "you provided wrong login info ");
        return back();
    }
     
      
    }
    public function logout(){
        
        session()->forget('idadmin');
        return redirect("/admin/login");
        
       }
   
       public function delete($id){
        $deleteduser = User::find($id);
        $deleteduser->delete();
      
        return back();
        
       }
   //////////////
   public function deleteque($id){
    $deleteduser = Que::find($id);
    $deleteduser->delete();
  
    return back();
    
   }

   ///////////////
   public function addque(Request $request){
    
    $que1 = $request->ques;
    $num = $request->quesNo;
    $ans1 = $request->ans1;
    $ans2 = $request->ans2;
    $ans3 = $request->ans3;
    $ans4 = $request->ans4;
    $rightans = $request->rightAns;
    Que::create(['quesNo' => $num,'ques' => $que1]);
    
 
    for($i = 1; $i < 5; $i++){
        if($rightans == $i){
            if($i==1){
                Answer::create(['quesNo' => $num,'rightAns' => 1,'ans'=>$ans1]);
            }elseif($i == 2){
                Answer::create(['quesNo' => $num,'rightAns' => 1,'ans'=>$ans2]);
            }elseif($i == 3){
                Answer::create(['quesNo' => $num,'rightAns' => 1,'ans'=>$ans3]);
            }else{
                Answer::create(['quesNo' => $num,'rightAns' => 1,'ans'=>$ans4]);
            }
           
        }else{
            if($i==1){
                Answer::create(['quesNo' => $num,'rightAns' => 0,'ans'=>$ans1]);
            }elseif($i == 2){
                Answer::create(['quesNo' => $num,'rightAns' => 0,'ans'=>$ans2]);
            }elseif($i == 3){
                Answer::create(['quesNo' => $num,'rightAns' => 0,'ans'=>$ans3]);
            }else{
                Answer::create(['quesNo' => $num,'rightAns' => 0,'ans'=>$ans4]);
            }
        }
    }
    return back();
   }
}
