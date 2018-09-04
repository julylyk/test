<?php 
namespace app\admin\validate;

use think\Validate;

class Newslanmu extends validate
{
	protected $rule=[
		'sortname'=>'require',
		'sort'=>'require|number|between:1,99',
	];

	protected $message=[
		'sortname.require'=>'名称必须填写',
		'sort.require'=>'排序必须填写',
		'sort.number'=>'排序必须为数字',
		'sort.between'=>'数字必须在1-99之间',
	];
}





