<?php
namespace app\index\controller;
use app\common\model\Article;
use app\common\model\ArtCate;
use app\common\controller\Base;
use think\Controller;
use QL\QueryList;

class Test4 extends Base
{
public function index(){

		$data_src = QueryList::get('http://sports.sina.com.cn/')->rules([ 
				'地址'=>array('.ty-card-type10-makeup>a','href'),
			])->query()->getData();
			$count=count($data_src);
			echo $count.'<br>';
			 for ($i=0; $i<5; $i++) {//for开始
		$url=($data_src[$i]['地址']);
		 if ( strpos($url, 'http://')==false ){
             $url = $url;
        }else{
            //$url = substr($url, 0,strpos($url, ':',5)+0);
			$url=trim(strrchr( $url, ':'),':');
			
        } 
        //echo $url.'<br>';
		
		$this->get_acticle($url);
		$this->get_image($url);
		
		
		//$this->success('成功','index/index');
        }
    }
	
	//---------------------------------------------------------------------------
	public function get_acticle($url){//获取文章信息
		$data_acticle = QueryList::get($url)
		// 设置采集规则
		->rules([ 
			
			'title'=>array('.main-title','text'),
			'content'=>array('#artibody.article','html','-p:first -script a'),
			'title_img'=>array('.img_wrapper>img:first','src')
		])
		->query()->getData();
		
		
		/* foreach($data_acticle as $key=>$val){
			
			// $data_acticle[$key]['title_img'].'<br>';
			//$pathinfo =$data_acticle[$key]['title_img'];
			//$data_acticle[$key]['title_img']=$pathinfo['filename'].'.'.$pathinfo['extension'];
				//echo $pic_name.'<br>';
				
				//$data_acticle['title_img']=$pathinfo['filename'].'.'.$pathinfo['extension'];
				//echo $image.'<br>';
				
				
				//$data_acticle[0]['title_img']=1;
		} */
		//echo $image;
		
		
		foreach($data_acticle as $data_acticle){
				$data_acticle['user_id'] =9;
				$data_acticle['is_hot'] =0 ;
				$data_acticle['is_top'] =0;
				$data_acticle['cate_id'] =2 ;
				
				if(count($data_acticle)<7){
					$data_acticle['title_img']= date("Y-m-d").'/test.jpg';
				}
				$data_acticle['title_img'] =date("Y-m-d").'/'.trim(strrchr($data_acticle['title_img'], '/'),'/'); 	
			}
		
	print_r($data_acticle)."<br>";
		$result=Article::create($data_acticle);
		Article::where('title','')->delete();
		Article::where('title_img',date("Y-m-d").'/test.jpg')->delete();
		
		
		
	
	}//结束获取文章信息
	
	
	//----------------------------------------------------------------------------
	public function get_image($url){//获取图片信息
		$data_image = QueryList::get($url)
            // 设置采集规则
            ->rules([
                'link_url'=>array('.img_wrapper>img','src')
            ])
            ->query()->getData();
		//print_r($data->all());	
        //打印结果
        $img_out = ($data_image->all());
        $photo_num = count($img_out);
		//if($photo_num==1)
        //匹配到的图片数量
        //echo '<br>'.$i.'、搜索地址：'. $url . "共找到 " . $photo_num . " 张图片<br>";
		
        foreach ($img_out as $k => $v){
 
            //$img_out[$k]['img'] = "<img src='".$v['link_url']."' />";
			//echo '图片地址：'.($v['link_url']).'<br>';
            $this->save_one_img($url,$v['link_url']);
			}
	}
	
	
	
	
    /**
     * 保存单个图片的方法
     * @param String $capture_url   用于抓取图片的网页地址
     * @param String $img_url       需要保存的图片的url
     */
	//----------------------------------------------------------------------------
    public function save_one_img($capture_url,$img_url){
        $img_size = 0;
        //图片路径地址
        if ( strpos($img_url, 'http://')!==false ){
             $img_url = $img_url;
        }else{
            //$domain_url = substr($capture_url, 0,strpos($capture_url, ':',5)+1);
            //$img_url=$domain_url.$img_url;
			$img_url='http:'.$img_url;
        } 
		$img_url =$img_url;
		echo $img_url.'<br>';
        $pathinfo = pathinfo($img_url);    //获取图片路径信息
		//echo $pathinfo.'<br>';
        $pic_name=$pathinfo['filename'].'.'.$pathinfo['extension'];//(自定义名称)
		//echo $pic_name.'<br>';
        $app_path = dirname($_SERVER['SCRIPT_FILENAME']) . "/";
        $root_path = dirname(realpath($app_path)) . "/";
 
        $path = $root_path . 'public/static/image/'.date("Y-m-d").'/';
		//$path = $root_path . 'public/static/image/';
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755);
        }
        if (!is_dir($path)) {
            mkdir($path, 0755);
        }
 
        $path = $path.$pic_name;
        if (file_exists($path)){  //如果图片存在,证明已经被抓取过,退出函数
            //echo $img_url.'该图片已经抓取过!'."<br>";
            return;
        }
 
        //将图片内容读入一个字符串
        $img_data = file_get_contents($img_url);   //屏蔽掉因为图片地址无法读取导致的warning错误
        if ( strlen($img_data) > $img_size ){   //下载size比限制大的图片
            $img_size = file_put_contents($path, $img_data);
            if ($img_size){
                //echo $img_url.'图片保存成功!'."<br>";
            } else {
                //echo $img_url.'图片保存失败!'."<br>";
            }
        } else {
           // echo $img_url.'图片读取失败!'."<br>";
        }
    }
}