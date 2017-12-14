<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="renderer" content="webkit">
  <title>红包添加</title>
  <link rel="stylesheet" href="{{url('css/common.css')}}">
  <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
  <div class="sub-container">
    <!-- 公有导航，作模版 -->
    <div class="sub-header">
      <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
      <span>红包添加</span>
    </div>
    <!-- /公有导航 -->

    <!-- 红包编辑表单 -->
    <div class="staff-add-form">
      <form id="money-submit">
        <label class="label-control">
          <span class="label-text">最低正确率：</span>
          <input class="input-control" required type="text" name="low_rate" placeholder="最低正确率">
        </label>
        <label class="label-control">
          <span class="label-text">最高正确率：</span>
          <input class="input-control" required type="text" name="high_rate" placeholder="最高正确率">
        </label>
        <label class="label-control">
          <span class="label-text">最低红包金额：</span>
          <input class="input-control" required type="text" name="low_money" placeholder="最低红包金额">
        </label>
        <label class="label-control">
          <span class="label-text">最高红包金额：</span>
          <input class="input-control" required type="text" name="high_money" placeholder="最高红包金额">
        </label>
        <label class="label-control">
          <span class="label-text">题库：</span>
          <select class="input-control" required name="questions">
            <option value="1">题库一</option>
            <option value="2">题库二</option>
            <option value="3">题库三</option>
          </select>
        </label>
        <div class="staff-add-btns">
          <input type="submit" class="btn success" value="提交"></input>
          <input type="reset" class="btn info"></input>
        </div>
      </form>
    </div>
    <!-- /红包编辑表单 -->

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