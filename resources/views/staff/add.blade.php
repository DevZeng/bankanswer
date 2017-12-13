<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>添加职员</title>
    <link rel="stylesheet" href="../../assets/css/common.css">
    <link rel="stylesheet" href="../../assets/css/function.css">
</head>

<body>
<div class="sub-container">

    <!-- 公有导航，作模版 -->
    <div class="sub-header">
        <img class="sub-header-img" src="../../assets/images/sub-header.png" alt="导航">
        <span>添加职员</span>
    </div>
    <!-- /公有导航 -->

    <!-- 员工添加表单 -->
    <div class="staff-add-form">
        <form id="staff-submit">
            <label class="label-control">
                <span class="label-text">登录工号：</span>
                <input class="input-control" required type="text" name="staff_number" placeholder="登录工号">
            </label>
            <label class="label-control">
                <span class="label-text">密码：</span>
                <input class="input-control" required type="text" name="staff_password" placeholder="默认密码123456">
            </label>
            <label class="label-control">
                <span class="label-text">真名：</span>
                <input class="input-control" required type="text" name="staff_name" placeholder="真名">
            </label>
            <label class="label-control">
                <span class="label-text">性别：</span>
                <label class="radio-label">
                    <input type="radio" required name="staff_sex" value="男">男
                </label>
                <label class="radio-label">
                    <input type="radio" required name="staff_sex" value="女">女
                </label>
            </label>
            <label class="label-control">
                <span class="label-text">联系电话：</span>
                <input class="input-control" required type="text" name="staff_phone" placeholder="联系电话">
            </label>
            <div class="staff-add-btns">
                <input type="submit" class="btn success" value="提交"></input>
                <input type="reset" class="btn info"></input>
            </div>
        </form>
    </div>
    <!-- /员工添加表单 -->

    <!-- 通用引入 -->
    <script src="../../assets/js/jquery1.9.1.min.js"></script>
    <script src="../../assets/js/common.js"></script>
    <!-- /通用引入 -->
</div>
</body>

</html>