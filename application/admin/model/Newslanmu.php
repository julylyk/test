<?php 
namespace app\admin\model;

use think\Model;

class Newslanmu extends Model
{
	protected $pk='id';
	protected $table='etl_newslanmu';

	public function newslanmu($data)
	{
		$res=$this->validate(true)->save($data);
		if($res){
			return ['valid'=>'1','msg'=>'添加成功'];
		}else{
			return ['valid'=>'0','msg'=>$this->getError()];
		}
	}
}



