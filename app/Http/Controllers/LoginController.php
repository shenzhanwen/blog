<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function add()
    {
        return view('login.add');
    }

    public function login()
    {
        $name = request()->name;
        $pwd = request()->pwd;
        $res = DB::table('login')->where('name',$name)->where('pwd',$pwd)->first();
        if($res){
            session(['id'=>$res->id]);
            return(['code'=>1]);
        }else{
            return(['code'=>2]);
        }
    }

    public function reg()
    {
        return view('login.reg');
    }

//     public function sendemail(){
//         $name =  request()->name;
//         // dd($u_email);
//         $this->send($name);
        
//     }
//     public function send($name){
//         $code=rand(1000,9999);
//         \Mail::raw("$code" ,function($message)use($name){
//         $message->subject("邮件标题");
//         $message->to($name);
//     });
// }

public function sendemail(){
    $name =  request()->name;
    // dd($u_email);
    if(strpos($name,'@') !=false){
        //youxiang
        $code=rand(1000,9999);
        $res=$this->sendMail1($name,$code);
        if(!$res){   
            session(['name'=>$name,'code'=>$code]);
              
            return ['code'=>1, 'res'=>'邮件发送成功'];
        }else{
            return ['code'=>0, 'res'=>'邮件发送失败'];
        }
    }
}

public function sendMail1($name,$code)
{
    \Mail::raw('你的验证码为'."$code".'哈哈哈',function ($message)use($name){
        $message->subject("...");
        $message->to($name);
    });
}
}
