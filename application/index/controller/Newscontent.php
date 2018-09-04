<?php 
namespace app\index\Controller;

use think\Controller;

class Newscontent extends Common
{
	public function index()
	{
		$id=input('param.id');
		//获取点击量
		db('etl_articlenews')->where('id',$id)->setInc('see',1);
		$res=db('etl_articlenews')->alias('a')->join('__ETL_NEWSLANMU__ c','a.sort_id=c.sort_id')->where('a.id',$id)->find();
		$this->assign('res',$res);
		// dump($res);

		//获取新闻栏目
		$sort=db('etl_newslanmu')->select();
		$this->assign('sort',$sort);
		return $this->fetch();
	}
}





