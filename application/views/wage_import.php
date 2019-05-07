<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url('assets/image/favicon.ico') ?>">

  <title>中国联通中山分公司薪酬系统</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css') ?>" rel="stylesheet">
  <!-- login -->
  <link href="<?php echo base_url('assets/css/default.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/navcss/carousel.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/page/pager.css') ?>" rel="stylesheet">
  <!-- Custom styles for this template -->

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js') ?>"></script><![endif]-->



</head>
<body>
  <nav class="navbar  navbar-inverse navbar-fixed-top" >
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand " style="color: white;" href="">中国联通中山分公司薪酬系统</a>
      </div>
      <div id="navbar" class="navbar-collapse navbar-right collapse">
        <ul class="nav navbar-nav">
          <li >
            <a href="company.html" >公司业务概况</a>
          </li>
          <li class="active">
            <a href="index.html" >个人主页</a>
          </li>
          <li class="dropdown ">
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">登录/退出 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../admin_login.html" class="list-group-item ">重新登录</a></li>
              <li><a href="../change_password.html" class="list-group-item ">修改密码</a></li>
              <li><a href="../admin_login.html" class="list-group-item ">退出登录</a></li>
            </ul>
          </li>

        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <div class="page-content-wrap">
    <br>
    <div class=" col-lg-1 col-md-1 "></div>
    <div class=" col-lg-10 col-md-10 col-xs-12 col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">上传文件</h3> 
        </div>
        <div class="panel-body" id="student_infor">   
          <form action="<?php echo base_url('auth/wage_import') ?>" method="post"
              name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
              <div>
                  <label><h4>选择</h4></label> 
                  <br />
                  <br />
                  <h5><input type="file" name="file" id="file" accept=".xls,.xlsx"/></h5>
                  <br />
                  <button type="submit" id="submit" name="import" class="btn btn-warning" >导入</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>                    
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
<script src="<?php echo base_url('assets/hc7_code/highcharts.js') ?>"></script>
<script src="<?php echo base_url('assets/hc7_code/modules/heatmap.js') ?>"></script>
<script src="<?php echo base_url('assets/hc7_code/modules/series-label.js') ?>"></script>
<script src="<?php echo base_url('assets/hc7_code/modules/data.js') ?>"></script>
<script src="<?php echo base_url('assets/hc7_code/modules/drilldown.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/faq.js') ?>"></script>
<script src="<?php echo base_url('assets/js/page/pager.js') ?>"></script>
<script src="<?php echo base_url('assets/js/govern_and_enter_head/govern_and_enter_head.js') ?>"></script>


<script type="text/javascript">

</script>
</body>
</html>
