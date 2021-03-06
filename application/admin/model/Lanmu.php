<?php 
namespace app\admin\model;

use think\Model;

class Lanmu extends Model
{
	protected $pk='id';
	protected $table='etl_lanmu';

	public function store($data)
	{
		$res=$this->validate(true)->save($data);
		if($res){
			return ['valid'=>1,'msg'=>'添加成功'];
		}else{
			return ['valid'=>0,'msg'=>$this->getError()];
		}
	}

	public function edit($data)
	{
		$res=$this->validate(true)->save($data,[$this->pk=>$data['id']]);
		if($res){
			return ['valid'=>1,'msg'=>'添加成功'];
		}else{
			return ['valid'=>0,'msg'=>$this->getError()];
		}
	}
}



