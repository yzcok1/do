<?php
/**
 * ��������������ʾ�ɼ�һƪ����ҳ�����±��⡢�������ں��������ݲ�ʵ��ͼƬ���ػ�
 */

 //�����Զ������ļ�
require 'tp5/vendor/autoload.php';

use QL\QueryList;


//��Ҫ�ɼ���Ŀ��ҳ��
$page = 'http://cms.querylist.cc/news/566.html';
//�ɼ�����
$reg = [
    //�ɼ����±���
    'title' => ['h1','text'],
    //�ɼ����·�������,�����õ���QueryList�Ĺ��˹��ܣ����˵�span��ǩ��a��ǩ
    'date' => ['.pt_info','text','-span -a',function($content){
        //�ûص�������һ�����˳�����
        $arr = explode(' ',$content);
        return $arr[0];
    }],
    //�ɼ�������������,���ù��˹���ȥ�������еĳ����ӣ������������ӵ����֣���ȥ����Ȩ��JS�����������Ϣ
    'content' => ['.post_content','html','a -.content_copyright -script']
];
$rang = '.content';
$ql = QueryList::get($page)->rules($reg)->range($rang)->query();

$data = $ql->getData(function($item){
  //���ûص��������������е�ͼƬ���滻ͼƬ·��Ϊ����·��
  //ʹ�ñ�����ȷ����ǰĿ¼����image�ļ��У�����д��Ȩ��
  $content = QueryList::html($item['content']);
  $content->find('img')->map(function($img){
      $src = 'http://cms.querylist.cc'.$img->src;
      $localSrc = 'static/image/'.md5($src).'.jpg';
      $stream = file_get_contents($src);
      file_put_contents($localSrc,$stream);
      $img->attr('src',$localSrc);
  });
  $item['content'] = $content->find('')->html();
  return $item;
});

//��ӡ���
print_r($data->all());