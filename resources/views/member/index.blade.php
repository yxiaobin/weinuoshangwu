@extends("layout.manager")

@section("css")

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        @php if(session('tab')){
                            $tab = session('tab');
                        }
                        @endphp
                        <li role="tab1" class="@if($tab==1){{"active"}}@endif">
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">管理员列表</a>
                        </li>
                        <li role="tab2" style="width:160px" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">添加管理员</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>姓名</th>
                                <th>账号</th>
                                <th>操作</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{$member->id}}</td>
                                    <td>{{$member->username}}</td>
                                    <td>{{$member->name}}</td>
                                    <td>
                                        <a href="{{url("memberadmindelete/$member->id")}}">
                                            <input   @if($member->id == session('id'))
                                                     disabled="disabled"
                                                     @endif type="button" class="btn btn-xs btn-danger" onclick="return confirm('确认要删除吗？')" value="删除">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane @if($tab==2){{"active"}}@endif" id="tab2">
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-8 col-sm-12">
                                <div class="section">
                                    <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i>请填写信息</div>
                                    <div class="section-body __indent">
                                        <form class="form form-horizontal" method="post" action="{{route('memberadmin')}}" enctype="multipart/form-data">
                                            <div class="section">
                                                <div class="section-body">
                                                    {{csrf_field()}}
                                                    {{--<div class="form-group">--}}
                                                    {{--<label class="col-md-3 control-label">选择图片<span class="size">(1920x640)</label>--}}
                                                    {{--<div class="col-md-9">--}}
                                                    {{--<input type="file" name="img" accept="image/gif,image/jpeg,image/png,image/webp" class="form-control" placeholder="简体">--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">用户名</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="用户名" name="usr_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">账号</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="账号" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">密码</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="密码" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">确认密码</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="再次输入密码" name="password_confirmation">
                                                        </div>
                                                    </div>
                                                    <!--<div class="form-group">
                                                        <label class="col-md-3 control-label">描述</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="描述" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接地址</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接地址" name="url">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接名称</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接名称" name="url_title">
                                                        </div>
                                                    </div>-->
                                                    <div class="form-footer">
                                                        <div class="form-group">
                                                            <div class="col-md-9 col-md-offset-3">
                                                                <input type="submit" class="btn btn-primary" value="添加">
                                                                <input type="button" class="btn btn-default" value="取消">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection