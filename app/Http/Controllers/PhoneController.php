<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\Show;
use App\Sidemenu;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    //

    public function  leftside(){
        //       获取侧边栏
        $sidemenus = Sidemenu::where('rank','=','1')->orderby('num','asc')->get();
        return view('phone.left',compact('sidemenus'));
    }
    public function  search(){
        $rementuijians = Show::where('status','=','1')->orderby('id','desc')->get();
        return view('phone.search',compact('rementuijians'));
    }
    public function news(){
        $news = News::all();
        $cat = Category::all();
        return view('phone.news',compact('news','cat'));
    }
    public function catlist($id){
        $sidmenus = Sidemenu::where('rank','=','1')->get();
        if($id == -1){
            $id = 5;
        }
        $ps = Sidemenu::where("rank","=","3")->where("preid","=",$id)->get();

        return   view("phone.catlist",compact("sidmenus","ps"));
    }
}
