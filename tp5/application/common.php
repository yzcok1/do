<?php

// 应用公共文件
use think\Db;
use think\Controller;

// 根据user_id查询user表,获取用户的姓名
if(!function_exists('getUserName'))
{
    function getUserName($id)
    {
        return Db::table('zh_user')->where(['id'=>$id])->value('name');
    }
}

// 根据cate_id查询zh_article_cate表,获取栏目名称
if(!function_exists('getCateName'))
{
    function getCateName($cateId)
    {
        return Db::table('zh_article_category')->where(['id'=>$cateId])->value('name');
    }
}
if(!function_exists('getCateId'))
{
    function getCateId($id)
    {
        return Db::table('zh_article')->where(['id'=>$id])->value('cate_id');
		//$cateId= 
		//return getCateName($cateId);
    }
}
if(!function_exists('getUserComment'))
{
	function getUserComment($id)
	{
	$result= Db::table('zh_user_comments')->field('user_id,reply_id,article_id,user_comment,create_time')->where(['article_id'=>$id])->select();
	return count($result);

	/* //创建表格将数组循环输入
    echo '<table border="1" width="600" >';
    foreach ($result as $key=>$value)
    {
        echo '<tr>';
		foreach($value as $mn)
        {echo "<td>{$mn}</td>";}
        echo '</tr>';
    }
    echo '</table>'; */
	
	foreach($result as $key=>$val){
	//echo "<hr>";
	
    echo getUserName($result[$key]['reply_id']) ."&nbsp回复&nbsp".getUserName($result[$key]['user_id'])."&nbsp&nbsp&nbsp".date('Y年m月d日 H:i:s', $result[$key]['create_time'])."<br>";

	echo $result[$key]['user_comment']."<br>";
	echo "<br>";
	//echo '<button type="button" id="like">'.$result[$key]['reply_id'].'</button>';
	//echo '<button type="button" class="btn btn-default" id="comment" user_id="'.$result[$key]['reply_id'].'" article_id="{$art.id}" session_id="{$Think.session.user_id}">'.'回复'.'</button>';
	
	
echo	'<form style="margin-top:10px;" method="post" id="reply_comment">';
echo		'<div class="form-group">';	
echo		'<input type="text" class="form-control" id="reply_comment1"  value="" name="reply_comment" placeholder="写下你的评论">';
echo		'</div>';
echo  		'<button id="reply" type="button" class="btn btn-default" >提交</button>';
echo	'</form>';



	echo "<hr>";
	}
	

	
	
	
	
	
	
	
	
	
	
	
	
	}
}


