<?php 
namespace app\admin\validate;

use think\Validate;

class Joinus extends Validate
{
	protected $rule=[
		'name'=>'require',
		'address'=>'require',
		'count'=>'require',
		'status'=>'require',
	];

	protected $message=[
		'name.require'=>'招聘职位必须填写',
		'address.require'=>'工作地点必须填写',
		'count.require'=>'招聘人数必须填写',
		'status.require'=>'状态必须填写',
	];
}



