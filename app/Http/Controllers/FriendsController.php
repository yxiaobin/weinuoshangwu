<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Ppt;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    //
    public  function  friendsindex(){
        $friends = Friend::where('status','=','0')->get();
        session(['tab'=>'1']);
        return view('friend.index', compact('friends'));
    }
    public  function  friendsstore(Request $request){
        $this->validate($request,[
            'image'=>'required'
        ]);
        $ppt = new Friend();
        $ppt->image = $request->file('image')->store('images');
        $ppt->status  = 0; //分类，0代表商务合作
        $ppt->save();

        return redirect('friends');
    }
    public  function  friendsdelete(Friend $id){
        $id->delete();
        return redirect('friends');
    }
//    友情链接管理
    public  function  friendlinkindex(){
        session(['tab'=>'1']);

        $friends = Friend::where('status','=','1')->get();
        return view('friend.linkindex', compact('friends'));
    }

    public  function  friendlinkstore(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ]);
        $ppt = new Friend();
        $ppt->link = $request->input('link');
        $ppt->name = $request->input('name');
        $ppt->status  = 1; //分类，1代表友情链接
        $ppt->save();
        return redirect('friendlink');
    }
    public  function  friendlinkdelete(Friend $id){
        $id->delete();
        return redirect('friendlink');
    }

//    信息修改
    public  function  friendinfoindex($id){
        session(['tab'=>'1']);

        $friend = Friend::find($id);
        return view('friend.linkedit', compact('friend'));
    }

    public  function  friendinfostore($id, Request $request){
        $ppt = Friend::find($id);
        $ppt->link = $request->input('link');
        $ppt->name = $request->input('name');
        $ppt->status  = 1; //分类，1代表友情链接
        $ppt->save();
        return redirect('friendlink');
    }
}
