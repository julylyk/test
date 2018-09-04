<?php 
namespace app\admin\validate;

use think\Validate;

class Lanmu extends Validate
{
		protected $rule=[
			'sortname'=>'require',
			'sort'=>'require|number|between:1,99',
		];
		protected $message=[
			'sortname'=>'请填写栏目名称',
			'sort'=>'请填排序号',
			'sort.number'=>'排序必须为数字',
			'sort.between'=>'排序需要在1-99之间',
		];
	
}




