<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:79:"D:\myphp_www\PHPTutorial\WWW\5\public/../application/index\view\user\login.html";i:1531558190;s:70:"D:\myphp_www\PHPTutorial\WWW\5\application\index\view\public\base.html";i:1531471339;s:72:"D:\myphp_www\PHPTutorial\WWW\5\application\index\view\public\header.html";i:1531555034;s:69:"D:\myphp_www\PHPTutorial\WWW\5\application\index\view\public\nav.html";i:1531472466;s:71:"D:\myphp_www\PHPTutorial\WWW\5\application\index\view\public\right.html";i:1531558678;s:72:"D:\myphp_www\PHPTutorial\WWW\5\application\index\view\public\footer.html";i:1531356615;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo (isset($title) && ($title !== '')?$title:"页面标题"); ?></title>
	<!-- 使用load标签加载资源文件 -->
	<link rel="stylesheet" type="text/css" href="/static/css/main.app.d2dd6db6ff3cb2a14307.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
	<script type="text/javascript" src="/static/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/static/css/ss.css" />
<!-- 	<link rel="stylesheet" type="text/css" href="/static/css/reset_v4.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/detail_v3.css" /> -->
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
      <a class="navbar-brand" href="<?php echo url('index/index'); ?>"><?php echo (isset($siteName) && ($siteName !== '')?$siteName:"社区问答"); ?></a>
    </div>
	
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li
        
        <?php if(empty(\think\Request::instance()->param('cate_id')) || ((\think\Request::instance()->param('cate_id') instanceof \think\Collection || \think\Request::instance()->param('cate_id') instanceof \think\Paginator ) && \think\Request::instance()->param('cate_id')->isEmpty())): if(empty(\think\Request::instance()->param('id')) || ((\think\Request::instance()->param('id') instanceof \think\Collection || \think\Request::instance()->param('id') instanceof \think\Paginator ) && \think\Request::instance()->param('id')->isEmpty())): ?>
        class="active"
		<?php endif; endif; ?>
		
        ><a href="<?php echo url('index/index/index'); ?>">首页</a></li>
        <?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
        <li
        

		<?php if($cate['id']==\think\Request::instance()->param('cate_id')): ?>class="active"<?php endif; if($cate['id'] == $art['cate_id']): ?>class="active"<?php endif; ?>
		
		><a href="<?php echo url('index/index',['cate_id'=> $cate['id']]); ?>"><?php echo $cate['name']; ?></a></li>
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
     <?php if(\think\Session::get('user_id')): ?>  
        <li><a href="#"><?php echo \think\Session::get('user_name'); ?></a></li>
      
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
  			<h2>用户登录</h2>
		</div>
		<!-- 注册表单:采用水平表单 -->
		<form class="form-horizontal" method="post" id="login">
  

  <div class="form-group">
    <label for="inputEmail2" class="col-sm-2 control-label">邮箱:</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" id="inputEmail2" placeholder="Email">
    </div>
  </div>

  

  <div class="form-group">
    <label for="inputPassword4" class="col-sm-2 control-label">密码:</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" id="submit">登录</button>
    </div>
  </div>
</form>
</div>
	<!-- ajax提交当前表单 -->	 
<script type="text/javascript">
  $(function(){
    $('#submit').on('click',function(){
	//alert($('#login').serialize());
      //用ajax提交用户信息 
      $.ajax({
        type: 'post',
        url: "<?php echo url('loginCheck'); ?>",
        data: $('#login').serialize(),
        dataType: 'json',
        success: function(data){
          switch (data.status)
          {
            case 1:  //登录成功跳到首页
              alert(data.message);
              window.location.href = "<?php echo url('index/index'); ?>";
            break;
            case 0:  //失败或验证不通过返回登录页
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
	
		 <div class="col-md-4 "   >
			<div class="page-header"> <h3>热门浏览</h3> </div> 
			<!-- 列表使用:列表组来做 -->
			<div class="list-group">
 				<?php if(is_array($hotArtList) || $hotArtList instanceof \think\Collection || $hotArtList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotArtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
					<a href="<?php echo url('detail',['id'=>$art['id']]); ?>" class="list-group-item
				<?php if($i == '1'): ?>active<?php endif; ?>"><?php echo mb_substr(strip_tags($art['title']),0,20); ?>
						<span class="badge">
			 <?php echo $art['pv']; ?> 
						</span>
					</a>
			 <?php endforeach; endif; else: echo "" ;endif; ?> 
			</div>
		</div> 
		<!-- 
		<div class="xfcnt_lft clear-fix">
			<div class="left_chunk ordernum1">
				<div class="main_r_title">
					<h4>
						<span>
							<em>
							</em>
							今日热点
						</span>
					</h4>
				</div>
				
				<div class="main_item_cnt">
					<ul id="hot_daily" class="sift_item">
					  <?php if(is_array($hotArtList) || $hotArtList instanceof \think\Collection || $hotArtList instanceof \think\Paginator): $i = 0; $__LIST__ = $hotArtList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?> 
						<li class="shoutuad" _hover-ignore="1" style="display: list-item;">
							<a title="" href="<?php echo url('detail',['id'=>$art['id']]); ?>"
							updata="detail|shoutu|2|0" target="_blank" class="news_pic">
								<span>
									<img class="animation  scrollLoading" src="static/image/<?php echo $art['title_img']; ?>"
									alt="">
								</span>
								<p>
									<?php echo $art['title']; ?>
								</p>
							</a>
						</li>   
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				
				<!-- <div class="channel_ybq_x gg_detail_baidu clear-fix gg_right2" id="right2"
				style="display: block; padding-bottom: 20px;">
					<iframe src="./林田草海 风情驿站 户外天堂 塞外察北有个“世外桃源”_社会频道_东方头条_files/gg_common(2).html"
					id="cnt_ny_y2" width="100%" height="0" frameborder="no" border="0" marginwidth="0"
					marginheight="0" scrolling="no" allowtransparency="yes" style="height: 250px; padding-top: 0px; padding-bottom: 0px;">
					</iframe>
				</div> -->
			</div>
		</div> 
	
<!-- 底部开始 -->
</div><!-- <div class="row"> -->
	<footer style="clear:both;margin:10px 0px 50px 0px;; class="container-fluid foot-wrap">
    <!--采用container，使得页尾内容居中 -->
        <div class="container">
            <div class="row">
               

            </div><!--/.row -->
        </div><!--/.container-->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

</body>
</html>
<!-- 底部结束 -->