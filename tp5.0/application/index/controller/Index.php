<?php
namespace app\index\controller;
use app\index\controller\Base;  //导入公共控制器
use app\index\model\User as UserModel; //导入自定义模型并取别名
use app\index\validate\User as UserValidate; 


class Index extends Base
{
    public function index()
    {
		
		return $this->fetch('index');
		
    }
	
	 public function single()
    {
		
		return $this->fetch('single');
		
    }
	
	 public function register()
    {
		
		return $this->fetch('register');
		
    }
	
	public function insert()
    {
		
		if(Request::isAjax()){
			//1.数据验证
			
			$data = Request::post();  //要验证的数据
			$rule = 'app\index\validate\User';  //自定义的验证器
			//开始验证: $res 中保存错误信息,成功返回true
			$res=$this->validate($data,$rule);
		  	if (true !== $res){  //验证失败
		  		return ['status'=> -1, 'message'=>$res];
		  	}else { //验证成功
		  		//2. 将数据写入到数据表zh_user中,并对写入结果进行判断
		  		if($user=UserModel::create($data)){
		  			//注册成功后,实现自动登录
		  			$courentUser = UserModel::get($user->id);
		  			Session::set('user_id',$courentUser->id);
		  			Session::set('user_name',$courentUser->name);
		  			Session::set('is_admin',$courentUser->is_admin);

					return ['status'=>1, 'message'=>'恭喜,注册成功~~'];
				} else {
					return ['status'=>0, 'message'=>'注册失败~~'];			
				}
			}			 
		}else{
			$this->error('请求类型错误','register');
		}return ['status'=>-3, 'message'=>'123'];	
		
	}
		
	public function login()
    {
		
		return $this->fetch('login');
		
    }
	
}
	

