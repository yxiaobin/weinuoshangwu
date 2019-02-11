<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Sidemenu;
use Illuminate\Http\Request;

class AddfunController extends Controller
{
    //
    public function  index(){

        $pages = Sidemenu::where('rank','=','3')->orderby('num','asc')->get();
        return  view("add.index", compact('pages'));
    }
    public function  newindex(){
        return  view("add.newadd");
    }
    public  function  newstore(Request $request){
        //dd($request);
        $this->validate($request, [
            'image'=>'required',
            'name'=>'required',
            'link'=>'required',
            'sideid'=>'required',
        ]);
        $p = new Menu();
        $p->name = $request->input('name');
        $p->sideid = $request->input('sideid');
        $p->link = $request->input('link');
        $p->image = $request->file('image')->store('images');
        $p->save();
        return redirect('addfun');
    }

    public  function  editindex($id){
        $page = Menu::find($id);
        return view("add.edit" , compact('page'));
    }
    public  function  editstore($id, Request $request){

        $p = Menu::find($id);
        $p->name = $request->input('name');
        $p->link = $request->input('link');
        $p->sideid = $request->input('sideid');
        if ($request->file('image') != null){
            $p->image = $request->file('image')->store('images');

        }
        $p->save();
        return redirect('addfun');
    }
    public  function  delete( Menu $id){
        $id->delete();
        return  redirect('addfun');
    }

}
