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
        <span>题库添加</span>
    </div>
    <!-- /公有导航 -->

    <!-- 员工添加表单 -->
    <div class="staff-add-form">
        <form id="questions-submit">
            <label class="label-control">
                <span class="label-text">题库名：</span>
                <input class="input-control" required type="text" name="question_name" placeholder="题库名">
            </label>
            <label class="label-control">
                <span class="label-text">题库类型：</span>
                <select class="input-control" required name="examination_question">
                    <option value="1">练习题库</option>
                    <option value="2">考试题库</option>
                </select>
            </label>
            <div class="staff-add-btns">
                <input type="submit" class="btn success" value="提交"></input>
                <input type="reset" class="btn info"></input>
            </div>
        </form>
    </div>
    <!-- /员工添加表单 -->

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
</div>
</body>

</html>