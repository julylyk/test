<?php 
namespace app\index\controller;

use think\Controller;

class News extends Common
{
	public function index()
	{
		$sort_id=input('param.sort_id');
		$res=db('etl_articlenews')->alias('a')->join('__ETL_NEWSLANMU__ c','a.sort_id=c.sort_id')->where('a.sort_id',$sort_id)->select();
		$this->assign('res',$res);

		$ress=db('etl_newslanmu')->where('sort_id',$sort_id)->find();
		$this->assign('ress',$ress);

		$sort=db('etl_newslanmu')->select();
		$this->assign('sort',$sort);
		// dump($res);
		return $this->fetch();
	}
}




