<?php
namespace app\index\controller;
use app\common\model\Article;
use app\common\model\ArtCate;
use think\Controller;
use QL\QueryList;

class Test2 extends Controller
{
    public function index()
    {
   
 
	/* $data_src = QueryList::get('http://news.sina.com.cn/world/')->rules([ 
    //'地址'=>array('.blk121>a','href'),
		'地址'=>array('.news-item>h2>a','href'),
	])->query()->getData();
	
	$count=count($data_src);
	//echo $count;
	 //for ($i=0; $i<10; $i++) {//for开始
  
	$num=($data_src[$i]['地址']); */
	//echo $num;
	//$html = file_get_contents('http://news.sina.com.cn/w/2018-07-14/doc-ihfhfwmv1611760.shtml');
 	$data = QueryList::get("http://news.sina.com.cn/w/2018-07-14/doc-ihfhfwmv1611760.shtml")
	
    // 设置采集规则
    ->rules([ 

        'title'=>array('.main-title','text'),
		'content'=>array('#article.article','html','-p:first a -script'),
		'title_img'=>array('.img_wrapper>img:first','src')
    ])->query()->getData();
			
	foreach($data as $data){//$data开始
    				
			$data['is_hot'] =0 ;
			$data['is_top'] =0;
			$data['cate_id'] =2 ;
			$data['user_id'] =9;

    	}//$data结束
		
	//print_r($data);
	Article::create($data);
	//} //for结束
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



	

    }
}