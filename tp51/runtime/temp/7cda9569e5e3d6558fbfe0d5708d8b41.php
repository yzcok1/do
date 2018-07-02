<?php /*a:6:{s:75:"D:\myphp_www\PHPTutorial\WWW\tp51\application/index/view\user\register.html";i:1517046030;s:73:"D:\myphp_www\PHPTutorial\WWW\tp51\application/index/view\public\base.html";i:1517045398;s:76:"D:\myphp_www\PHPTutorial\WWW\tp51\application/index/view\public\\header.html";i:1529736060;s:73:"D:\myphp_www\PHPTutorial\WWW\tp51\application/index/view\public\\nav.html";i:1517565328;s:74:"D:\myphp_www\PHPTutorial\WWW\tp51\application/index/view\public\right.html";i:1517569256;s:76:"D:\myphp_www\PHPTutorial\WWW\tp51\application/index/view\public\\footer.html";i:1530061429;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo htmlentities((isset($title) && ($title !== '')?$title:"页面标题")); ?></title>
	<!-- 使用load标签加载资源文件 -->
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
	<script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="/static/nicedit/nicEdit.js"></script>
</head>
<body>
	<!-- 测试jquery与bootsrap是否加载成功 -->
	<!-- <div class="alert alert-success" role="alert">加载成功</div> -->
	<!-- 创建栅格布局 -->
	<div class="container">
		<!-- 导航 -->
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo url('index/index'); ?>"><?php echo htmlentities((isset($siteName) && ($siteName !== '')?$siteName:"社区问答")); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li
        
        <?php if(empty(app('request')->param('cate_id')) || ((app('request')->param('cate_id') instanceof \think\Collection || app('request')->param('cate_id') instanceof \think\Paginator ) && app('request')->param('cate_id')->isEmpty())): ?>
        class="active"
        <?php endif; ?>
        ><a href="<?php echo url('index/index/index'); ?>">首页</a></li>
        <?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
        <li
        
        <?php if($cate['id'] == app('request')->param('cate_id')): ?>  
         class="active"
        <?php endif; ?>


         ><a href="<?php echo url('index/index',['cate_id'=> $cate['id']]); ?>"><?php echo htmlentities($cate['name']); ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        
      </ul>
      <!-- 将搜索表单放在右边 -->
      
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" action="<?php echo url('index'); ?>" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="输入关键字" name="keywords">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <!-- 根据session判断用户是否登录,显示不同的内容 -->
     <?php if(app('session')->get('user_id')): ?>  
        <li><a href="#"><?php echo htmlentities(app('session')->get('user_name')); ?></a></li>
      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">操作<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo url('index/insert'); ?>">发布文章</a></li>
            <li role="separator" class="divider"></li>
            <!-- 跳转到后台的管理中心 -->
            <li>
              <a
               href="/admin.php">管理中心</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo url('user/logout'); ?>">退出登录</a></li>
          </ul>
        </li>
        <?php else: ?>
          <li><a href="<?php echo url('user/login'); ?>">登录</a></li>

          <li><a href="<?php echo url('user/register'); ?>">注册</a></li>
        

        <?php endif; ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
			</div>
		</div>
<!-- 头部结束-->



			

	






	<!-- 主体 -->
	<div class="row">
		<!-- 左侧8列 -->
		<div class="col-md-8">
		<!-- 页头 -->
		<div class="page-header">
  			<h2>用户注册</h2>
		</div>
		<!-- 注册表单:采用水平表单 -->
		<form class="form-horizontal" method="post" id="login">
  <div class="form-group">
    <label for="inputEmail1" class="col-sm-2 control-label">用户名:</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputEmail1" placeholder="UserName">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail2" class="col-sm-2 control-label">邮箱:</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" id="inputEmail2" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">手机:</label>
    <div class="col-sm-10">
      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="Mobile">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword4" class="col-sm-2 control-label">密码:</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword5" class="col-sm-2 control-label">确认密码:</label>
    <div class="col-sm-10">
      <input type="password" name="password_confirm" class="form-control" id="inputPassword5" placeholder="Password Confirm">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" id="register">注册</button>
    </div>
  </div>
</form>

	<!-- ajax提交当前表单 -->
<script type="text/javascript">
  $(function(){
    $('#register').on('click',function(){
      //用ajax提交用户信息 
      $.ajax({
        type: 'post',
        url: "<?php echo url('insert'); ?>",
        data: $('#login').serialize(),
        dataType: 'json',
        success: function(data){
          switch (data.status)
          {
            case 1:
              alert(data.message);
              window.location.href = "<?php echo url('index/index'); ?>";
            break;
            case 0:
            case -1:
              alert(data.message);
              window.location.back();
            break;
          }

        }
      })
  })
  })
</script>	 


<!-- 右侧4列 -->
	</div>
		<div class="col-md-4">
			<div class="page-header"> <h2>热门浏览</h2> </div> 
			<!-- 列表使用:列表组来做 -->
			<div class="list-group">
				<?php if(is_array($hotArtList) || $hotArtList instanceof \think\Collection || $hotArtList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotArtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
				<a href="<?php echo url('detail',['id'=>$art['id']]); ?>" class="list-group-item

				<?php if($i == '1'): ?>
				active
				<?php endif; ?>


					"><?php echo htmlentities($art['title']); ?><span class="badge"><?php echo htmlentities($art['pv']); ?></span></a>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>

		</div>
	
<!-- 底部开始 -->
</div>
	</div>
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


</body>
</html>
<!-- 底部结束 -->