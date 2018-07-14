<?php
namespace app\index\controller;
use think\Controller;
use QL\QueryList;

class Test1 extends Controller
{
    public function index()
    {
   
 
	$data_src = QueryList::get('http://news.sina.com.cn/world/')->rules([ 
    //'地址'=>array('.blk121>a','href'),
		'地址'=>array('.news-item>h2>a','href'),
	])->query()->getData();
	
	$count=count($data_src);
	echo $count;
	 for ($i=0; $i<10; $i++) {
  
	$num=($data_src[$i]['地址']);
	//echo $num;
 	$data = QueryList::get("$num")
    // 设置采集规则
    ->rules([ 
		
        'title'=>array('.main-title','text'),
        'content'=>array('#article.article','html')
    ])
    ->query()->getData();

	foreach($data as $data){
    		$data['user_id'] =9;
			$data['is_hot'] =0 ;
			$data['is_top'] =0;
			$data['cate_id'] =2 ;
			$data['title_img'] =0 ;
			
    	}

	$result=Article::create($data);
	if($result)
	{
		$this->success('成功','index/index');
	}
	
		
	} 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

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