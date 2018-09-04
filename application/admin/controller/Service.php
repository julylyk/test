<?php 
namespace app\admin\controller;

use think\Controller;

class Service extends controller
{
	protected $db;
	public function _initialize()
	{
		parent::_initialize();
		$this->db=new \app\admin\model\Servicelanmu();
	}

	public function index()
	{
		$res=db('etl_servicelanmu')->order('sort asc,id desc')->select();
		$this->assign('res',$res);
		return $this->fetch();
	}

	public function store()
	{
		if(request()->isPost()){
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
			$res=$this->db->edit(input('post.'));
			if($res['valid']){
				$this->success($res['msg'],'index');
			}else{
				$this->error($res['msg']);
			}
		}else{
			$id=input('param.id');
			$res=db('etl_servicelanmu')->where('id',$id)->find();
			$this->assign('res',$res);
		}
		return $this->fetch();
	}
}





