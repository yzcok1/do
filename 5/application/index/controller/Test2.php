<?php
namespace app\index\controller;
use think\Controller;
use QL\QueryList;

class Test2 extends Controller
{
    public function index()
    {
   
 
	$data_src = QueryList::get('http://news.sina.com.cn/world/')->rules([ 
    //'地址'=>array('.blk121>a','href'),
		'地址'=>array('.news-item>h2>a','href'),
	])->query()->getData();
	
	$count=count($data_src);
	//echo $count;
	 for ($i=0; $i<10; $i++) {//for开始
  
	$num=($data_src[$i]['地址']);
	//echo $num;
 	$data = QueryList::get("$num")
    // 设置采集规则
    ->rules([ 
		
        //'title'=>array('.main-title','text'),
        'content'=>array('#article.article','html'),
		//'title_img'=>array('.img_wrapper>img','src')
    ])
    ->query()->getData(function($data){
			//图片本地化
			$data['content'] = QueryList::run('DImage',[
					'content' =>$data['content'],
					'image_path' => 'static/image/'.date('Y-m-d'),
					'www_root' => dirname(__FILE__)
				]);
			return $item;
		});

	foreach($data as $data){//$data开始
    		
			
			//$data['is_hot'] =0 ;
			//$data['is_top'] =0;
			//$data['cate_id'] =2 ;
			//$data['title'] =1 ;
			//$data['title_img'] =$data['title_img'] ;
			//$data['title_content']= 0;

	
    	}//$data结束
		
	
  
		
		
	print_r($data);
	//Article::create($data);
	} //for结束
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

/* 	
	$num=($data_src[1]['地址']);
	
	//echo $num;
 		$data = QueryList::get("$num")
    // 设置采集规则
    ->rules([ 
		
        'title'=>array('.main-title','text'),
        'content'=>array('#article.article','html')
    ])
    ->query()->getData();

foreach($data as $data){
    		//$data['title'] =1 ;
			$data['is_hot'] =0 ;
			$data['is_top'] =0;
			$data['cate_id'] =1 ;
			$data['title_img'] =0 ;
			//$data['title_content']= 0;
    		
    	}

 if(Article::create($data)){
		$this->success('成功','index/index');
	}else{
		$this->error('失败');
	}	 
	   */
	

	

    }
}