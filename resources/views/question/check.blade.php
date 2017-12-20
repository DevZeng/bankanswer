<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>题库查看</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">
    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>题库查看</span>
    </div>
    <!-- /公有导航 -->

    <div class="sub-sub-header">
        这是题库：{{$warehouse->name}}
    </div>

    <!-- 题库查看操作 -->
    <ul class="staff-operation">
        <li>
            <a href="{{url('add/question')}}">
                <img class="staff-icon" src="{{url('images/add.png')}}" alt="添加">
                <span>添加</span>
            </a>
        </li>
        <li id="question-edit">
            <img class="staff-icon" src="{{url('images/edit.png')}}" alt="编辑">
            <span>编辑</span>
        </li>
        <li id="question-delete">
            <img class="staff-icon" src="{{url('images/delete.png')}}" alt="删除">
            <span>删除</span>
        </li>
    </ul>
    <!-- /题库查看操作 -->

    <!-- 题库查看列表 -->
    <table class="table-list">
        <thead>
        <tr class="table-row">
            <th>#</th>
            <th>序号</th>
            <th style="width: 450px;">题目</th>
            <th>A选项</th>
            <th>B选项</th>
            <th>C选项</th>
            <th>D选项</th>
            <th>正确答案</th>
        </tr>
        </thead>
        <tbody class="table-body">
        <!-- 循环列表 -->
        @foreach($questions as $question)
        <tr>
            <td>
                <input class="question-checkbox" data-warehouse="{{$question->warehouse_id}}" data-id="{{$question->id}}" type="checkbox">
            </td>
            <td>{{$question->id}}</td>
            <td title="{{$question->topic}}">{{$question->topic}}</td>
            <td>{{$question->option_a}}</td>
            <td>{{$question->option_b}}</td>
            <td>{{$question->option_c}}</td>
            <td>{{$question->option_d}}</td>
            <td>{{$question->answer}}</td>
        </tr>
        @endforeach
        <!-- /循环列表 -->

        </tbody>
    </table>
    {!! $questions->links() !!}
    <!-- /题库查看列表 -->
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