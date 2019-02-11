@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">推荐列表</div>
                <div class="card-body">
                    <table class=" table">
                        <thead>

                        <th>名称</th>
                        <th>缩略图</th>
                        <th>类别</th>
                        <th>超链接</th>
                        <th>操作</th>
                        </thead>
                        <tbody>
                        @foreach($shows as $page)
                            <tr>
                                <td>
                                    {{$page->name}}
                                </td>
                                <td>
                                    <img src="{{asset("uploads/$page->image")}}" style="width: 50px; height: 50px;" alt="">
                                </td>
                                <td>
                                    {{$name}}
                                </td>
                                <td>
                                    {{$page->link}}
                                </td>
                                <td>
                                    <a href="{{url("/$page->link")}}" target="view_window" class="btn btn-primary btn-xs" role="button">
                                        预览
                                    </a>
                                    <a href="{{url("editshow/$id/$page->id")}}" class="btn btn-primary btn-xs" role="button">
                                        编辑
                                    </a>

                                    <a href="{{url("deleteshow/$id/$page->id")}}" class="btn btn-danger btn-xs" role="button" onclick="return confirm('确认要删除吗？')">
                                        删除
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-header">
                    <a href="{{url("addshow/$id")}}">
                        <input type="button" class="btn btn-primary" value="添加">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
