<?php
namespace app\index\controller;
use QL\QueryList;

class Test0
{
public function index(){
 
        //$url = $this->request->param('url');
        //$url = "https://item.jd.com/20902734214.html";http://
        $url = "news.sina.com.cn/w/2018-07-10/doc-ihezpzwu4960788.shtml";
		$data = QueryList::get($url)
            // 设置采集规则
            ->rules([
                //'goods_name'=>array('li img','alt'),
                //'link_url'=>array('li img','src')
				'goods_name'=>array('.main-title','text'),
                'link_url'=>array('.img_wrapper>img','src')
 
            ])
            ->query()->getData();
        //打印结果
        $img_out = $data->all();
 
        $photo_num = count($img_out);
        //匹配到的图片数量
        echo $url . "共找到 " . $photo_num . " 张图片<br>";
 
        foreach ($img_out as $k => $v){
 
            //$img_out[$k]['img'] = "<img src='".$v['link_url']."' />";
 
            $this->save_one_img($url,$v['link_url']);
        }
    }
 
    /**
     * 保存单个图片的方法
     * @param String $capture_url   用于抓取图片的网页地址
     * @param String $img_url       需要保存的图片的url
     */
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