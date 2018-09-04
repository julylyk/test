<?php 
namespace app\admin\controller;

use think\Controller;

class News extends Controller
{
	protected $db;
	public function _initialize()
	{
		parent::_initialize();
		$this->db=new \app\admin\model\Newslanmu();
	}

	public function index()
	{
		$res=db('etl_newslanmu')->select();
		$this->assign('res',$res);
		return $this->fetch();
	}

	public function store()
	{
		if(request()->isPost()){
			$res=$this->db->newslanmu(input('post.'));
			if($res['valid']){
				$this->success($res['msg'],'index');
			}else{
				$this->error($res['msg']);
			}
		}
		return $this->fetch();
	}
}






