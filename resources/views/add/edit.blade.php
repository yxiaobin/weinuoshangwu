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
                <div class="card-header">添加功能</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>名称 <span class="size"></span></label>
                            <input id="f1" type="text" readonly class="form-control" name="name" value="{{$page->name}}">
                        </div>
                        <div class="form-group"  >
                            <label>超链接</label>
                            <input type="text" id="link"  class="form-control"  name="link" value="{{$page->link}}">
                        </div>
                        <div class="form-group"  >
                            <label>封面</label>
                            <img src="{{asset("uploads/$page->image")}}" alt="" style="width: 300px; height: 300px;">
                        </div>
                        <div class="form-group"  >
                            <label></label>
                            {{--<input type="file"   class="form-control"  name="image" value="">--}}
                        </div>
                        <div class="form-group"  >
                            <label>修改封面图片</label>
                            <input type="file"   class="form-control"  name="image" value="">
                        </div>
                        <div class="form-group"  >
                            <label></label>
                            {{--<input type="file"   class="form-control"  name="image" value="">--}}
                        </div>
                        <div class="form-group"  >
                            <label>所属关系</label>
                            <select name="sideid" id="f2" class="form-control">
                                @php
                                    $keys = \App\Sidemenu::where('rank','=','3')->get();
                                @endphp
                                @foreach($keys as $key)
                                    <option value="{{$key->id}}" @if($key->id == $page->sideid)  selected @endif > {{$key->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"  >
                            <label></label>
                            {{--<input type="file"   class="form-control"  name="image" value="">--}}
                        </div>
                        <input type="submit" class="btn btn-primary" value="确定">
                        <input type="button" class="btn btn-default" onclick="location.href='#'" value="取消">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        $(document).ready(function(){
            var selected=$(f2).children('option:selected').text()
            console.log(selected);
            $("#f1").val(selected);


            $("#f2").change(function(){
                var selected=$(this).children('option:selected').text()
                console.log(selected);
                $("#f1").val(selected);
            });
        });
    </script>

@endsection