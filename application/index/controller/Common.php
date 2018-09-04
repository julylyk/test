<?php 
namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
	public function __construct(Request $request=null)
	{
		parent::__construct($request);
		//读取配置项
		$lanmu=$this->loadlanmu();
		$this->assign('_lanmu',$lanmu);

		//读取新闻栏目数据
		$newslanmu=$this->sortnews();
		$this->assign('_newslanmu',$newslanmu);

		//读取服务项目数据
		$service=$this->service();
		$this->assign('_service',$service);

		//读取人力资源项目
		$hr=$this->hr();
		$this->assign('_hr',$hr);

		//读取招聘信息
		$joinus=$this->joinus();
		$this->assign('_joinus',$joinus);
	}

	private function loadlanmu()
	{
		return db('etl_lanmu')->order('sort asc')->select();
	}

	//获取新闻栏目
	private function sortnews()
	{
		return db('etl_newslanmu')->select();
	}

	private function service()
	{
		return db('etl_servicelanmu')->order('sort asc')->select();
	}

	private function hr()
	{
		return db('etl_hrlanmu')->order('sort asc')->select();
	}

	private function joinus()
	{
		return db('etl_joinus')->order('id desc')->paginate(10);
	}
}




