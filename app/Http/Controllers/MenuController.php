<?php

namespace App\Http\Controllers;

use App\Sidemenu;
use App\Topmunue;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //顶部导航栏列表
    public  function  topmenuindex(){
        $topmenus = Topmunue::orderby('num','asc')->get();
        return view("menu.topindex", compact('topmenus'));
    }
//新建导航栏
    public  function  newtopmenuindex(){

        return view("menu.newtop");
    }
    //存储导航栏
    public  function  newtopmenustore(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'link'=>'required'
        ]);
        $p = new Topmunue();

        $ps = Topmunue::all();
        $p->num = count($ps)+1;
        $p->name = $request->input('name');
        $p->link = $request->input('link');
        $p->save();
        return redirect('topmenu');
    }
//    二次编辑导航栏
    public  function  edittopmenuindex($id ){
//        dd($id);
        $page = Topmunue::find($id);
        return view("menu.edittop",compact('page'));
    }
//    二次保存
    public  function  edittopmenustore($id , Request $request){
        $page =  Topmunue::find($id);
        $page->name = $request->input('name');
        $page->link = $request->input('link');
        $page->save();
        return redirect('topmenu');
    }
    public function  topmenudelete(Topmunue $id){
        $id->delete();
        $menus = Topmunue::orderby('num','asc')->get();
        $i = 1;
        foreach ($menus as $ppt){
            $ppt->num = $i;
            $i++;
            $ppt->save();
        }
        return redirect('topmenu');
    }

    public  function  topmenuup(Topmunue $id){
        $pre = Topmunue::where('num','=',$id->num-1)->get()[0];
        $pre->num +=1;
        $pre->save();
        $id->num -=1;
        $id->save();
        return back();
    }

    public  function  topmenudown(Topmunue $id){
        $pre = Topmunue::where('num','=',$id->num+1)->get()[0];
        $pre->num -=1;
        $pre->save();
        $id->num +=1;
        $id->save();

        return back();
    }

//下
//面
//还
//有
//侧
//边
//的





//    ---------------------------------------------侧边导航栏管理---------------------------------------------
//    侧边导航栏列表
    public  function  sideindex(){

        $sidemenus = Sidemenu::where('rank','=','1')->orderby('num','asc')->get();

        return  view("menu.sideindex", compact('sidemenus'));
    }
//    新建侧边导航栏
    public function  newsidemenuindex(){
        return  view('menu.newsidemenu');
    }
    public function  newsidemenustore(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'rank'=>'required',
            'preid'=>'required',
        ]);

        $p = new  Sidemenu();
        $p->name = $request->input('name');
        $p->rank = $request->input('rank');
        $p->preid = $request->input('preid');
        $p->member = $request->input('member');
        $p->memberphone = $request->input('memberphone');

        $ps = Sidemenu::where('preid','=',$p->preid)->where('rank','=',$p->rank)->get();
        $p->num = count($ps)+1;
        $p->save();
        return redirect("sidemenu");
    }
//    编辑侧边导航栏
    public function  editsidemenuindex($id){
//        dd($id);
        $page = Sidemenu::find($id);
        return  view('menu.editside',compact('page'));
    }
    //    保存侧边导航栏
    public function  editsidemenustore($id, Request $request){
//        dd($request);
        $p = Sidemenu::find($id);
        $p->name = $request->input('name');
        $p->rank = $request->input('rank');
        $p->preid = $request->input('preid');
        $p->member = $request->input('member');
        $p->memberphone = $request->input('memberphone');
        $p->save();
        return redirect('sidemenu');
    }

    public  function  sidedelete(Sidemenu $id){
        $id->delete();
        $ps = Sidemenu::where('preid','=',$id->preid)->where('rank','=',$id->rank)->get();
        $i = 1;
        foreach ($ps as $ppt){
            $ppt->num = $i;
            $i++;
            $ppt->save();
        }
        return redirect('sidemenu');
    }

    public  function  sidemenuup(Sidemenu $id){
        $pre = Sidemenu::where('preid','=',$id->preid)->where('rank','=',$id->rank)->where('num','=',$id->num-1)->get()[0];
        $pre->num +=1;
        $pre->save();
        $id->num -=1;
        $id->save();
        return back();
    }

    public  function  sidemenudown(Sidemenu $id){
        $pre = Sidemenu::where('preid','=',$id->preid)->where('rank','=',$id->rank)->where('num','=',$id->num+1)->get()[0];
        $pre->num -=1;
        $pre->save();
        $id->num +=1;
        $id->save();

        return back();
    }
}
