<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="renderer" content="webkit">
  <title>红包列表</title>
  <link rel="stylesheet" href="{{url('css/common.css')}}">
  <link rel="stylesheet" href="{{url('css/function.css')}}"> 
</head>

<body>
  <div class="sub-container">

    <!-- 公有导航，作模版 -->
    <div class="sub-header">
      <img class="sub-header-img" src="{{url('images/sub-header.png')}}" alt="导航">
      <span>红包列表</span>
    </div>
    <!-- /公有导航 -->

    <!-- 红包操作 -->
    <ul class="staff-operation">
      <li>
        <a href="moneyAdd.html">
          <img class="staff-icon" src="{{url('images/add.png')}}" alt="添加">
          <span>添加</span>
        </a>
      </li>
      <li id="money-edit">
        <img class="staff-icon" src="{{url('images/edit.png')}}" alt="编辑">
        <span>编辑</span>
      </li>
      <li id="money-delete">
        <img class="staff-icon" src="{{url('images/delete.png')}}" alt="删除">
        <span>删除</span>
      </li>
    </ul>
    <!-- /考试设置操作 -->

    <!-- 红包列表 -->
    <table class="table-list">
      <thead>
        <tr class="table-row">
          <th>#</th>
          <th>序号</th>
          <th>所属题库</th>
          <th>最低正确率</th>
          <th>最高正确率</th>
          <th>最低红包金额</th>
          <th>最高红包金额</th>
        </tr>
      </thead>
      <tbody class="table-body">
        <!-- 循环列表 -->
        <tr>
          <td>
            <input class="money-checkbox" data-id="1" type="checkbox">
          </td>
          <td>1</td>
          <td>题库一</td>
          <td>30%</td>
          <td>80%</td>
          <td>2元</td>
          <td>6元</td>
        </tr>
        <!-- /循环列表 -->
        <tr>
          <td>
            <input class="money-checkbox" data-id="2" type="checkbox">
          </td>
          <td>2</td>
          <td>题库二</td>
          <td>30%</td>
          <td>80%</td>
          <td>2元</td>
          <td>6元</td>
        </tr>
      </tbody>
    </table>
    <!-- /红包列表 -->
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