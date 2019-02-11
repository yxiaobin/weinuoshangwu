@extends("layout.manager")
@section("content")
    <?php
    $flag = 0;
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">修改信息</div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{url("memberinfo/$member->id")}}" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-2">姓名</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->username}}" name="usr_name">
                                {{csrf_field()}}
                            </div>
                        </div>
                        @if($id != session('id'))
                        <div class="form-group">
                            <label class="col-md-2">公司</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->company}}" name="company">
                                {{csrf_field()}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">职位</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->job}}" name="job">
                                {{csrf_field()}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">反馈</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$member->motto}}" name="motto">
                                {{csrf_field()}}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2">头像</label>
                            <div class="col-md-2 col-sm-12">
                                <img src="{{asset("uploads/$member->image")}}" style="width: 100px; height: 50px;">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input type="file" class="form-control" value="" name="image" placeholder="">
                            </div>
                        </div>
                        @endif
                        @if($id == session('id'))
                        <div class="form-group">
                            <label class="col-md-2">请输入新的密码</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">请重新输入新的密码</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="" name="password_confirmation">
                            </div>
                        </div>
                        @endif
                        <div class="form-footer">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <input type="submit" class="btn btn-primary" value="确定修改">
                                    <input type="button" class="btn btn-default" value="取消">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection