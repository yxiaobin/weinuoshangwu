<?php

namespace App\Http\Controllers;

use App\Category;
use App\Friend;
use App\Member;
use App\News;
use App\Ppt;
use App\Show;
use App\Sidemenu;
use App\Topmunue;
use App\Web;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function  index(){
//       获取 ppt
        $ppts = Ppt::where("show",'=','1')->orderby('num','asc')->get();
//       获取侧边栏
        $sidemenus = Sidemenu::where('rank','=','1')->orderby('num','asc')->get();
//        return view('home.index',compact('ppts'));
//       获取新闻资讯
        $news = News::all();
//        获取新闻资讯的种类
        $categorys = Category::all();
//        获取热门推荐
        $rementuijians = Show::where('status','=','1')->orderby('id','desc')->get();
        $chuangyezhunbeis = Show::where('status','=','2')->orderby('id','desc')->get();
        $chenggongzhichus = Show::where('status','=','3')->orderby('id','desc')->get();
        $chengshuwendings = Show::where('status','=','4')->orderby('id','desc')->get();
        $caikuaishuiwus = Show::where('status','=','5')->orderby('id','desc')->get();
        $xingzhengshenpis = Show::where('status','=','6')->orderby('id','desc')->get();
        $jinronggongsis = Show::where('status','=','7')->orderby('id','desc')->get();
//        获取用户反馈
        $members = Member::where('rank','=','0')->get();
//        获取合作伙伴
        $hezuohuobans = Friend::where('status','=','0')->get();
//        获取友情链接
        $youqinglianjies = Friend::where('status','=','1')->get();

        //        判断是否是手机端
        $flag = ismobile();
        if($flag == false){
            return view('home.index',compact('ppts','sidemenus','news','categorys','rementuijians','chuangyezhunbeis','chenggongzhichus','chengshuwendings','caikuaishuiwus','xingzhengshenpis','jinronggongsis'
                ,'members','hezuohuobans','youqinglianjies'));
        }else{
            return  view('phone.index',compact('ppts','sidemenus','news','categorys','rementuijians','chuangyezhunbeis','chenggongzhichus','chengshuwendings','caikuaishuiwus','xingzhengshenpis','jinronggongsis'
                ,'members','hezuohuobans','youqinglianjies'));
        }

    }



    public  function  webindex(){
        $p = Web::all();
        if(count($p) == 0){
            $p = new Web();
        }else{
            $p = $p->first();
        }
        return view('web.index',compact('p'));
    }
    public  function  webstore(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'des'=>'required',
            'keyword'=>'required',
            'biaoyu'=>'required',
            'allright'=>'required',
            'member'=>'required',
            'memberphone'=>'required',
        ]);
        $p = Web::all();
        if(count($p) == 0){
            $p = new Web();
        }else{
            $p = $p->first();
        }

        $p->title = $request->input('title');
        $p->des = $request->input('des');
        $p->keyword = $request->input('keyword');
        $p->biaoyu = $request->input('biaoyu');
        $p->allright = $request->input('allright');
        $p->shangqiao = $request->input('shangqiao');
        $p->member = $request->input('member');
        $p->memberphone = $request->input('memberphone');
        if ($request->file('fuwu')!=null){
            $p->fuwu =$request->file('fuwu')->store('images');
        }
        if($request->file('dingyue')!=null){
            $p->dingyue = $request->file('dingyue')->store('images');
        }
        if($request->file('logo')!=null){
            $p->logo = $request->file('logo')->store('images');
        }
        $p->save();
        return view('web.index',compact('p'));
    }
}
