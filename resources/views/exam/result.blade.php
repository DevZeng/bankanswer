<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>结果查询</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">

    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>结果查询</span>
    </div>
    <!-- /公有导航 -->

    <!-- 考试设置操作 -->
    <!-- /考试设置操作 -->

    <!-- 结果列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>序号</th>
            <th>真名</th>
            <th>登录工号</th>
            <th>时间</th>
            <th>分数</th>
        </tr>
        </thead>
        <tbody class="table-body">
        <!-- 循环列表 -->
        @foreach($results as $result)
        <tr>
            <td>{{$result->id}}</td>
            <td>{{$result->staff()->name}}</td>
            <td>{{$result->staff()->username}}</td>
            <td>{{$result->created_at}}</td>
            <td>{{$result->score}}分</td>
        </tr>
        @endforeach
        <!-- /循环列表 -->
        </tbody>
    </table>
    <!-- /结果列表 -->
</div>


@if (session('status'))
{{--    {{dd(session('status'))}}--}}
    <script type="text/javascript">
        console.log({{session('status')}})
        alert("{{session('status')}}")
    </script>

@endif
<!-- 通用引入 -->
<script src="{{url('js/jquery1.9.1.min.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
<!-- /通用引入 -->
</body>

</html>