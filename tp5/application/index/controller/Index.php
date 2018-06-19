<?php
namespace app\index\controller;
use think\Controller;

class Index  extends Controller
{
    public function index()
    {
		//$this->a  ssign('name','thinkphp');
		
		return $this->fetch();
		
    }
}
