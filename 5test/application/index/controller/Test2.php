<?php
namespace app\index\controller;
use app\common\model\Article;
use app\common\controller\Base;


use QL\QueryList;

class Test2 extends Base
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
  
	$url=($data_src[$i]['地址']);
	//echo $num;
 	$data = QueryList::get("$url")
    // 设置采集规则
    ->rules([ 
		
        //'title'=>array('.main-title','text'),
        //'content'=>array('#article.article','html'),
		//'title_img'=>array('.img_wrapper>img','src')
		'goods_name'=>array('.main-title','text'),
        'link_url'=>array('.img_wrapper>img','src')
    ])
    ->query()->getData();

	
	
	
	$img_out = $data->all();
	print_r($data['ling_url']);
        $photo_num = count($img_out);
        //匹配到的图片数量
        echo $url . "共找到 " . $photo_num . " 张图片<br>";
 
        foreach ($img_out as $k => $v){
 
            //$img_out[$k]['img'] = "<img src='".$v['link_url']."' />";
 
            $this->save_one_img($url,$v['link_url']);
        }
	
	//foreach($data as $data){//$data开始	
			//$data['is_hot'] =0 ;
			//$data['is_top'] =0;
			//$data['cate_id'] =2 ;
			//$data['title'] =1 ;
			//$data['title_img'] =$data['title_img'] ;
			//$data['title_content']= 0;
    	//}//$data结束

	//print_r($data);
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
	 public function save_one_img($capture_url,$img_url){
        $img_size = 0;
        //图片路径地址
        if ( strpos($img_url, 'http://')!==false ){
            // $img_url = $img_url;
        }else{
            $domain_url = substr($capture_url, 0,strpos($capture_url, ':',5)+1);
 
            $img_url=$domain_url.$img_url;
        }
 
        $pathinfo = pathinfo($img_url);    //获取图片路径信息
 
        $pic_name=md5($pathinfo['filename']).'.'.$pathinfo['extension'];//(自定义名称)
        $app_path = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
        $root_path = dirname(realpath($app_path)) . "/";
 
        $path = $root_path . 'public/download/'.date("Y-m-d").'/';
 
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755);
        }
        if (!is_dir($path)) {
            mkdir($path, 0755);
        }
 
        $path = $path.$pic_name;
        if (file_exists($path)){  //如果图片存在,证明已经被抓取过,退出函数
            echo $img_url.'该图片已经抓取过!'."<br>";
            return;
        }
 
        //将图片内容读入一个字符串
        $img_data = file_get_contents($img_url);   //屏蔽掉因为图片地址无法读取导致的warning错误
        if ( strlen($img_data) > $img_size ){   //下载size比限制大的图片
            $img_size = file_put_contents($path, $img_data);
            if ($img_size){
                echo $img_url.'图片保存成功!'."<br>";
            } else {
                echo $img_url.'图片保存失败!'."<br>";
            }
        } else {
            echo $img_url.'图片读取失败!'."<br>";
        }
    }
}