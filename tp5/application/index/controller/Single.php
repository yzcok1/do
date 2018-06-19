<?php
namespace app\index\controller;
use think\Controller;

class Single  extends Controller
{
    public function single()
    {
		
		return $this->fetch('single');
    }
}



