<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // 管理员 的 增删改查模块
    public function  memberindex(){
        session(['tab'=>1 ]);
        $members = Member::where('rank','=','1')->get();
        return  view('member.index', compact('members'));
    }
    public function  memberstore(Request $request){
        $this->validate($request,[
            'usr_name'=>'required',
            'name'=>'required|min:4|max:15',
            'password'=>'confirmed|min:4|max:15'
        ]);
        $member = new Member();
        $member->username = $request->input('usr_name'); //用户名
        $member->name = $request->input('name');//账号
        $member->password = encrypt($request->input('password'));//密码
        $member->rank = 1;//标记状态 1为管理员
        $member->save();
        return redirect('memberadmin');
    }
    public  function  memberadmindelete(Member $id){
        $id->delete();
        return redirect('memberadmin');
    }


    //职员添加模块
    public function  membershowindex(){
        session(['tab'=>1 ]);
        $members = Member::where('rank','=','0')->get();
        return  view('member.zhiyuan', compact('members'));
    }
    public function  membershowstore(Request $request){
        session(['tab'=>2]);
        $this->validate($request,[
            'usr_name'=>'required',
            'company'=>'required',
            'job'=>'required',
            'motto'=>'required',
        ]);
        $member = new Member();
        $member->username = $request->input('usr_name'); //用户名
        $member->password = encrypt($request->input('password'));//密码
        $member->rank = 0;//标记状态 1为管理员 0为普通用户
        $member->motto = $request->input('motto');//格言
        $member->company = $request->input('company');//公司
        $member->job = $request->input('job');//职位
        if($request->file('image') != null){
            $member->image = $request->file('image')->store('images');//头像

        }
        $member->save();
        return redirect('membershow');
    }

    public  function  membershowdelete(Member $id){
        $id->delete();
        return redirect('membershow');
    }

//    信息修改
    public function  memberinfoindex($id){
        $member = Member::find($id);
        return view('member.info', compact('id','member'));
    }

    public function  memberinfostore($id,Request $request){
        session(['tab'=>2]);
        $this->validate($request,[
            'password'=>'sometimes|confirmed'
        ]);
        $member = Member::find($id) ;
        $member->username = $request->input('usr_name'); //用户名
        $member->password = encrypt($request->input('password'));//密码
        if($id != session('id')){
            $member->rank = 0;//标记状态 1为管理员 0为普通用户

        }
        $member->motto = $request->input('motto');//格言
        $member->company = $request->input('company');//公司
        $member->job = $request->input('job');//职位
        if($request->file('image') !=null){
            $member->image = $request->file('image')->store('images');//头像
        }
        $member->save();
        if($id != session('id')){
            return redirect('membershow');
        }else{
            return redirect('adminindex');
        }
    }
}
