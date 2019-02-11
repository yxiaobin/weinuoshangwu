@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">顶部导航栏列表</div>
                <div class="card-body">
                    <table class=" table">
                        <thead>
                        <th>名称</th>

                        <th>超链接</th>
                        <th>次序</th>

                        <th>操作</th>
                        </thead>
                        <tbody>
                        @foreach($topmenus as $page)
                            <tr>
                                <td>
                                    {{$page->name}}
                                </td>
                                <td>
                                    {{$page->link}}
                                </td>
                                <td>{{$page->num}}</td>
                                <td>
                                    <a href="{{$page->link}}" target="view_window" class="btn btn-primary btn-xs" role="button">
                                        预览
                                    </a>
                                    <a href="{{url("edittopmenu/$page->id")}}" class="btn btn-primary btn-xs" role="button">
                                        编辑
                                    </a>
                                    @if($page->num>1)
                                        <a href="{{url("topmenuup/$page->id")}}">
                                            <input type="button" class="btn btn-xs btn-info" value="上移">
                                        </a>
                                    @endif
                                    @if($page->num <count($topmenus))
                                        <a href="{{url("topmenudown/$page->id")}}">
                                            <input type="button" class="btn btn-xs btn-warning" value="下移">
                                        </a>
                                    @endif
                                    <a href="{{url("topmenudelete/$page->id")}}" class="btn btn-danger btn-xs" role="button" onclick="return confirm('确认要删除吗？')">
                                        删除
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-header">
                    <a href="{{route("newtopmenu")}}">
                        <input type="button" class="btn btn-primary" value="添加">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
