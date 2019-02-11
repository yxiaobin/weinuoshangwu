@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">页面列表</div>
                <div class="card-body">
                    <table class=" table">
                        <thead>
                        <th>页面名称</th>
                        <th>页面别名</th>

                        <th>页面超链接</th>
                        <th>样式</th>

                        <th>操作</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>商业保理公司注册</td>
                            <td>---</td>
                            <td>http://wn.budgroup.cn/factroy</td>
                            <td>固定页面</td>
                            <td>---</td>
                        </tr>
                        <tr>
                            <td>私募基金公司注册</td>
                            <td>---</td>
                            <td>http://wn.budgroup.cn/private</td>
                            <td>固定页面</td>
                            <td>---</td>
                        </tr>
                        <tr>
                            <td>融资租赁公司</td>
                            <td>---</td>
                            <td>http://wn.budgroup.cn/financing</td>
                            <td>固定页面</td>
                            <td>---</td>
                        </tr>
                        <tr>
                            <td>企业境外投资</td>
                            <td>---</td>
                            <td>http://wn.budgroup.cn/investment</td>
                            <td>固定页面</td>
                            <td>---</td>
                        </tr>
                        <tr>
                            <td>创业助手</td>
                            <td>---</td>
                            <td>http://wn.budgroup.cn/chuangye1</td>
                            <td>固定页面</td>
                            <td>---</td>
                        </tr>
                        <tr>
                            <td>私人订制</td>
                            <td>---</td>
                            <td>http://wn.budgroup.cn/dingzhi</td>
                            <td>固定页面</td>
                            <td>---</td>
                        </tr>
                        @foreach($pages as $page)
                            <tr>
                                <td>
                                    {{$page->name}}
                                </td>
                                <td>
                                    {{$page->linkname}}
                                </td>
                                <td>{{$page->link}}</td>
                                <td>样式{{$page->status}}</td>
                                <td>
                                    <a href="{{$page->link}}" target="view_window" class="btn btn-primary btn-xs" role="button">
                                        预览
                                    </a>
                                    <a href="{{url("editpage/$page->id")}}" class="btn btn-primary btn-xs" role="button">
                                        编辑
                                    </a>
                                    <a href="{{url("deletepage/$page->id")}}" class="btn btn-warning btn-xs" role="button" onclick="return confirm('确认要删除吗？')">
                                        删除
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="card-header">
                    <a href="{{route('newpage')}}">
                        <input type="button" class="btn btn-primary" value="新建页面">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
