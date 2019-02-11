<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;

class ArticalController extends Controller
{
    //
    public  function  ArticalIndex(){
        $news = News::orderby('time','desc')->get();
        return view('artical.index',compact('news'));
    }
    public  function  ArticalAdd(){
        return view('artical.edit');
    }
    public  function  ArticalStore(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'editorValue'=>'required',
            'image'=>'required',
            'category'=>'required',
            'abstract'=>'required',
            'href'=>'required',
        ]);
        $new = new News();
        $new->title = $request->input('title');
        $new->abstract = $request->input('abstract');
        $new->content = $request->input('editorValue');
        $new->category_id = $request->input('category');
        $new->href = $request->input('href');
        $new->image = $request->file('image')->store('images');
        $new->time = time();
        $new->save();
        return redirect('artical');
    }
    public  function  ArticalDelete(News $id){
        $id->delete();
        return redirect('artical');
    }
    public  function  ArticalReeditIndex(News $id){
        $new = $id;
        return view('artical.reedit',compact('new'));
    }
    public  function  ArticalReeditStore(News $id, Request $request){
        if($request->input('title')!=null){
            $id->title = $request->input('title');
        }
        $id->href = $request->input('href');
        if($request->input('category')!=null){
            $id->category_id = $request->input('category');
        }
        if($request->input('abstract')!=null){
            $id->abstract = $request->input('abstract');
        }
        if($request->input('editorValue')!=null){
            $id->content = $request->input('editorValue');
        }

        if($request->file('image')!=null){
            $id->image = $request->file('image')->store('images');
        }
        $id->abstract = $request->input('abstract');
        $id->href = $request->input('href');

        $id->save();
        return redirect('artical');
    }



//    类别管理
    //文章分类管理页面
    public  function  CategoryIndex(){
        $tab=1;
        $categorys =Category::orderby('id','desc')->get();
        return view('category.index',compact('tab','categorys'));
    }
    public  function  CategoryStore(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:category,name'
        ]);
        $kind  = new Category();
        $kind->name = $request->input('name');
        $kind->save();
        $tab=1;
        $categorys =Category::orderby('id','desc')->get();
        return view('category.index',compact('tab','categorys'));
    }
    public function CategoryEdit(Category $category){
        return view('category.edit')->with(['category'=>$category]);
    }
    public function CategoryUpdate(Category $category,Request $request){
        $this->validate($request,[
            'name'=>'required|unique:category,name,'.$category->id,
        ]);
        $category->name = $request->input('name');
        $category->save();
        return redirect('/category');
    }
    public  function  CategoryDelete(Category $id){
        //类型删除，当前类型下如果存在文章不能删除
        $id ->delete();
        return redirect()->back();
    }
}
