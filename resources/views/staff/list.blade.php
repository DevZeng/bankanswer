<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>职员列表</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">
    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>职员列表</span>
    </div>
    <!-- /公有导航 -->

    <!-- 职员操作 -->
    <ul class="staff-operation">
        <li>
            <a href="{{url('add/staff')}}">
                <img class="staff-icon" src="{{url('images/add.png')}}" alt="添加">
                <span>添加</span>
            </a>
        </li>
        <li id="staff-edit">
            <img class="staff-icon" src="{{url('images/edit.png')}}" alt="编辑">
            <span>编辑</span>
        </li>
        <li id="staff-delete">
            <img class="staff-icon" src="{{url('images/delete.png')}}" alt="删除">
            <span>删除</span>
        </li>
        <li id="staff-delete">
            <label style="cursor: pointer;">
                <img class="staff-icon" src="{{url('images/upload.png')}}" alt="上传">
                <span>上传职员列表</span>
                <input type="file" id="staff-upload" accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" hidden>
            </label>
        </li>
    </ul>
    <!-- /职员操作 -->


    <!-- 职员列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>#</th>
            <th>序号</th>
            <th>真名</th>
            <th>登录工号</th>
            <th>性别</th>
            <th>电话</th>
            <th>支付宝帐号</th>
            <th>添加时间</th>
        </tr>
        </thead>
        <tbody class="table-body">
        @foreach($staffs as $staff)
        <!-- 循环列表 -->
        <tr>
            <td>
                <input class="staff-checkbox" data-id="{{$staff->id}}" type="checkbox">
            </td>
            <td>{{$staff->id}}</td>
            <td>{{$staff->name}}</td>
            <td>{{$staff->username}}</td>
            <td>{{($staff->sex)==1?'男':'女'}}</td>
            <td>{{$staff->mobile}}</td>
            <td>{{$staff->account}}</td>
            <td>{{$staff->created_at}}</td>
        </tr>
        @endforeach
        <!-- /循环列表 -->
        </tbody>
        {!! $staffs->links() !!}
    </table>
    <!-- /职员列表 -->
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