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
                    <form class="form form-horizontal" method="post" action="#" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-2">名称</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$friend->name}}" name="name">
                                {{csrf_field()}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2">超链接</label>
                            <div class="col-md-8 col-sm-12">
                                <input type="text" class="form-control" value="{{$friend->link}}" name="link">
                            </div>
                        </div>

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