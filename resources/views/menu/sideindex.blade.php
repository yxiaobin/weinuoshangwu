@extends("layout.manager")

@section("css")

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">侧边导航栏列表</div>
                <div class="card-body">
                    <table class=" table">
                        <thead>
                        <th>名称</th>
                        <th>级别</th>
                        <th>上级标签</th>
                        <th>次序</th>
                        <th>操作</th>
                        </thead>
                        <tbody>
                        @foreach($sidemenus as $page)
                            <tr>
                                <td>
                                   @if($page->rank ==2)
                                       -----
                                    @elseif($page->rank ==3)
                                        --------------
                                    @endif

                                    {{$page->name}}
                                </td>
                                <td>
                                    {{$page->rank}}级标签
                                </td>
                                <td>
                                    @php
                                    $name = null;
                                    if ($page->preid != -1){
                                        $name = \App\Sidemenu::find($page->preid);

                                    }else{
                                        $name = new \App\Sidemenu();
                                        $name->name = "无";
                                    }
                                    @endphp
                                    {{$name->name}}
                                </td>
                                <td>{{$page->num}}</td>
                                <td>
                                    <a href="" target="view_window" class="btn btn-primary btn-xs" role="button">
                                        预览
                                    </a>
                                    <a href="{{url("editsidemenu/$page->id")}}" class="btn btn-primary btn-xs" role="button">
                                        编辑
                                    </a>
                                    @if($page->num>1)
                                        <a href="{{url("sidemenuup/$page->id")}}">
                                            <input type="button" class="btn btn-xs btn-info" value="上移">
                                        </a>
                                    @endif
                                    @if($page->num <count($sidemenus))
                                        <a href="{{url("sidemenudown/$page->id")}}">
                                            <input type="button" class="btn btn-xs btn-warning" value="下移">
                                        </a>
                                    @endif
                                    @php
                                     $chils = \App\Sidemenu::where('preid','=', $page->id)->get();
                                     $num = count($chils);
                                    @endphp
                                    <a href="{{url("sidedelete/$page->id")}}"  @if($num >0) disabled="disabled"  @else onclick="return confirm('确认要删除吗？')" @endif  class="btn btn-danger btn-xs" role="button" >
                                        删除
                                    </a>

                                </td>
                            </tr>

                                @php
                                $ch1 = \App\Sidemenu::where('preid','=',$page->id)->where('rank','=','2')->orderby('num','asc')->get()
                                @endphp
                                @foreach($ch1 as $page)
                                    <tr>
                                        <td>
                                            @if($page->rank ==2)
                                                -----
                                            @elseif($page->rank ==3)
                                                --------------
                                            @endif

                                            {{$page->name}}
                                        </td>
                                        <td>
                                            {{$page->rank}}级标签
                                        </td>
                                        <td>
                                            @php
                                                $name = null;
                                                if ($page->preid != -1){
                                                    $name = \App\Sidemenu::find($page->preid);

                                                }else{
                                                    $name = new \App\Sidemenu();
                                                    $name->name = "无";
                                                }
                                            @endphp
                                            {{$name->name}}
                                        </td>
                                        <td>{{$page->num}}</td>
                                        <td>
                                            <a href="" target="view_window" class="btn btn-primary btn-xs" role="button">
                                                预览
                                            </a>
                                            <a href="{{url("editsidemenu/$page->id")}}" class="btn btn-primary btn-xs" role="button">
                                                编辑
                                            </a>
                                            @if($page->num>1)
                                                <a href="{{url("sidemenuup/$page->id")}}">
                                                    <input type="button" class="btn btn-xs btn-info" value="上移">
                                                </a>
                                            @endif
                                            @if($page->num <count($ch1))
                                                <a href="{{url("sidemenudown/$page->id")}}">
                                                    <input type="button" class="btn btn-xs btn-warning" value="下移">
                                                </a>
                                            @endif
                                            @php
                                                $chils = \App\Sidemenu::where('preid','=', $page->id)->get();
                                                $num = count($chils);
                                            @endphp
                                            <a href="{{url("sidedelete/$page->id")}}"  @if($num >0) disabled onclick="return confirm('存在子标签不能删除')" @else onclick="return confirm('确认要删除吗？')" @endif  class="btn btn-danger btn-xs" role="button" >
                                                删除
                                            </a>

                                        </td>
                                    </tr>

                                        @php
                                            $ch2 = \App\Sidemenu::where('preid','=',$page->id)->where('rank','=','3')->orderby('num','asc')->get()
                                        @endphp
                                        @foreach($ch2 as $page)
                                            <tr>
                                                <td>
                                                    @if($page->rank ==2)
                                                        -----
                                                    @elseif($page->rank ==3)
                                                        --------------
                                                    @endif

                                                    {{$page->name}}
                                                </td>
                                                <td>
                                                    {{$page->rank}}级标签
                                                </td>
                                                <td>
                                                    @php
                                                        $name = null;
                                                        if ($page->preid != -1){
                                                            $name = \App\Sidemenu::find($page->preid);

                                                        }else{
                                                            $name = new \App\Sidemenu();
                                                            $name->name = "无";
                                                        }
                                                    @endphp
                                                    {{$name->name}}
                                                </td>
                                                <td>{{$page->num}}</td>
                                                <td>
                                                    <a href="{{$page->link}}" target="view_window" class="btn btn-primary btn-xs" role="button">
                                                        预览
                                                    </a>
                                                    <a href="{{url("editsidemenu/$page->id")}}" class="btn btn-primary btn-xs" role="button">
                                                        编辑
                                                    </a>
                                                    @if($page->num>1)
                                                        <a href="{{url("sidemenuup/$page->id")}}">
                                                            <input type="button" class="btn btn-xs btn-info" value="上移">
                                                        </a>
                                                    @endif
                                                    @if($page->num <count($ch2))
                                                        <a href="{{url("sidemenudown/$page->id")}}">
                                                            <input type="button" class="btn btn-xs btn-warning" value="下移">
                                                        </a>
                                                    @endif
                                                    @php
                                                        $chils = \App\Sidemenu::where('preid','=', $page->id)->get();
                                                        $num = count($chils);
                                                        $drens = \App\Menu::where('sideid','=',$page->id)->get();
                                                        $ans = count($drens);
                                                    @endphp
                                                    <a href="{{url("sidedelete/$page->id")}}"  @if($num >0 || $ans>0) disabled onclick="return confirm('存在子标签不能删除')" @else onclick="return confirm('确认要删除吗？')" @endif  class="btn btn-danger btn-xs" role="button" >
                                                        删除
                                                    </a>

                                                </td>
                                            </tr>


                                        @endforeach
                                @endforeach

                        @endforeach
                    </table>
                </div>
                <div class="card-header">
                    <a href="{{route("newsidemenu")}}">
                        <input type="button" class="btn btn-primary" value="新建导航栏">
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
