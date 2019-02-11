@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">侧边导航栏列表</div>
                    <div class="card-body">
                        <table class=" table">
                            <thead>
                            <th>所属</th>
                            <th>名称</th>
                            <th>封面</th>
                            <th>超链接</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                @php
                                $ch1 = \App\Menu::where('sideid','=',$page->id)->get();

                                @endphp
                                @foreach($ch1 as $ch)
                                <tr>
                                    <td>
                                        {{$page->name}}
                                    </td>
                                    <td>
                                        {{$ch->name}}
                                    </td>
                                    <td>
                                        <img src="{{asset("uploads/$ch->image")}}" alt="" style="width: 100px; height: 50px;">
                                    </td>
                                    <td>{{$ch->link}}</td>
                                    <td>
                                        <a href="{{$ch->link}}" target="view_window" class="btn btn-primary btn-xs" role="button">
                                            预览
                                        </a>
                                        <a href="{{url("editaddfun/$ch->id")}}" class="btn btn-primary btn-xs" role="button">
                                            编辑
                                        </a>
                                        <a href="{{url("adddelete/$ch->id")}}" class="btn btn-danger btn-xs" role="button" onclick="return confirm('确认要删除吗？')">
                                            删除
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                    <div class="card-header">
                        <a href="{{route('newaddfun')}}">
                            <input type="button" class="btn btn-primary" value="添加功能">
                        </a>
                    </div>
            </div>
        </div>
    </div>

@endsection