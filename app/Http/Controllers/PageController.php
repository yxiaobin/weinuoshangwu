<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // 页面列表
    public function index()
    {
        $pages = Page::where('kind', '=', '1')->get();
//        $pages = Page::where('kind', '=', '1')->paginate(5);;
        return view('page.index', compact('pages'));
    }

//    新建页面
    public function newpageindex()
    {
        return view("page.newpage");
    }

//    保存页面
    public function newpagestore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'linkname' => 'required',
            'link' => 'required',
            'title' => 'required',
            'status' => 'required',
            'editorValue' => 'required',
            'member'=>'required',
        ]);
//        dd($request);
        $page = new Page();
        $page->name = $request->input('name');
        $page->title = $request->input('title');
        $page->link = $request->input('link');
        $page->linkname = $request->input('linkname');
        $page->status = $request->input('status');
        $page->content = $request->input('editorValue');
        $page->phone = $request->input('phone');
        $page->member = $request->input('member');
        $page->kind = 1;

        $page->image = $request->file('image')->store('images');
        $page->save();

        return redirect('page');

    }

//        修改页面
    public function editpageindex($id)
    {
        $page = Page::find($id);
        return view("page.editpage", compact('page'));
    }

    public function editpagestore($id, Request $request)
    {

        $page = Page::find($id);
        $page->name = $request->input('name');
        $page->title = $request->input('title');
        $page->link = $request->input('link');
        $page->linkname = $request->input('linkname');
        $page->status = $request->input('status');
        $page->content = $request->input('editorValue');
        $page->phone = $request->input('phone');
        $page->member = $request->input('member');

        $page->kind = 1;
        if ($request->file('image') != null) {
            $page->image = $request->file('image')->store('images');
        }
        $page->save();
        return redirect('page');
    }

    public function delete(Page $id)
    {
        $id->delete();
        return redirect('page');
    }


    // 页面列表
    public function listindex()
    {
        $pages = Page::where('kind', '=', '2')->get();
        return view('page.list', compact('pages'));
    }

    //    新建页面
    public function newlistindex()
    {
        return view("page.newlist");
    }
    //保存页面
    public function newliststore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'linkname' => 'required',
            'link' => 'required',
            'kindcontent' => 'required',
        ]);
//        dd($request);
        $page = new Page();
        $page->name = $request->input('name');
        $page->link = $request->input('link');
        $page->linkname = $request->input('linkname');
        $page->kindcontent = $request->input('kindcontent');
        $page->kind = 2;
        $page->save();
        return redirect('pagelist');
    }

    //        修改页面
    public function editlistindex($id)
    {
        $page = Page::find($id);
        return view("page.editlist", compact('page'));
    }

    public function editliststore($id, Request $request)
    {

        $page = Page::find($id);
        $page->name = $request->input('name');

        $page->link = $request->input('link');
        $page->linkname = $request->input('linkname');
        $page->kindcontent = $request->input('kindcontent');

        $page->kind = 2;

        $page->save();
        return redirect('pagelist');
    }

}