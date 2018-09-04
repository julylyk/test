<?php 
namespace app\admin\validate;

use think\Validate;

class Hrlanmu extends Validate
{
	protected $rule=[
		'sort'=>'require|number|between:1,99',
		'sortname'=>'require',
	];

	protected $message=[
		'sort.require'=>'排序必须填写',
		'sort.number'=>'排序必须为数字',
		'sort.between'=>'数字须在1-99之间',
		'sortname.require'=>'名称必须填写',
	];
}
