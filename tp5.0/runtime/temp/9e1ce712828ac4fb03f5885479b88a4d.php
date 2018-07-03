<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:85:"D:\myphp_www\PHPTutorial\WWW\tp5\public/../application/index\view\index\register.html";i:1530579201;s:72:"D:\myphp_www\PHPTutorial\WWW\tp5\application\index\view\common\base.html";i:1530579201;s:74:"D:\myphp_www\PHPTutorial\WWW\tp5\application\index\view\common\header.html";i:1530579201;s:71:"D:\myphp_www\PHPTutorial\WWW\tp5\application\index\view\common\nav.html";i:1530579201;s:73:"D:\myphp_www\PHPTutorial\WWW\tp5\application\index\view\common\right.html";i:1530579201;s:74:"D:\myphp_www\PHPTutorial\WWW\tp5\application\index\view\common\footer.html";i:1530579201;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href="http://127.0.0.1/tp5/public/static/index/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="http://127.0.0.1/tp5/public/static/index/css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- Custom Theme files -->
<script src="http://127.0.0.1/tp5/public/static/index/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/tp5/public/static/index/css/bootstrap.min.css" />
	<script type="text/javascript" src="http://127.0.0.1/tp5/public/static/index/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="http://127.0.0.1/tp5/public/static/index/js/bootstrap.min.js"></script>

	
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Konstructs Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>

<body>
	
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.html"><h1>ThinkPHP5</h1></a>
			</div>
			
			<div class="navigation">
				<ul>
					<li><a href="<?php echo url('index/login'); ?>">登录</a></li>
					<li><a href="<?php echo url('index/register'); ?>">注册</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div class="header-bottom">
            <div class="type">
				<h5>Article Types</h5>
			</div>
			
			<div class="list-nav">
				<ul>                                                                 
					<li><a href="<?php echo url('index/index'); ?>">首页</a></li>
				</ul>
			</div>
			

			<div class="clearfix"></div>
        </div>
	</div>

	<!-- 主体 -->
	<div class="container">
	<div class="row ">
		<!-- 左侧8列 -->
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<!-- 页头 -->
		<div class="page-header text-center">
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
  </div>
</form>



</div>
</div>
	<!-- ajax提交当前表单 -->
<script type="text/javascript">
  $(function(){
    $('#register').on('click',function(){
	//alert($('#login').serialize());
      //用ajax提交用户信息 
      $.ajax({
        type: 'post',
        url: "<?php echo url('index/insert'); ?>",
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
			case -3:
			alert(data.message);
			break;
          }
        }
      })
	  //alert(123);
  })
  })
</script>	
<div class="col-md-3"></div> 

<!-- <div class="col-md-5 content-right content-right-top">
				<div class="content-right-top">
					<h5 class="head">Popular</h5>	
					<a class="" href="<?php echo url('single'); ?>">
						<div class="editor text-center">
							<h3>Software Review: Autodesk Inventor Fusion for Mac</h3>
							<p>3D Printing, 3D Software</p>
							<label>3 Days Ago</label>
							<span></span>
						</div>
					</a>	
					<a  href="<?php echo url('single'); ?>">
						<div class="editor text-center">
							<h3>Software Review: Autodesk Inventor Fusion for Mac</h3>
							<p>3D Printing, 3D Software</p>
							<label>3 Days Ago</label>
							<span></span>
						</div>
					</a>	
				</div>	
			</div>
				
				
			 -->
				<div class="clearfix"></div>	
			</div>	
		</div>
	</div>
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="col-md-3 footer-links">
					<h4>Other pages and things</h4>
					<a href="#">Design a creative Blog</a>
					<a href="#">Design a iPad Website</a>
					<a href="#">Single Page sales portfolio </a>
					<a href="#">Flat product website in Photoshop</a>
					<a href="#">Design a creative Blog</a>
					<a href="#">Design a iPad Website</a>
					<a href="#">Single Page sales portfolio </a>
					<a href="#">Flat product website</a>
				</div>
				<div class="col-md-3 footer-links span_66">
					<a href="#">Flat product website in Photoshop</a>
					<a href="#">Design a creative Blog</a>
					<a href="#">Design a iPad Website </a>
				</div>
				<div class="col-md-3 footer-links">
					<h4>Relevant Articles</h4>
					<a href="#">Design a creative Blog</a>
					<a href="#">Design a iPad Website</a>
					<a href="#">Single Page sales portfolio </a>
					<a href="#">Flat product website</a>
					<a href="#">Design a creative Blog</a>
				</div>
				<div class="col-md-3 footer-links">
					<h4>Other pages and things</h4>
					<a href="#">Blaz Robar</a>
					<a href="#">Nick Toranto</a>
					<a href="#">Joisp Kelava</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="copyrights">
					<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></p>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>