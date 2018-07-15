<?php /*a:5:{s:70:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\article\artlist.html";i:1529335299;s:69:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\\layout.html";i:1529335299;s:68:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\header.html";i:1529335299;s:65:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\nav.html";i:1529335299;s:66:"C:\php\PHPTutorial\WWW\tp5\application/admin/view\public\left.html";i:1529335299;}*/ ?>
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
				

<h4 class="text-success text-center">文章管理</h4>

<table class="table table-striped table-hover text-center">
	<tr>
		<td>ID</td>
		<td>标题</td>
		<td>栏目</td>
		<?php if(app('session')->get('is_admin') == '1'): ?>
		<td>作者</td>
		<?php endif; ?>
		<td>阅读量</td>
		<td>创建时间</td>
		<td colspan="2">操作</td>
	</tr>
	<?php if(is_array($artList) || $artList instanceof \think\Collection || $artList instanceof \think\Paginator): $i = 0; $__LIST__ = $artList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
	<tr>
		<td><?php echo htmlentities($art['id']); ?></td>
		<td class="text-left"><?php echo htmlentities($art['title']); ?></td>
		<td><?php echo htmlentities(getCateName($art['cate_id'])); ?></td>

		<?php if(app('session')->get('is_admin') == '1'): ?>
		<td><?php echo htmlentities(getUserName($art['user_id'])); ?></td>
		<?php endif; ?>
		<td><?php echo htmlentities($art['pv']); ?></td>
		<td><?php echo htmlentities($art['create_time']); ?></td>
		
		<td><a href="<?php echo url('article/artEdit',['id'=>$art['id']]); ?>">编辑</a></td>
		<td><a href="" onclick="dele(<?php echo htmlentities($art['id']); ?>);return false;">删除</a></td>
	</tr>
	<?php endforeach; endif; else: echo "$empty" ;endif; ?>
</table>

<!-- 显示分页条 -->
<div class="text-center"><?php echo $artList; ?></div>


<script>
	function dele(id)
	{
		if(confirm('您真的要删除吗?') == true){
			window.location.href = "<?php echo url('article/doDelete'); ?>"+"?id="+id;			
		}
	}
</script>






			</div>
		</div>

</div>
</body>
</html>