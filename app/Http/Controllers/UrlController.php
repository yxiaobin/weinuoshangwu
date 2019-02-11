<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Sidemenu;
use App\News;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    //
    public function  index($url){
            $page = Page::where('linkname','=',$url)->get();
//        找到页面
            if ((count($page)) == 1){
                $page = $page->first();
                $kind = $page->kind;
                if($kind == 1){
                    $pflag = ismobile();
                    if($pflag == true){
                        return  view("phone.catdetail",compact("page"));
                    }else {
                        $flag = $page->status;
//                      dd($flag);
                        if ($flag == 1) {
                            return view('home.one', compact('page'));
                        } else if ($flag == 2) {
                            return view('home.two', compact('page'));
                        } else {
                            return view('home.three', compact('page'));

                        }
                    }
                }else{
                    if($page->kindcontent != -1 && $page->kindcontent != null){
                        $p = Sidemenu::find($page->kindcontent);
                    }else{
                        $p = Sidemenu::where('rank','=','1')->get()[0];
                    }
                    return view('home.liebiao', compact('id','p'));
                }

            }else{
                return redirect('/');
            }



    }

    public  function  listindex($id){
        $p = Sidemenu::find($id);
        return view('home.liebiao', compact('id','p'));
    }

    public  function  ArticleIndex( News $id){
        $new = $id;
        $flag = ismobile();
        if($flag == false){
            return view('home.article',compact('new'));
        }else{
            return view('phone.newsdetail',compact('new'));
        }
    }

    public  function  ArticlelistIndex($id){
         $news = News::where('category_id','=',$id)->get();
         $key = Category::find($id);
        return view('home.articlelist',compact('news','key'));
    }

    public function  factory(){
        return view('home.factory');
    }
    public function  financing(){
        return view('home.financing');
    }
    public function  investment(){
        return view('home.investment');
    }
    public function  private(){
        return view('home.private');
    }
    public function  chuangye1(){
        return view('home.chuangye');
    }
    public function  chuangye2(){
        return view('home.chuangye2');
    }
    public function  dingzhi(){
        return view('home.dingzhi');
    }
}
