<?php 
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Validate;

class Slide extends Controller
{

	public function uploadslide()
		{
			$file = request()->file('file');
			if(!$file){
				$this->error('请选择上传文件');
			}else{



			$name=$_FILES['file']['name'];
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info=$file->validate(['size'=>1000000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'slide');
			if($info)
			{
				$data=[ 
					'name'=>$name,
					'filename'=>$info->getFilename(),
					//地址栏显示路径(存储图片名称)
					'path'=>'slide/'.$info->getSaveName(),
					//文件扩展名
					// 'extensions'=>$info->getExtension(),
					//上传图片时间
					'createtime'=>time(),
					//获取文件大小
					// 'size'=>$info->getSize(),
				];
				$res=Db::name('etl_slide')->insert($data);
				if($res){
					$this->success('上传成功');
				}else{
				//上传失败获取错误信息
					$this->error('上传失败');
				}
			}else{
				$this->error($file->getError());
			}
		}
	}
}





