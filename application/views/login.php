<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="<?php echo base_url('assets/image/favicon.ico') ?>">

    <title>中国联通中山分公司薪酬系统</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css') ?>" rel="stylesheet">
    <!-- login -->
    <link href="<?php echo base_url('assets/css/default.css') ?>" rel="stylesheet">
    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js' ?>"></script><![endif]-->

    <link href="<?php echo base_url('assets/css/signin/signin.css') ?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
</head>
<body>
  
<br><br><br>
    <div class="container">

        <div class="panel panel-success tabs">   
            <div class="panel-heading">
            <img src="<?php echo base_url('assets/image/index-logo.png') ?>" > 
                <h1 class="pull-right  ">中国联通中山分公司政企薪酬系统</h1>
            </div>
            <div class="panel-body tab-content" >
            <form class="form-signin" action="" mothod="get">
                <h2 class="form-signin-heading">系统登录</h2>
                <p >请输入正确的工号和密码</p>
                <p style="display:none ;color: red;">密码错误，请仔细查看</p>
                <label for="user_id" class="sr-only">员工号</label>
                <input id="user_id"  class="form-control" placeholder="工号" required>
                <label for="password"  class="sr-only">密码</label>
                <input  name="password" id="password" class="form-control" placeholder="密码" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
                <a href="change_password.html" class="btn btn-lg btn-primary btn-block" >修改密码</a>
            </form>

            </div>
            <div class="panel-footer" >                        
            </div>
        </div> 

        <!--
        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="<?php echo base_url(''); ?>" type="button" class="btn btn-primary btn-rounded">客户经理</a>
                <a href="<?php echo base_url(''); ?>" type="button" class="btn btn-primary btn-rounded">团队经理</a>
                <a href="<?php echo base_url(''); ?>" type="button" class="btn btn-primary btn-rounded">行业总监</a>
                <a href="<?php echo base_url(''); ?>" type="button" class="btn btn-primary btn-rounded">区分总经理</a>
                <a href="<?php echo base_url(''); ?>" type="button" class="btn btn-primary btn-rounded">政企经理</a>
                <a href="<?php echo base_url(''); ?>" type="button" class="btn btn-primary btn-rounded">政企总经理</a>
            </div>
        </div>
        -->
    </div> <!-- /container -->
	
</body>
</html>
