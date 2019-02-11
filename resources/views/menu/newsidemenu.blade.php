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
                <div class="card-header">新建侧边导航栏</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>名称* <span class="size"></span></label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label>负责人* <span class="size"></span></label>
                            <input type="text" class="form-control" name="member">
                        </div>
                        <div class="form-group">
                            <label>负责人电话* <span class="size"></span></label>
                            <input type="text" class="form-control" name="memberphone">
                        </div>

                        <div class="form-group">
                            <label>级别* <span class="size"></span></label>
                            <select name="rank" id="select_id" class="form-control">
                                <option value=""> 请选择标签等级</option>
                                <option value="1">一级标题</option>
                                <option value="2">二级标题</option>
                                <option value="3">三级标题</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><span class="size"></span></label>

                        </div>
                        {{--根据rank选择上级标题--}}
                        <div class="form-group">
                            <label>上级标题* <span class="size"></span></label>
                            <select name="preid" id="" class="form-control">
                                <option value="">请选择上级标签</option>
                                <optgroup label="#一级标签无上级标签" id="1">
                                    <option value="-1">无</option>
                                </optgroup>
                                <optgroup label="#从下列一级标签中选取" id="2">
                                    @php
                                        $keys = \App\Sidemenu::where('rank','=','1')->get();
                                    @endphp
                                    @foreach($keys as $key)
                                        <option value="{{$key->id}}"> {{$key->name}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="#从下列中二级标签选取" id="3">
                                    @php
                                        $keys = \App\Sidemenu::where('rank','=','2')->get();
                                    @endphp
                                    @foreach($keys as $key)
                                        <option value="{{$key->id}}"> {{$key->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>


                        <div class="form-group">
                            <label><span class="size"></span></label>

                        </div>
                        <input type="submit" class="btn btn-primary" value="确定">
                        <input type="button" class="btn btn-default" onclick="location.href='#'" value="取消">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#select_id").change(function(){
//                得到属性值
                var selected=$(this).children('option:selected').val()
                if(selected=="1"){
                    $("#1").show();
                    $("#2").hide();
                    $("#3").hide();
                }else if(selected=="2"){
                    $("#2").show();
                    $("#1").hide();
                    $("#3").hide();
                }else{
                    $("#3").show();
                    $("#1").hide();
                    $("#2").hide();
                }
            });
        });
    </script>
@endsection