<?php 
namespace app\admin\model;

use think\Model;

class Articlehr extends Model
{
	protected $pk='id';
	protected $table='etl_articlehr';

	public function articlehr($data)
	{	
		$ress=db('etl_articlehr')->where('id',$data['id'])->find();
		if($ress){
			return ['valid'=>'0','msg'=>'数据已存在'];
		}else{
			$res=$this->save($data);
			// dump($data);
			if($res){
				return ['valid'=>'1','msg'=>'提交成功'];
			}else{
				return ['valid'=>'0','msg'=>'提交失败'];
			}
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



