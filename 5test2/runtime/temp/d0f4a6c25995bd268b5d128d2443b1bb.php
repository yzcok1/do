<?php /*a:5:{s:68:"C:\php\PHPTutorial\WWW\5\application\admin\view\article\artedit.html";i:1531645726;s:66:"C:\php\PHPTutorial\WWW\5\application\admin\view\public\layout.html";i:1529335299;s:66:"C:\php\PHPTutorial\WWW\5\application\admin\view\public\header.html";i:1529335299;s:63:"C:\php\PHPTutorial\WWW\5\application\admin\view\public\nav.html";i:1529335299;s:64:"C:\php\PHPTutorial\WWW\5\application\admin\view\public\left.html";i:1529335299;}*/ ?>
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
				

<h4 class="text-center text-danger">编辑文章</h4>
<!-- 使用前台添加文章的模板 -->
<form action="<?php echo url('article/doEdit'); ?>" enctype="multipart/form-data" method="post">
                <!-- 用隐藏域向服务器传送文章的d -->
                <input type="hidden" name="id" value="<?php echo htmlentities($artInfo['id']); ?>">
                <input type="hidden" name="user_id" value="<?php echo htmlentities($artInfo['user_id']); ?>">
                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo htmlentities($artInfo['title']); ?>">
                </div>
                <div class="form-group">
                    <label>分类</label>
                    <select class="form-control" name="cate_id"> <!--name与字段名对应-->
                        <?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($cate['id']); ?>"><?php echo htmlentities($cate['name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                
    
                <div class="form-group" >
                <label>内容</label> 

                <textarea id="editor"  class="form-control" placeholder="文章内容" id="content" name="content" style="min-height: 250px;">
                   <?php echo htmlentities($artInfo['content']); ?>
                </textarea>                   
                </div>

                <img src="/static\image\<?php echo htmlentities($artInfo['title_img']); ?>" width="100" class="img-rounded">
                <div class="form-group">
                    <label for="title_img">标题图片</label>
                    <input type="file" name="title_img" id="title_img">
                    <p class="help-block"></p>
                </div>
                <!-- 这里使用原生的post提交 -->
                <button type="submit" class="btn btn-primary">保存</button>
            </form>


            <script type="text/javascript" src="/static/nicedit/nicEdit.js"></script>

            <script type="text/javascript">
              var editor = $('#editor')
              if (editor.attr('id') !== undefined)
              {
                bkLib.onDomLoaded(function()
                {
                new nicEditor({
                    iconsPath : '/static/nicedit/nicEditorIcons.gif'
                }).panelInstance('editor')
                })
              }
            </script>




			</div>
		</div>

</div>
</body>
</html>