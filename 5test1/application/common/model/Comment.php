<?php 
namespace app\common\model;

use think\Model;

class Comment extends Model 
{
	//Ĭ������
	protected $pk = 'id';

	//Ĭ�����ݱ�
	protected $table = 'zh_user_comments';

	//�����Զ�ʱ���
	protected $autoWriteTimestamp = true;
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
	//protected $dateFormat = 'Y��m��d��';

	//�Զ��������
	protected $auto = [];
	// ������ʱ����  
	protected $insert = ['create_time','status'=>1,];
	//������ʱ����
	protected $update = ['update_time'];

	  

}