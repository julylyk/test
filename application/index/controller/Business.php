<?php 
namespace app\index\controller;

use think\Controller;

class Business extends Common
{
	public function index()
	{
		$id=input('param.id');
		$res=db('etl_articlebus')->where('id',$id)->find();
		$this->assign('res',$res);

		$ress=db('etl_lanmu')->where('id',$id)->find();
		$this->assign('ress',$ress);
		// dump($res);
		return $this->fetch();
	}
}




