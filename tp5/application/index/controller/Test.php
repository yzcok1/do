<?php
namespace app\index\controller;
use think\Controller;
use QL\QueryList;

class Test extends Controller
{
    public function index()
    {
		 
		//echo "THINK_PATH";
       $page = 'http://news.sina.com.cn/w/2018-07-10/doc-ihezpzwu4960788.shtml';
	   //$page = 'http://cms.querylist.cc/news/565.html';
//采集规则
$reg = [
    //采集文章标题 能去掉文章中的超链接，但保留超链接的文字，并去掉版权、JS代码等无用信息
    'content' => ['.post_content','html','a -.content_copyright -script']
	  //'content' => ['.article','html','a']
];
//$rang = '.content';
$rang = '';
$ql = QueryList::get($page)->rules($reg)->range($rang)->query();
//print_r($ql);
$data = $ql->getData(function($item){

  $content = QueryList::html($item['content']);
  echo $content;
  $content->find('img')->map(function($img){
      echo "本地地址: ".$img->src.'<br>';
	  //下载图片地址
	  $src = $img->src;
	  echo "本地地址: ".$img->src.'<br>';
	  //保存图片地址
      $localSrc = 'static/image/'.md5($src).'.jpg';
      $stream = file_get_contents($src);
	  
      file_put_contents($localSrc,$stream);
      //$img->attr('src',$localSrc);
	  echo "本地地址: ".$img->src.'<br>';
	  echo "网络地址: ".$src.'<br>';
	  echo "本地地址: ".$localSrc.'<br>';
	 
	  //echo $img;

	  
  });
  $item['content'] = $content->find('')->html();
  return $item;
});

//打印结果
//print_r($data->all());
    }
}