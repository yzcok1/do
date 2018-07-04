<?php /*a:5:{s:66:"C:\php\PHPTutorial\WWW\tp51\application/admin/view\site\index.html";i:1529335299;s:70:"C:\php\PHPTutorial\WWW\tp51\application/admin/view\public\\layout.html";i:1529335299;s:69:"C:\php\PHPTutorial\WWW\tp51\application/admin/view\public\header.html";i:1529335299;s:66:"C:\php\PHPTutorial\WWW\tp51\application/admin/view\public\nav.html";i:1529335299;s:67:"C:\php\PHPTutorial\WWW\tp51\application/admin/view\public\left.html";i:1529335299;}*/ ?>
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
				
<h4 class="text-danger text-center">站点管理</h4>

<form action="<?php echo url('site/save'); ?>" method="post">
	<!-- 用隐藏域向服务器传idd -->
	<input type="hidden" name="id" value="<?php echo htmlentities($siteInfo['id']); ?>">

	<div class="form-group">
	    <label for="title">网站名称</label>
	    <input type="text" name="title" class="form-control" id="title" value="<?php echo htmlentities($siteInfo['title']); ?>">
	</div>

	<div class="form-group">
	    <label for="keywords">关键字:</label>
	    <input type="text" name="keywords" class="form-control" id="keywords" value="<?php echo htmlentities($siteInfo['keywords']); ?>">
	</div>

	<div class="form-group" >
	<label>网站描述</label> 
	<textarea id="editor"  class="form-control" placeholder="文章内容" id="content" name="content" style="min-height: 100px;"><?php echo htmlentities($siteInfo['desc']); ?></textarea>                   
	</div>
	
	
	<div class="form-group">
    <label">网站是否开启:</label>   
      <label class="radio-inline">
        <input type="radio" name="is_open"  value="1"
      
      <?php if($siteInfo['is_open'] == '1'): ?>
        checked=""
      <?php endif; ?>

        > 开启
      </label>
      <label class="radio-inline">
        <input type="radio" name="is_open"  value="0" 
      
      <?php if($siteInfo['is_open'] == '0'): ?>
        checked=""
      <?php endif; ?>

        > <span class="text-danger">关闭</span>
      </label>
	</div>
	
	
	<?php if($siteInfo['is_open'] == '1'): ?>

	
	<div class="form-group">
    <label">是否允许注册:</label>   
      <label class="radio-inline">
        <input type="radio" name="is_reg"  value="1"
      
      <?php if($siteInfo['is_reg'] == '1'): ?>
        checked=""
      <?php endif; ?>

        > 允许
      </label>
      <label class="radio-inline">
        <input type="radio" name="is_reg"  value="0" 
      
      <?php if($siteInfo['is_reg'] == '0'): ?>
        checked=""
      <?php endif; ?>

     

        > <span class="text-danger">禁止</span>
      </label>
	</div>

	 <?php endif; ?>






	
	<!-- 这里使用原生的post提交 -->
	<button type="submit" class="btn btn-primary">保存</button>
</form>







			</div>
		</div>

</div>
</body>
</html>