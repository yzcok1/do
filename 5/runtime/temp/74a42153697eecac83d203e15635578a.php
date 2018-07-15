<?php /*a:6:{s:65:"C:\php\PHPTutorial\WWW\5\application\index\view\index\insert.html";i:1531645259;s:64:"C:\php\PHPTutorial\WWW\5\application\index\view\public\base.html";i:1531238672;s:67:"C:\php\PHPTutorial\WWW\5\application\index\view\public\\header.html";i:1531643782;s:64:"C:\php\PHPTutorial\WWW\5\application\index\view\public\\nav.html";i:1530722299;s:66:"C:\php\PHPTutorial\WWW\5\application\index\view\public\\right.html";i:1531313446;s:67:"C:\php\PHPTutorial\WWW\5\application\index\view\public\\footer.html";i:1531314990;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo htmlentities((isset($title) && ($title !== '')?$title:"页面标题")); ?></title>
	<!-- 使用load标签加载资源文件 -->
	<link rel="stylesheet" type="text/css" href="/static/css/main.app.d2dd6db6ff3cb2a14307.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
	<script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/static/css/ss.css" />
	<script type="text/javascript" src="/static/nicedit/nicEdit.js"></script>
</head>
<body data-spy="scroll" data-target="sidebarMenu">
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
        
        <?php if(empty(app('request')->param('cate_id')) || ((app('request')->param('cate_id') instanceof \think\Collection || app('request')->param('cate_id') instanceof \think\Paginator ) && app('request')->param('cate_id')->isEmpty())): if(empty(app('request')->param('id')) || ((app('request')->param('id') instanceof \think\Collection || app('request')->param('id') instanceof \think\Paginator ) && app('request')->param('id')->isEmpty())): ?>
        class="active"
		<?php endif; endif; ?>
		
        ><a href="<?php echo url('index/index/index'); ?>">首页</a></li>
        <?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
        <li
        

		<?php if($cate['id']==app('request')->param('cate_id')): ?>class="active"<?php endif; if($cate['id'] == $art['cate_id']): ?>class="active"<?php endif; ?>
		
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



			

	






<!-- 复制登录表单 -->
<div class="row">
		<!-- 左侧8列 -->
		<div class="col-md-8">
		<!-- 页头 -->
		<div class="page-header">
  			<h2>发布文章</h2>
		</div>
		<!-- 注册表单:采用水平表单 -->
		<form action="<?php echo url('index/index/save'); ?>" enctype="multipart/form-data" method="post">
			<!-- 用隐藏域向服务器传送作者:当用发布文章的用户id -->
                <input type="hidden" name="user_id" value="<?php echo htmlentities(app('session')->get('user_id')); ?>">
                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="文章标题">
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
                   
                </textarea>                   
                </div>
				<div class="form-group">
                    <label for="title_img">标题图片</label>
                    <input type="file" name="title_img" id="title_img">
                    <p class="help-block"></p>
                </div>
				
                <!-- 这里使用原生的post提交 -->
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
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


<!-- 右侧4列 -->
	
		<div class="col-md-4 "   >
			<div class="page-header"> <h3>热门浏览</h3> </div> 
			<!-- 列表使用:列表组来做 -->
			<div class="list-group">
				<?php if(is_array($hotArtList) || $hotArtList instanceof \think\Collection || $hotArtList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotArtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
					<a href="<?php echo url('detail',['id'=>$art['id']]); ?>" class="list-group-item
						<?php if($i == '1'): ?>active<?php endif; ?>"><?php echo mb_substr(strip_tags($art['title']),0,20); ?>
						<span class="badge">
						<?php echo htmlentities($art['pv']); ?>
						</span>
					</a>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		
	
<!-- 底部开始 -->
</div><!-- <div class="row"> -->
	<footer style="clear:both;margin:10px 0px 100px 0px;; class="container-fluid foot-wrap">
    <!--采用container，使得页尾内容居中 -->
        <div class="container">
            <div class="row">
               

            </div><!--/.row -->
        </div><!--/.container-->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

</body>
</html>
<!-- 底部结束 -->