<?php
namespace DentalCalculator\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;






class AdminController extends Controller
{    



   public function __construct(){

    $this->middleware('auth');
   }


   public function changePassword(){


    return view('admin.changepassword');
   }


   public function updatePassword(){

   $now_password  = Input::get('password');
   $user = Auth::user();
   $user->password=bcrypt($now_password);
   $user->save();
   return redirect()->back()->with("success","Password changed successfully !");


   



 



   }



}