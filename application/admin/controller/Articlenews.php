<?php 
namespace app\admin\controller;

use think\Controller;

class Articlenews extends Controller
{
	public function index()
	{
		$sortData=db('etl_articlenews')->alias('a')->join('__ETL_NEWSLANMU__ c','a.sort_id=c.sort_id')->select();
		$this->assign('sortData',$sortData);
		return $this->fetch();
	}

	public function store()
	{
		$sortData=db('etl_newslanmu')->select();
		$this->assign('sortData',$sortData);
		return $this->fetch();
	}

	public function uploadart()
	{
			$file = request()->file('file');
			if(!$file){
				$this->error('请选择上传图片');
			}else{
			$sort_id=input('post.sort_id');
			$title=input('post.name');
			$content=input('post.content');
			$name=$_FILES['file']['name'];

			// 移动到框架应用根目录/public/uploads/ 目录下
			$info=$file->validate(['size'=>1000000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'slide');
			if($info)
			{
				$data=[ 
					'name'=>$title,
					//地址栏显示路径(存储图片名称)
					'path'=>'slide/'.$info->getSaveName(),
					//文件扩展名
					// 'extensions'=>$info->getExtension(),
					//上传图片时间
					'createtime'=>time(),
					'sort_id'=>$sort_id,
					'content'=>$content,
					//获取文件大小
					// 'size'=>$info->getSize(),
				];
				$field=new \app\admin\model\Articlenews();
				$res=$field->articlenews($data);
				if($res['valid']){
					$this->success($res['msg'],'index');
				}else{
				//上传失败获取错误信息
					$this->error($res['msg']);
				}
			}else{
				$this->error($file->getError());
			}
		}
	}

	public function edit()
	{
		$id=input('param.id');
		$sortData=db('etl_articlenews')->alias('a')->join('__ETL_NEWSLANMU__ c','a.sort_id=c.sort_id')->where('id',$id)->find();
		$this->assign('sortData',$sortData);

		$sort=db('etl_newslanmu')->select();
		$this->assign('sort',$sort);
		// dump($sortData);
		return $this->fetch();
	}

	public function uploadedit()
	{
			$file = request()->file('file');
			if(!$file){
				$this->error('请选择上传图片');
			}else{
			$id=input('post.id');
			$sort_id=input('post.sort_id');
			$title=input('post.name');
			$content=input('post.content');
			$name=$_FILES['file']['name'];

			// 移动到框架应用根目录/public/uploads/ 目录下
			$info=$file->validate(['size'=>1000000,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'slide');
			if($info)
			{
				$data=[ 
					'name'=>$title,
					//地址栏显示路径(存储图片名称)
					'path'=>'slide/'.$info->getSaveName(),
					//文件扩展名
					// 'extensions'=>$info->getExtension(),
					//上传图片时间
					'createtime'=>time(),
					'sort_id'=>$sort_id,
					'content'=>$content,
					'id'=>$id,
					//获取文件大小
					// 'size'=>$info->getSize(),
				];
				dump($data);
				$field=new \app\admin\model\Articlenews();
				// dump($data);
				$res=$field->edit($data);
				if($res['valid']){
					$this->success($res['msg'],'index');
				}else{
				//上传失败获取错误信息
					$this->error($res['msg']);
				}
			}else{
				$this->error($file->getError());
			}
		}
	}

	public function del()
	{
		$id=input('param.id');
		$res=-db('etl_articlenews')->where('id',$id)->delete();
		if($res){
			$this->success('删除成功','index');
		}else{
			$this->error('删除失败');
		}
	}
}



