<?php /*a:6:{s:73:"D:\myphp_www\PHPTutorial\WWW\tp5\application/index/view\index\detail.html";i:1530872917;s:72:"D:\myphp_www\PHPTutorial\WWW\tp5\application/index/view\public\base.html";i:1530838624;s:75:"D:\myphp_www\PHPTutorial\WWW\tp5\application/index/view\public\\header.html";i:1530838624;s:72:"D:\myphp_www\PHPTutorial\WWW\tp5\application/index/view\public\\nav.html";i:1530838624;s:73:"D:\myphp_www\PHPTutorial\WWW\tp5\application/index/view\public\right.html";i:1530838624;s:75:"D:\myphp_www\PHPTutorial\WWW\tp5\application/index/view\public\\footer.html";i:1530838624;}*/ ?>
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



			

	






	<P>首页&nbsp>&nbsp<?php echo htmlentities(getCateName($art['cate_id'])); ?>&nbsp>&nbsp<?php echo htmlentities($art['title']); ?></P>
	<!-- 主体 -->
	<div class="row">
		<!-- 左侧8列 -->
		<div class="col-md-8">
		<!-- 页头 -->
		<div class="page-header">
  			<h3><?php echo htmlentities(getCateName($art['cate_id'])); ?></h3>			
		</div>

		<div>			
            
             <h4><?php echo htmlentities($art['title']); ?></h4>
                <p>作者:<?php echo htmlentities(getUserName($art['user_id'])); ?>&nbsp;&nbsp;
               发布时间:<?php echo htmlentities($art['create_time']); ?>&nbsp;&nbsp;
               浏览:<?php echo htmlentities($art['pv']); ?>&nbsp;&nbsp;
			  <!--  <a class="" id="fav" user_id="<?php echo htmlentities($art['user_id']); ?>" article_id="<?php echo htmlentities($art['id']); ?>" session_id="<?php echo htmlentities(app('session')->get('user_id')); ?>">
			   <span id="fav_logo" class="glyphicon glyphicon-star black" aria-hidden="true"></span>
			   </a>
			   <a class=" " id="like" user_id="<?php echo htmlentities($art['user_id']); ?>" article_id="<?php echo htmlentities($art['id']); ?>" session_id="<?php echo htmlentities(app('session')->get('user_id')); ?>">
			   <span id="like_logo" class="glyphicon glyphicon-heart" aria-hidden="true"></span>
			   </a> -->
			   </p>
               <div><?php echo htmlspecialchars_decode($art['content']); ?></div>
              

			<div class="ContentItem-actions">
				<span>
				</span>
				<button type="button" class="Button ContentItem-action Button--plain Button--withIcon Button--withLabel">
					<span style="display: inline-flex; align-items: center;">​
						<svg class="Zi Zi--Comment Button-zi" fill="currentColor" viewBox="0 0 24 24"
						width="1.2em" height="1.2em">
							<path d="M10.241 19.313a.97.97 0 0 0-.77.2 7.908 7.908 0 0 1-3.772 1.482.409.409 0 0 1-.38-.637 5.825 5.825 0 0 0 1.11-2.237.605.605 0 0 0-.227-.59A7.935 7.935 0 0 1 3 11.25C3 6.7 7.03 3 12 3s9 3.7 9 8.25-4.373 9.108-10.759 8.063z"
							fill-rule="evenodd">
							</path>
						</svg>
					</span>
					评论
				</button>
				<div class="Popover ShareMenu ContentItem-action">
					<div class="" id="Popover6-toggle" aria-haspopup="true" aria-expanded="false"
					aria-owns="Popover6-content">
						<button type="button" class="Button Button--plain Button--withIcon Button--withLabel">
							<span style="display: inline-flex; align-items: center;">
								​
								<svg class="Zi Zi--Share Button-zi" fill="currentColor" viewBox="0 0 24 24"
								width="1.2em" height="1.2em">
									<path d="M2.931 7.89c-1.067.24-1.275 1.669-.318 2.207l5.277 2.908 8.168-4.776c.25-.127.477.198.273.39L9.05 14.66l.927 5.953c.18 1.084 1.593 1.376 2.182.456l9.644-15.242c.584-.892-.212-2.029-1.234-1.796L2.93 7.89z"
									fill-rule="evenodd">
									</path>
								</svg>
							</span>
							分享
						</button>
					</div>
				</div>
				<button type="button" id="fav" user_id="<?php echo htmlentities($art['user_id']); ?>" article_id="<?php echo htmlentities($art['id']); ?>" session_id="<?php echo htmlentities(app('session')->get('user_id')); ?>" class="Button ContentItem-action Button--plain Button--withIcon Button--withLabel">
					<span style="display: inline-flex; align-items: center;">
						​
						<svg class="Zi Zi--Star Button-zi" fill="currentColor" viewBox="0 0 24 24"
						width="1.2em" height="1.2em">
							<path d="M5.515 19.64l.918-5.355-3.89-3.792c-.926-.902-.639-1.784.64-1.97L8.56 7.74l2.404-4.871c.572-1.16 1.5-1.16 2.072 0L15.44 7.74l5.377.782c1.28.186 1.566 1.068.64 1.97l-3.89 3.793.918 5.354c.219 1.274-.532 1.82-1.676 1.218L12 18.33l-4.808 2.528c-1.145.602-1.896.056-1.677-1.218z"
							fill-rule="evenodd">
							</path>
						</svg>
					</span>
					收藏
				</button>
				<button type="button" id="like" user_id="<?php echo htmlentities($art['user_id']); ?>" article_id="<?php echo htmlentities($art['id']); ?>" session_id="<?php echo htmlentities(app('session')->get('user_id')); ?>" class="Button ContentItem-action Button--plain Button--withIcon Button--withLabel">
					<span style="display: inline-flex; align-items: center;">
						​
						<svg class="Zi Zi--Heart Button-zi" fill="currentColor" viewBox="0 0 24 24"
						width="1.2em" height="1.2em">
							<path d="M2 8.437C2 5.505 4.294 3.094 7.207 3 9.243 3 11.092 4.19 12 6c.823-1.758 2.649-3 4.651-3C19.545 3 22 5.507 22 8.432 22 16.24 13.842 21 12 21 10.158 21 2 16.24 2 8.437z"
							fill-rule="evenodd">
							</path>
						</svg>
					</span>
					点赞
				</button>
			</div>
				<form style="margin-top:10px;" method="post" id="user_comment">
				<input type="hidden" name="article_id" value="<?php echo htmlentities($art['id']); ?>">
				<input type="hidden" name="user_id" value="<?php echo htmlentities($art['user_id']); ?>">
				<input type="hidden" name="reply_id" value="<?php echo htmlentities(app('session')->get('user_id')); ?>">
		
				  <div class="form-group">	
					<input type="text" class="form-control" id="content" value="" name="user_comment" placeholder="写下你的评论">
				  </div>
				  <button id="comment" type="button" class="btn btn-default">提交</button>
				   
				</form>
				
				
			      <div style="border:1px solid #DDDDDD;border-radius:5px; padding:10px 20px 0px 20px; margin:10px 0px 10px 0px;" 
				  <?php if(empty($art['id']) || (($art['id'] instanceof \think\Collection || $art['id'] instanceof \think\Paginator ) && $art['id']->isEmpty())): ?>
				  class="hidden" 
				  <?php endif; ?>
				  > 
				  
				  <?php echo htmlentities(getUserComment($art['id'])); ?>
				  				  
				  </div>
			 
					
			
          </div> 

         
         
          <!-- 处理收藏功能 -->
          <script type="text/javascript">
            $(function(){
              $('#fav').on('click',function(){
                //获取当前的用户id与栏目id,因为收藏表中有这二个字段
                var userId = $(this).attr('user_id')
                var artId = $(this).attr('article_id')
                var sessionId = $(this).attr('session_id')
                if (userId && artId){
                  $.ajax(
                  {
                    type: 'get',
                    url : "<?php echo url('index/index/fav'); ?>",
                    data: {
                            user_id    : userId,
                            article_id : artId,
                            session_id : sessionId,
                            time:new Date().getTime()
                          },
                    dataType : 'json',
                    success  : function(data)
                    {
                      switch(data.status)
                      {
                      case 1:
                        $('#fav_logo').attr('class','glyphicon glyphicon-star')
                        $//('#fav').text(data.message)
						alert(data.message)
                        break

                        case 0:
                        $('#fav_logo').attr('class','glyphicon glyphicon-star-empty')
                        //$('#fav').text(data.message)
						alert(data.message)
                        break

                        case -1:
                        alert(data.message)
                        break

                        case -2:
                        alert(data.message)
                        break

                      }
                   }
                  }
                    
                  )
                }
  
              })
            })
          </script>     
	     <!-- 处理点赞功能 -->
          <script type="text/javascript">
            $(function(){
              $('#like').on('click',function(){
                //获取当前的用户id与栏目id,因为收藏表中有这二个字段
                var userId = $(this).attr('user_id')
                var artId = $(this).attr('article_id')
                var sessionId = $(this).attr('session_id')
                if (userId && artId){
                  $.ajax(
                  {
                    type: 'get',
                    url : "<?php echo url('index/index/like'); ?>",
                    data: {
                            user_id    : userId,
                            article_id : artId,
                            session_id : sessionId,
                            time:new Date().getTime()
                          },
                    dataType : 'json',
                    success  : function(data)
                    {
                      switch(data.status)
                      {
						case 1:
						$('#like_logo').css('glyphicon glyphicon-heart') ;
                        
                        //$('#like').text(data.message)
						alert(data.message)
                        break

                        case 0:
                        $('#like_logo').css('glyphicon glyphicon-heart-empty') ;
						//
                        //$('#like').text(data.message)
						alert(data.message)
                        break

                        case -1:
                        alert(data.message)
                        break

                        case -2:
                        alert(data.message)
                        break

                      }
                   }
                  }
                    
                  )
                }
  
              })
            })
          </script> 
		   <!-- 处理评论功能 -->
		  <script type="text/javascript">
			  $(function(){
				$('#comment').on('click',function(){
				  //用ajax提交用户信息 
				  //alert($('#user_comment').serialize())
				  $.ajax({
					type: 'post',
					url: "<?php echo url('index/index/comment'); ?>",
					data: $('#user_comment').serialize(),
					dataType: 'json',
					success: function(data){
					  switch (data.status)
					  {
						case 1:  //评论成功
						  alert(data.message);
						 
						//$('#content').text("Hello world!");
							//$('#content').attr("value","money");
						 window.location.reload()
						  //window.location.href = "<?php echo url('index/index/'); ?>";
						break;
						case 0:  //失败或验证不通过
						case -1:
						  alert(data.message);
						  // window.location.back();
						break;
					  }

					}
				  })
			  })
			  })
		   </script>
		   <!-- 处理回复功能 -->
		  <script type="text/javascript">
			  $(function(){
				$('#reply').on('click',function(){
				var userId  =4
                var artId   =22
                var replyId =session.getValue("user_id")
				var replyComment=$('#reply_comment1').val()
				  //用ajax提交用户信息 
				  //alert($('#reply_comment').serialize())
				  $.ajax({
					type: 'post',
					url: "<?php echo url('index/index/reply'); ?>",
					data: {
                            user_id    :userId,
                            article_id :artId,
                            reply_id   :replyId,
							reply_comment:replyComment,
                          },
					dataType: 'json',
					success: function(data){
					  switch (data.status)
					  {
						case 1:  //评论成功
						  alert(data.message);
						 
						//$('#content').text("Hello world!");
							//$('#content').attr("value","money");
						 window.location.reload()
						  //window.location.href = "<?php echo url('index/index/'); ?>";
						break;
						case 0:  //失败或验证不通过
						case -1:
						  alert(data.message);
						  // window.location.back();
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
			<div class="page-header"> <h3>热门浏览</h3> </div> 
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