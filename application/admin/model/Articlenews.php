<?php 
namespace app\admin\model;

use think\Model;

class Articlenews extends Model
{
	protected $pk='id';
	protected $table='etl_articlenews';

	public function articlenews($data)
	{	
			$res=$this->save($data);
			// dump($data);
			if($res){
				return ['valid'=>'1','msg'=>'提交成功'];
			}else{
				return ['valid'=>'0','msg'=>'提交失败'];
			}
	}

	public function edit($data)
	{	
			$res=$this->save($data,[$this->pk=>$data['id']]);
			// dump($data);
			if($res){
				return ['valid'=>'1','msg'=>'提交成功'];
			}else{
				return ['valid'=>'0','msg'=>'提交失败'];
			}
	}
}



