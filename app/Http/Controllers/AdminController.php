<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class AdminController extends Controller
{
    //转入到登录界面
    public function  LoginIndex(){
        return view('login.login');
    }
//    验证登录逻辑
    public function  Login(Request $request){
//        规则验证
        $this->validate($request,[
            'name'=>'required|min:4|max:15',
            'password'=>'required|min:4|max:15'
        ]);
//        获取输入的名字和密码
        $name = $request->input('name');
        $password = $request->input('password');
//        如果没有用户，第一次输入就相当于注册了
        if(count(Member::where('rank','=','1')->get())==0){
            $member = new Member();
            $member->name = $name;
            $member->password = encrypt($password);
            $member->rank = 1;
            $member->save();
            session(['id'=>$member->id]);
//            返回主页
           return redirect('adminindex');
        }else{
            $member=Member::where('name','=',$name)->where('rank','=','1')->get();
            if(count($member)<=0){
                //用户名不存在
                echo "<script>alert('用户名不存在！')</script>";
                session(['id'=>'']);
                echo "<script> window.location.href=\" ".url("login")." \"; </script> ";
            }else {
                $member = $member->first();
                if($password == decrypt($member->password)){
                    //登记session
                    session(['id'=>$member->id]);
                    return redirect('adminindex');
                }else{
                    //密码错误
                    echo "<script>alert('密码错误！')</script>";
                    session(['id'=>'']);
                    echo "<script> window.location.href=\" ".url("login")." \"; </script> ";
                }
            }
        }
    }
//  进入管理员主页
    public function  AdminIndex(){
        return view('admin.index');
    }
//    退出注销账号
    public function  logout(){
        session(['id'=>'']);
        return view('login.login');
    }
}

