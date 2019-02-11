@extends('layout.manager')
@section("content")
    <script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/ueditor.config.js")}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/ueditor.all.min.js")}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/lang/zh-cn/zh-cn.js")}}"></script>
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
                <div class="card-header">网站基本信息</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>网站标签logo <span class="size"></span></label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="form-group">
                            <label>当前图片 <span class="size"></span></label>
                            <img src="{{asset("uploads/$p->logo")}}" alt="" style="width: 100px; height: 100px;">
                        </div>
                        <div class="form-group">
                            <label>网站标题 <span class="size"></span></label>
                            <input type="text" class="form-control" name="title" value="{{$p->title}}">
                        </div>
                        <div class="form-group">
                            <label>网站描述 <span class="size"></span></label>
                            <input type="text" class="form-control" name="des"  value="{{$p->des}}">
                        </div>
                        <div class="form-group">
                            <label>网站关键词 <span class="size"></span></label>
                            <input type="text" class="form-control" name="keyword"  value="{{$p->keyword}}">
                        </div>
                        <div class="form-group">
                            <label>网站标语 <span class="size"></span></label>
                            <input type="text" class="form-control" name="biaoyu"  value="{{$p->biaoyu}}">
                        </div>
                        <div class="form-group">
                            <label>网站负责人座机 <span class="size"></span></label>
                            <input type="text" class="form-control" name="member"  value="{{$p->member}}">
                        </div>
                        <div class="form-group">
                            <label>网站负责人手机 <span class="size"></span></label>
                            <input type="text" class="form-control" name="memberphone"  value="{{$p->memberphone}}">
                        </div>
                        <div class="form-group">
                            <label>服务号 <span class="size"></span></label>
                            <input type="file" class="form-control" name="fuwu">
                        </div>
                        <div class="form-group">
                            <label>当前图片 <span class="size"></span></label>
                            <img src="{{asset("uploads/$p->fuwu")}}" alt="" style="width: 100px; height: 100px;">
                        </div>

                        <div class="form-group">
                            <label>订阅号 <span class="size"></span></label>
                            <input type="file" class="form-control" name="dingyue">
                        </div>
                        <div class="form-group">
                            <label>当前图片 <span class="size"></span></label>
                            <img src="{{asset("uploads/$p->dingyue")}}" alt="" style="width: 100px; height: 100px;">
                        </div>
                        <div class="form-group">
                            <label>版权 <span class="size"></span></label>
                            <input type="text" class="form-control" name="allright"  value="{{$p->allright}}">
                        </div>
                        <div class="form-group">
                            <label>商桥 <span class="size"></span></label>
                            <input type="text" class="form-control" name="shangqiao"  value="{{$p->shangqiao}}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="修改">
                        <input type="button" class="btn btn-default" onclick="location.href='adminindex'" value="返回">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection