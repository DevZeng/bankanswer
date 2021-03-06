<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>考试设置</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">

    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>考试设置</span>
    </div>
    <!-- /公有导航 -->

    <!-- 考试设置操作 -->
    <ul class="staff-operation">
        <li>
            <a href="{{url('add/exam')}}">
                <img class="staff-icon" src="{{url('images/add.png')}}" alt="添加">
                <span>添加</span>
            </a>
        </li>
        <li id="examination-edit">
            <img class="staff-icon" src="{{url('images/edit.png')}}" alt="编辑">
            <span>编辑</span>
        </li>
        <li id="examination-delete">
            <img class="staff-icon" src="{{url('images/delete.png')}}" alt="删除">
            <span>删除</span>
        </li>
    </ul>
    <!-- /考试设置操作 -->

    <!-- 题库查看列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>#</th>
            <th>序号</th>
            <th>考试名称</th>
            <th>题库</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>发布时间</th>
            <th>考试时长</th>
        </tr>
        </thead>
        <tbody class="table-body">
        <!-- 循环列表 -->
        <tr>
            <td>
                <input class="examination-checkbox" data-id="1" type="checkbox">
            </td>
            <td>1</td>
            <td>考试一</td>
            <td>题库一</td>
            <td>2017-12-01</td>
            <td>2017-12-02</td>
            <td>2017-11-28</td>
            <td>15分钟</td>
        </tr>
        <!-- /循环列表 -->
        <tr>
            <td>
                <input class="examination-checkbox" data-id="2" type="checkbox">
            </td>
            <td>2</td>
            <td>考试二</td>
            <td>题库二</td>
            <td>2017-12-01</td>
            <td>2017-12-02</td>
            <td>2017-11-28</td>
            <td>15分钟</td>
        </tr>
        </tbody>
    </table>
    <!-- /题库查看列表 -->
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