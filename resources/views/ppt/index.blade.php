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
                            <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">查看幻灯片</a>
                        </li>
                        <li role="tab2" style="width:160px" class="@if($tab==2){{"active"}}@endif">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">添加幻灯片</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding tab-content">
                    <div role="tabpanel" class="tab-pane @if($tab==1){{"active"}}@endif" id="tab1" style="padding-top: 100px">
                        <table class="datatable table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>预览</th>
                                <th>排序</th>
                                <th>链接</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ppts as $ppt)
                                <tr>
                                    <td><img src="{{asset("uploads/$ppt->image")}}" alt="" width="100" height="50"></td>
                                    <td>{{$ppt->num}}</td>
                                    <td>
                                        @if($ppt->href==null)无
                                        @else{{$ppt->href}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($ppt->show==1)已推荐
                                        @else未推荐
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url("reeditppt/$ppt->id")}}">
                                            <input type="button" class="btn btn-xs btn-info" value="修改">
                                        </a>
                                        <a href="{{url("pptshow/$ppt->id")}}">
                                            <input type="button" class = "btn btn-xs @if($ppt->show==1)btn-default
@else
                                                    btn-success
@endif" value="@if($ppt->show==1)取消推荐@else设为推荐@endif">
                                        </a>
                                        @if($ppt->num>1)
                                            <a href="{{url("pptup/$ppt->id")}}">
                                                <input type="button" class="btn btn-xs btn-info" value="上移">
                                            </a>
                                        @endif
                                        @if($ppt->num <count($ppts))
                                            <a href="{{url("pptdown/$ppt->id")}}">
                                                <input type="button" class="btn btn-xs btn-warning" value="下移">
                                            </a>
                                        @endif
                                        <a href="{{url("pptdelete/{$ppt->id}")}}">
                                            <input type="button" class="btn btn-xs btn-danger" value="删除" onclick="return confirm('确定要删除？')">
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
                                        <form class="form form-horizontal" method="post" action="{{route('addppt')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="section">
                                                <div class="section-title"></div>
                                                <div class="section-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">选择图片<span class="size">(640x330)</label>
                                                        <div class="col-md-9">
                                                            <input type="file" name="image" accept="image/gif,image/jpeg,image/png,image/webp" class="form-control" placeholder="简体">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">链接地址</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="链接地址" name="href">
                                                        </div>
                                                    </div>
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