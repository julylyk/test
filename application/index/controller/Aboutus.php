<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;

class Aboutus extends Common
{
	public function about_us()
	{
		$res=Db::name('etl_aboutus')->where('id',1)->find();
		$this->assign('res',$res);

		$ress=Db::name('etl_imageus')->where('id',1)->find();
		$this->assign('ress',$ress);
		return $this->fetch();
	}

	public function about_us2()
	{
		$res=Db::name('etl_aboutus')->where('id',2)->find();
		$this->assign('res',$res);

		$ress=Db::name('etl_imageus')->where('id',2)->find();
		$this->assign('ress',$ress);
		return $this->fetch();
	}

	public function about_us3()
	{
		$res=Db::name('etl_aboutus')->where('id',3)->find();
		$this->assign('res',$res);

		$ress=Db::name('etl_imageus2')->select();
		$this->assign('ress',$ress);
		return $this->fetch();
	}

	public function about_us4()
	{
		$res=Db::name('etl_aboutus')->where('id',4)->find();
		$this->assign('res',$res);

		$ress=Db::name('etl_imageus3')->select();
		$this->assign('ress',$ress);
		return $this->fetch();
	}
}






