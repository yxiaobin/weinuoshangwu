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
                <div class="card-header">文章发布</div>
                <div class="card-body">
                    <form action="{{route('addarticalpost')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>文章标题</label>

                            <input type="text" class="form-control" name="title" value="">
                        </div>
                        <div class="form-group">
                            <label>缩略图<span class="size">（328x220）</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        @php
                            $categorys = App\Category::all();
                        @endphp
                        <div class="form-group">
                            <label>文章分类</label>
                            <select name="category" id="" class="select2">
                                @foreach($categorys as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>文章关键词 (用 , 隔开)</label>

                            <input type="text" class="form-control" name="href" value="">
                        </div>
                        <div class="form-group">
                            <label>文章摘要</label>

                            <input type="text" class="form-control" name="abstract" value="">
                        </div>



                        <div class="form-group">
                            <label for="">正文</label>
                            <div id="editor" type="text/plain" style="height: 400px;width: 100%;margin: auto"></div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="发布" style="margin-top: 20px">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        //var ue = UE.getEditor('editor');
        var ue = UE.getEditor('editor',{toolbars: [['fullscreen',//全屏
            'source',//源代码
            'undo',//撤回一步
            'redo',//前进一步
            'bold',//粗体
            'italic',//斜体
            'underline',//下划线
            'fontborder',//字体边框
            'strikethrough',//删除线
            'subscript',//下标
            'superscript',//上标
            'forecolor', //字体颜色
            'fontfamily',//字体
            'fontsize',//字体大小
            'formatmatch',//格式刷
            'touppercase', //字母大写
            'tolowercase', //字母小写
            'link',//超链接
            'unlink',//取消超链接
            'searchreplace',//查询替换
            'selectall'],//全选



            ['indent',//首行缩进
                'justifyleft', //居左对齐
                'justifycenter', //居中对齐
                'justifyright', //居右对齐
                'justifyjustify', //两端对齐
                'blockquote',//引用
                'preview',//预览
                'horizontal',//分割线
                'insertcode',//代码语言
                'paragraph',//段落格式
                'simpleupload',//单个图片上传
                'insertimage',//多个图片上传
                'imagecenter', //居中
                'insertvideo',//视频上传
                'emotion',//表情
                'map',//地图
                'backcolor',//背景色
                'lineheight', //行间距
                'edittip ', //编辑提示
                'customstyle', //自定义标题
                'autotypeset',//自动排版

                'background', //背景
                'template', //模板
                'scrawl', //涂鸦
                'time', //时间
                'date', //日期
                'snapscreen',
                'attachment'
            ]]});
        ue.ready(function() {
            //设置编辑器的内容
            {{--ue.execCommand("inserthtml",'{!! html_entity_decode($new->content) !!}') ;--}}
            ue.execCommand("inserthtml",'请输入内容') ;

        });
    </script>

@endsection