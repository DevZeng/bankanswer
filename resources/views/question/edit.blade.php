<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>题目编辑</title>
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
<div class="sub-container">
    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
        <span>题目编辑</span>
    </div>
    <!-- /公有导航 -->

    <!-- 题目编辑表单 -->
    <div class="staff-add-form">
        <form method="post">
            {{csrf_field()}}
            <label class="label-control">
                <span class="label-text">题目：</span>
                <textarea class="input-control" rows="4" style="width: 400px;" required type="text" name="topic" placeholder="请输入题目">{{$question->topic}}</textarea>
            </label>
            <label class="label-control">
                <span class="label-text">A：</span>
                <input class="input-control" required type="text" name="option_a" value="{{$question->option_a}}" placeholder="选项A答案">
            </label>
            <label class="label-control">
                <span class="label-text">B：</span>
                <input class="input-control" required type="text" name="option_b" value="{{$question->option_b}}" placeholder="选项B答案">
            </label>
            <label class="label-control">
                <span class="label-text">C：</span>
                <input class="input-control" required type="text" name="option_c" value="{{$question->option_c}}" placeholder="选项C答案">
            </label>
            <label class="label-control">
                <span class="label-text">D：</span>
                <input class="input-control" required type="text" name="option_d" value="{{$question->option_d}}" placeholder="选项D答案">
            </label>
            <label class="label-control">
                <span class="label-text">答案：</span>
                <label class="radio-label">
                    <input type="checkbox" name="answer[]" value="a">A
                </label>
                <label class="radio-label">
                    <input type="checkbox" name="answer[]" value="b">B
                </label>
                <label class="radio-label">
                    <input type="checkbox" name="answer[]" value="c">C
                </label>
                <label class="radio-label">
                    <input type="checkbox" name="answer[]" value="d">D
                </label>
            </label>
            <div class="staff-add-btns">
                <input type="submit" class="btn success" value="提交"></input>
                <input type="reset" class="btn info"></input>
            </div>
        </form>
    </div>
    <!-- /题目编辑表单 -->

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