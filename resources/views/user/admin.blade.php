<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>系统管理</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">

    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>系统管理</span>
    </div>
    <!-- /公有导航 -->

    <!-- 结果列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>序号</th>
            <th>管理员名称</th>
            <th>添加时间</th>
        </tr>
        </thead>
        <tbody class="table-body">
        <!-- 循环列表 -->
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->created_at}}</td>
        </tr>
        @endforeach
        <!-- /循环列表 -->
        </tbody>
    </table>
    <!-- /结果列表 -->
    {!! $users->links() !!}
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