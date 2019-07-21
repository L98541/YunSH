<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CharmController extends Controller
{
     public function username(){
         $data=$_POST['name'];
         $date=count(DB::table('users')->where('username','=',$data)->first());
        //  return $date;
         if($date == 1){
             echo 1;
         }else{
             echo 2;
         }
    // return $data;
     }
     public function phone(){
         $data=$_POST['phone'];
         $date=count(DB::table('users')->where('phone','=',$data)->first());
         if($date == 1){
             echo 1;
         }else{
             echo 2;
         }
        //  return $data;
     }
    public function phoneedit(){
        $data = $_POST['phone'];
        $date=count(DB::table('users')->where('phone','=',$data)->first());
        if($date == 1){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function usernameedityz(){
        $data =$_POST['name'];
        $date= count(DB::table('users')->where('username','=',$data)->first());
        if($date == 1){
            echo 1;
        }else{
            echo 2;
        }
    }
}
