<?php
namespace app\admin\model;

use think\Model;

class Servicelanmu extends Model
{
	protected $pk='id';
	protected $table='etl_servicelanmu';

	public function store($data)
	{
		$res=$this->validate(true)->save($data);
		// dump($data);
		if($res){
			return ['valid'=>'1','msg'=>'提交成功'];
		}else{
			return ['valid'=>'0','msg'=>$this->getError()];
		}
	}

	public function edit($data)
	{
		$res=$this->validate(true)->save($data,[$this->pk=>$data['id']]);
		if($res){
			return ['valid'=>'1','msg'=>'提交成功'];
		}else{
			return ['valid'=>'1','msg'=>$this->getError()];
		}
	}
}







