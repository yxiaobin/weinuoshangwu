@extends('layout.manager')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">文章列表</div>
                <div class="card-body">
                    <table class="datatable table">
                        <thead>
                        <th>名称</th>
                        <th>缩略图</th>

                        <th>时间</th>
                        <th>类别</th>
                        <th>操作</th>
                        </thead>
                        <tbody>
                        @foreach($news as $help)
                            <tr>
                                <td>{{$help->title}}</td>
                                <td>
                                    <img src="{{asset("uploads/$help->image")}}" alt="" width="100" height="50"></td>
                                </td>
                                <td>{{date('Y-m-d',$help->time)}}</td>
                                @php
                                    $kind = $help->kind()->get();
                                    if(count($kind)==0){
                                        $kind->name = "该分类已删除";
                                    }else{
                                        $kind = $kind[0];
                                    }
                                @endphp
                                <td>{{$kind->name}}</td>
                                <td>
                                    <a href="{{url("/article/$help->id")}}" class="btn btn-success btn-xs" role="button">
                                        预览
                                    </a>
                                    <a href="{{url("reeditartical/$help->id")}}" class="btn btn-primary btn-xs" role="button">
                                        编辑
                                    </a>
                                    <a href="{{url("deleteartical/$help->id")}}" class="btn btn-warning btn-xs" role="button" onclick="return confirm('确认要删除吗？')">
                                        删除
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-header">
                    <a href="{{route('addartical')}}">
                        <input type="button" class="btn btn-primary" value="新建文章">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
