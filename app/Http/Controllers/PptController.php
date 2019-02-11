<?php

namespace App\Http\Controllers;

use App\Ppt;
use Illuminate\Http\Request;

class PptController extends Controller
{
    //
    public function  PptIndex(){
        $ppts = Ppt::orderby('num','asc')->get();
        $tab = 1;
        return view('ppt.index',compact('ppts','tab'));
    }
    public function  PptAdd(Request $request){
        $this->validate($request, [
            'image'=>'required'
        ]);
        $ppt = new Ppt();
        $ppts = Ppt::all();
        $ppt->image= $request->file('image')->store('images');
        $ppt->href = $request->input('href');
        $ppt->num = count($ppts)+1;
        $ppt->save();
        return redirect('ppt');
    }

    public  function  PptShow(Ppt $id){
        $id->show += 1;
        $id->show %=2;
        $id->save();
        return back();
    }
    public  function  PptUp(Ppt $id){
        $pre = Ppt::where('num','=',$id->num-1)->get()[0];
        $pre->num +=1;
        $pre->save();
        $id->num -=1;
        $id->save();
        return back();
    }
    public  function  PptDown(Ppt $id){
        $pre = Ppt::where('num','=',$id->num+1)->get()[0];
        $pre->num -=1;
        $pre->save();
        $id->num +=1;
        $id->save();

        return back();
    }
    public  function  PptReeditIndex(Ppt $id){
        $ppt = $id;
        return view('ppt.reedit',compact('ppt'));
    }
    public  function  PptReeditStore(Ppt $id, Request $request){
        if($request->input('href')!=null){
            $id->href = $request->input('href');
        }
        if($request->file('image')!=null){
            $id->image = $request->file('image')->store('images');
        }
        $id->save();
        return redirect('ppt');
    }
    public function pptdelete(Ppt $id){
        $id->delete();
        $ppts = Ppt::orderby('num','asc')->get();
        $i = 1;
        foreach ($ppts as $ppt){
            $ppt->num = $i;
            $i++;
            $ppt->save();
        }
        return back();
    }
}

