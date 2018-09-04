<?php 
namespace app\admin\model;

use think\Model;

class Imageus extends Model
{
	protected $pk='id';
	protected $table='etl_imageus';

 	public function imageus($data)
 		{
 			$res=$this->save($data,[$this->pk=>$data['id']]);
 			if($res){
 				return ['valid'=>1,'msg'=>"操作成功"];
 			}else{
 				return ['valid'=>0,'msg'=>"操作失败"];
 			}
 	    }

 	    public function imageus2($data)
 	    	{
 	    		$res=$this->save($data,[$this->pk=>$data['id']]);
 	    		if($res){
 	    			return ['valid'=>1,'msg'=>"操作成功"];
 	    		}else{
 	    			return ['valid'=>0,'msg'=>"操作失败"];
 	    		}
 	        }
}






