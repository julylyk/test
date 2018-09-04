<?php 
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Admin extends Controller
{
	public function index()
	{
		$res=Db::name('etl_slide')->order('id desc')->limit(3)->select();
		$this->assign('res',$res);
		return $this->fetch();
	}

	public function delslide()
	{
		$id=input('param.id');
		$img=db('etl_slide')->where('id',$id)->find();
		$path=$img['path'];
		// halt($path);
		unlink(ROOT_PATH.'public/'.$path);
		$res=Db::name('etl_slide')->where('id',$id)->delete();
		if($res){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

}





