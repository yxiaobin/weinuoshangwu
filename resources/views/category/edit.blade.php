@extends('layout.manager')
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header">文章分类修改</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="section">
                                <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i>请填写信息</div>
                                <div class="section-body __indent">
                                    <form class="form form-horizontal" method="post" action="{{url("category/$category->id")}}" enctype="multipart/form-data">
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
                                                    <label class="col-md-3 control-label">名称</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="名称" name="name" value="{{$category->name}}">
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
                                                            <input type="submit" class="btn btn-primary" value="保存">
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

@endsection