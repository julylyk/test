<?php 
namespace app\index\controller;

use think\Controller;

class Service extends Common
{
	public function index()
	{
		$id=input('param.id');
		$res=db('etl_articleservice')->where('id',$id)->find();
		$this->assign('res',$res);

		$ress=db('etl_servicelanmu')->where('id',$id)->find();
		$this->assign('ress',$ress);
		// dump($res);
		return $this->fetch();
	}

	public function index2()
	{
		return $this->fetch();
	}
}



