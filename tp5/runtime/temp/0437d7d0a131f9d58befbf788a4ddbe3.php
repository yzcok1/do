<?php /*a:5:{s:68:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\user\useredit.html";i:1529335299;s:68:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\layout.html";i:1529335299;s:68:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\header.html";i:1529335299;s:65:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\nav.html";i:1529335299;s:66:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\left.html";i:1529335299;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo htmlentities((isset($title) && ($title !== '')?$title:"页面标题")); ?></title>
	<!-- 使用load标签加载资源文件 -->
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
	<script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">	
		<div class="row">
			<div class="col-md-12">


			

	




				<!-- 顶部导航 -->
			<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo url('index/index'); ?>"><?php echo htmlentities((isset($title) && ($title !== '')?$title:"后台管理")); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
 
      
      <ul class="nav navbar-nav navbar-right">
        
      <!-- 根据session判断用户是否登录,显示不同的内容 -->
     <?php if(app('session')->get('user_id')): ?>  
        <li><a href=""><?php echo htmlentities(app('session')->get('user_name')); ?></a></li>
        <li><a href="/index.php">回到首页</a></li>
      <li><a href="<?php echo url('user/logout'); ?>">退出登录</a></li>
        <?php endif; ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 text-center">
				<!-- 左侧菜单 -->
				<!-- 左侧4列 -->
<!-- 非超级管理员是不允许进行系统管理操作的 -->
<?php if(app('session')->get('is_admin') == '1'): ?>
<ul class="nav nav-pills nav-stacked">
	<li class="nav-header h3">系统管理</li>
	<li>
		<a href="<?php echo url('site/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;网站管理</a>
	</li>
</ul>
<?php endif; ?>
<ul class="nav nav-pills nav-stacked">
	<li class="nav-header h3">用户管理</li>
	<li><a href="<?php echo url('user/userList'); ?>"><span class="glyphicon glyphicon-user"></span>&nbsp;用户列表</a></li>
</ul>

<ul class="nav nav-pills nav-stacked">
	<li class="nav-header h3">文章管理</li>
	<?php if(app('session')->get('is_admin') == '1'): ?>
	<li><a href="<?php echo url('cate/cateList'); ?>"><span class="glyphicon glyphicon-lock"></span>&nbsp;分类管理</a></li>
	<?php endif; ?>
	<li><a href="<?php echo url('article/artList'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;文章管理</a></li>
</ul>




			</div>
			<!-- 右侧功能区 -->
			<div class="col-md-10">
				<!-- 用户自定义区块 -->
				

<h4 class="text-center text-danger">编辑用户信息</h4>
<form class="form-horizontal" action="<?php echo url('user/doEdit'); ?>" method="post">
  <div class="form-group">
    <label class="col-sm-2 control-label">用户名:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php echo htmlentities($userInfo['name']); ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">邮箱:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="<?php echo htmlentities($userInfo['email']); ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">手机:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="mobile" value="<?php echo htmlentities($userInfo['mobile']); ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">密码:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" value="<?php echo htmlentities($userInfo['password']); ?>">
    </div>
  </div>
  <!-- 将当前用户的id做为隐藏域悄悄的传到服务器上 -->
  <input type="hidden" name="id" value="<?php echo htmlentities($userInfo['id']); ?>">
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">保存</button>
    </div>
  </div>
</form>







			</div>
		</div>

</div>
</body>
</html>