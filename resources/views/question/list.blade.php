<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>题库管理</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">
    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>题库管理</span>
    </div>
    <!-- /公有导航 -->

    <!-- 职员操作 -->
    <ul class="staff-operation">
        <li>
            <a href="{{url('warehouse')}}">
                <img class="staff-icon" src="{{url('images/add.png')}}" alt="添加">
                <span>添加</span>
            </a>
        </li>
        <li id="questions-delete">
            <img class="staff-icon" src="{{url('images/delete.png')}}" alt="删除">
            <span>删除</span>
        </li>
    </ul>
    <!-- /职员操作 -->

    <!-- 题库列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>#</th>
            <th>序号</th>
            <th>名称</th>
            <th>题库类型</th>
            <th>更新时间</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="table-body">
        @foreach($warehouses as $warehouse)
        <!-- 循环列表 -->
        <tr>
            <td>
                <input class="questions-checkbox" data-id="{{$warehouse->id}}" type="checkbox">
            </td>
            <td>{{$warehouse->id}}</td>
            <td>{{$warehouse->name}}</td>
            <td>{{$warehouse->type==1?"考试题库":'练习题库'}}</td>
            <td>{{$warehouse->updated_at}}</td>
            <td>{{$warehouse->created_at}}</td>
            <td>
                <a class="btn info" href="{{url('warehouse')}}?id={{$warehouse->id}}">查看</a>
                <a class="btn success" href="{{url('show/warehouse')}}/{{$warehouse->id}}">编辑</a>
            </td>
        </tr>
        <!-- /循环列表 -->
        @endforeach
        </tbody>
        {!! $warehouses->links() !!}
    </table>
    <!-- /题库列表 -->
</div>
@if (session('status'))
{{--    {{dd(session('status'))}}--}}
    <script type="text/javascript">
        alert("{{session('status')}}")
    </script>

@endif
<!-- 通用引入 -->
<script src="{{url('js/jquery1.9.1.min.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
<!-- /通用引入 -->
</body>

</html>