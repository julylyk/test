<?php 
namespace app\admin\controller;

use think\Controller;

class Business extends Controller
{
	protected $db;
	public function _initialize()
	{
		parent::_initialize();
		$this->db=new \app\admin\model\Lanmu();
	}

	public function index()
	{
		$res=db('etl_lanmu')->order('sort asc')->select();
		$this->assign('res',$res);
		return $this->fetch();
	}

	public function store()
	{
		if(request()->isPost())
		{
			$res=$this->db->store(input('post.'));
			if($res['valid']){
				$this->success($res['msg'],'index');
			}else{
				$this->error($res['msg']);
			}
		}
		return $this->fetch();
	}

	public function edit()
	{
		if(request()->isPost()){
			$ress=$this->db->edit(input('post.'));
			if($ress['valid']){
				$this->success($ress['msg'],'index');
			}else{
				$this->error($ress['msg']);
			}
		}
		$id=input('param.id');
		$res=db('etl_lanmu')->where('id',$id)->find();
		$this->assign('res',$res);
		return $this->fetch();
	}

	public function del()
	{
		$id=input('param.id');
		$res=db('etl_lanmu')->where('id',$id)->delete();
		if($res){
			$this->success('删除成功','index');
		}else{
			$this->error('删除失败');
		}
	}
}







