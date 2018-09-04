<?php 
namespace app\admin\model;

use think\Model;

class Aboutus extends Model
{
	protected $pk='id';
	protected $table='etl_aboutus';

	public function editus($data)
	{
		$field=$this->save($data,[$this->pk=>$data['id']]);

		if($field)
		{
			return ['valid'=>1,'msg'=>'操作成功'];
		}else{
			return ['valid'=>0,'msg'=>$this->getError()];
		}
	}

	//公司理念
	public function editus2($data)
	{
		$field=$this->save($data,[$this->pk=>$data['id']]);

		if($field)
		{
			return ['valid'=>1,'msg'=>'操作成功'];
		}else{
			return ['valid'=>0,'msg'=>$this->getError()];
		}
	}

	public function editus3($data)
	{
		$field=$this->save($data,[$this->pk=>$data['id']]);

		if($field)
		{
			return ['valid'=>1,'msg'=>'操作成功'];
		}else{
			return ['valid'=>0,'msg'=>$this->getError()];
		}
	}

	public function editus4($data)
	{
		$field=$this->save($data,[$this->pk=>$data['id']]);

		if($field)
		{
			return ['valid'=>1,'msg'=>'操作成功'];
		}else{
			return ['valid'=>0,'msg'=>$this->getError()];
		}
	}

}






