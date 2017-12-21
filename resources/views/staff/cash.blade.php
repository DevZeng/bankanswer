<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>添加职员</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">

    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>兑现列表</span>
    </div>
    <!-- /公有导航 -->


    <!-- 兑现列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>序号</th>
            <th>真名</th>
            <th>登录工号</th>
            <th>兑现金额</th>
            <th>兑现时间</th>
            <th>兑现状态</th>
        </tr>
        </thead>
        <tbody class="table-body">
        <!-- 循环列表 -->
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->staff()->name}}</td>
            <td>{{$order->staff()->username}}</td>
            <td>{{$order->cash}}元</td>
            <td>{{$order->created_at}}</td>
            <td>{{($order->state==1)?'成功':'失败'}}</td>
        </tr>
        @endforeach
        <!-- /循环列表 -->
        </tbody>
        {!! $orders->links() !!}
    </table>
    <!-- /兑现列表 -->
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