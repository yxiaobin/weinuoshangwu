<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    //
    public  function  index($id){
        if($id ==1){
            $name = '热门推荐';
        }else if($id ==2){
            $name = '企业服务-创业准备';
        }else if($id ==3){
            $name = '企业服务-成功之初';
        }else if($id ==4){
            $name = '企业服务-成熟稳定';
        }else if($id ==5){
            $name = '财会税务';
        }else if($id ==6){
            $name = '行政审批';
        }else if($id ==7){
            $name = '金融公司';
        }

        $shows =Show::where('status','=',$id)->get();
        return view('show.index',compact('shows','name','id'));
    }

    public  function addindex($id ){
        if($id ==1){
            $name = '热门推荐';
        }else if($id ==2){
            $name = '企业服务-创业准备';
        }else if($id ==3){
            $name = '企业服务-成功之初';
        }else if($id ==4){
            $name = '企业服务-成熟稳定';
        }else if($id ==5){
            $name = '财会税务';
        }else if($id ==6){
            $name = '行政审批';
        }else if($id ==7){
            $name = '金融公司';
        }
        return view('show.newshow', compact('name'));
    }
    public  function addstore($id, Request $request){
//        dd($request);
        $this->validate($request, [
            'image'=>'required',
            'name'=>'required',
            'link'=>'required',
        ]);
        $p = new Show();
        $p->name = $request->input('name');
        $p->content = $request->input('content');
        $p->status = $id;
        $p->link = $request->input('link');
        $p->image = $request->file('image')->store('images');
        $p->save();
        return redirect("show/$id");
    }

    public function  editindex($id,$key){
        if($id ==1){
            $name = '热门推荐';
        }else if($id ==2){
            $name = '企业服务-创业准备';
        }else if($id ==3){
            $name = '企业服务-成功之初';
        }else if($id ==4){
            $name = '企业服务-成熟稳定';
        }else if($id ==5){
            $name = '财会税务';
        }else if($id ==6){
            $name = '行政审批';
        }else if($id ==7){
            $name = '金融公司';
        }
        $page   = Show::find($key);
        return view('show.edit', compact('name','page','name'));
    }
    public  function  editstore($id, $key,Request $request){

        $p = Show::find($key);
        $p->name = $request->input('name');
        $p->link = $request->input('link');
        $p->content = $request->input('content');

        $p->status = $id;
        if ($request->file('image') != null){
            $p->image = $request->file('image')->store('images');

        }
        $p->save();
        return redirect("show/$id");
    }
    public  function  delete( $id, Show $key){
        $key->delete();
        return  redirect("show/$id");
    }
}
