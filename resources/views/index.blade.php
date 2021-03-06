<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>银行后台管理系统</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}">
</head>

<body>
<!--[if lt IE 8]>
<div class="alert alert-danger">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验.</div>
<![endif]-->
<div class="container">

    <!-- 头部 -->
    <div class="index-header clearfix">
        <div class="index-header-left pull-left">欢迎您，</div>
        <div class="index-header-right pull-right">退出</div>
    </div>
    <!-- /头部 -->

    <div class="index-content">

        <!-- 左侧导航 -->
        <ul class="navbar-list">
            <li class="navbar-title">
                <img class="navbar-title-img" src="{{url('images/nav-title.png')}}" alt="功能导航">
                <span>功能导航</span>
            </li>
            {{--<li class="navbar-item">--}}
                {{--<div class="navbar-item-wrap">--}}
                    {{--<img class="navbar-title-img" src="{{url('images/nav-icon.png')}}" alt="导航">--}}
                    {{--<span>日常办公</span>--}}
                {{--</div>--}}
            {{--</li>--}}
            <li class="navbar-item">
                <div class="navbar-item-wrap">
                    <img class="navbar-title-img" src="{{url('images/nav-icon.png')}}" alt="导航">
                    <span>职员管理</span>
                    <img class="navbar-item-arrow" src="{{url('images/arrow-left.png')}}" alt="展开">
                    <img class="navbar-item-arrow down" src="{{url('images/arrow-down.png')}}" alt="展开">
                </div>
                <ul class="navbar-sub-list">
                    <li class="navbar-sub-item" data-route="{{url('add/staff')}}">添加职员</li>
                    <li class="navbar-sub-item" data-route="{{url('list/staff')}}">职员列表</li>
                    <li class="navbar-sub-item" data-route="{{url('orders')}}">兑现列表</li>
                </ul>
            </li>
            <li class="navbar-item">
                <div class="navbar-item-wrap">
                    <img class="navbar-title-img" src="{{url('images/nav-icon.png')}}" alt="导航">
                    <span>题库管理</span>
                    <img class="navbar-item-arrow" src="{{url('images/arrow-left.png')}}" alt="展开">
                    <img class="navbar-item-arrow down" src="{{url('images/arrow-down.png')}}" alt="展开">
                </div>
                <ul class="navbar-sub-list">
                    <li class="navbar-sub-item" data-route="{{url('list/warehouse')}}">题库管理</li>
                </ul>
            </li>
            <li class="navbar-item">
                <div class="navbar-item-wrap">
                    <img class="navbar-title-img" src="{{url('images/nav-icon.png')}}" alt="导航">
                    <span>考试管理</span>
                    <img class="navbar-item-arrow" src="{{url('images/arrow-left.png')}}" alt="展开">
                    <img class="navbar-item-arrow down" src="{{url('images/arrow-down.png')}}" alt="展开">
                </div>
                <ul class="navbar-sub-list">
                    <li class="navbar-sub-item" data-route="{{url('exams')}}">考试设置</li>
                    <li class="navbar-sub-item" data-route="{{url('results')}}">结果查询</li>
                </ul>
            </li>
            <li class="navbar-item">
                <div class="navbar-item-wrap">
                    <img class="navbar-title-img" src="{{url('images/nav-icon.png')}}" alt="导航">
                    <span>红包管理</span>
                    <img class="navbar-item-arrow" src="{{url('images/arrow-left.png')}}" alt="展开">
                    <img class="navbar-item-arrow down" src="{{url('images/arrow-down.png')}}" alt="展开">
                </div>
                <ul class="navbar-sub-list">
                    <li class="navbar-sub-item" data-route="{{url('redpackets')}}">红包列表</li>
                </ul>
            </li>
            <li class="navbar-item">
                <div class="navbar-item-wrap">
                    <img class="navbar-title-img" src="{{url('images/nav-icon.png')}}" alt="导航">
                    <span>系统管理</span>
                    <img class="navbar-item-arrow" src="{{url('images/arrow-left.png')}}" alt="展开">
                    <img class="navbar-item-arrow down" src="{{url('images/arrow-down.png')}}" alt="展开">
                </div>
                <ul class="navbar-sub-list">
                    <li class="navbar-sub-item" data-route="{{url('admins')}}">管理员列表</li>
                </ul>
            </li>
        </ul>
        <!-- /左侧导航 -->

        <!-- 内容 -->
        <div class="iframe-content">
            <iframe id="iframe" width="100%" height="100%" src="" frameborder="0"></iframe>
        </div>
        <!-- /内容 -->
    </div>

    <div class="index-footer">&copy; Sennki All Rights Reserved</div>
</div>

<!-- 通用引入 -->
<script src="{{url('js/jquery1.9.1.min.js')}}"></script>
<script src="{{url('js/common.js')}}"></script>
<!-- /通用引入 -->
</body>

</html>