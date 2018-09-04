<?php 
namespace app\admin\controller;

use think\Controller;

class Articlehr extends Controller
{
	public function index()
	{
		$res=db('etl_articlehr')->alias('a')->join('__ETL_HRLANMU__ c','a.sort_id=c.id')->select();
		$this->assign('res',$res);
		// dump($res);
		return $this->fetch();
	}

	public function store()
	{
		$sortData=db('etl_hrlanmu')->select();
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
					'id'=>$sort_id,
					//获取文件大小
					// 'size'=>$info->getSize(),
				];
				$field=new \app\admin\model\Articlehr();
				$res=$field->articlehr($data);
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
		$ress=db('etl_hrlanmu')->where('id',$id)->find();
		$res=db('etl_articlehr')->where('id',$id)->find();
		$this->assign('res',$res);
		$this->assign('ress',$ress);
		return $this->fetch();
	}

	public function uploadedit()
	{
			$file = request()->file('file');
			if(!$file){
				$this->error('请选择上传图片');
			}else{
			$sort_id=(int)input('post.sort_id');
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
					'id'=>$sort_id,
					//获取文件大小
					// 'size'=>$info->getSize(),
				];
				$field=new \app\admin\model\Articlehr();
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

	public function join()
	{
		$res=db('etl_joinus')->order('id desc')->paginate(10);
		$this->assign('res',$res);
		return $this->fetch();
	}

	public function storejoin()
	{
		if(request()->isPost()){
			// dump(input('post.'));
			$field=new \app\admin\model\Joinus();
			$res=$field->store(input('post.'));
			if($res['valid']){
				$this->success($res['msg'],'join');
			}else{
				$this->error($res['msg']);
			}
		}
		return $this->fetch();
	}

	public function editjoin()
	{
		if(request()->isPost()){
			$field=new \app\admin\model\Joinus();
			$res=$field->edit(input('post.'));
			if($res['valid']){
				$this->success($res['msg'],'join');
			}else{
				$this->error($res['msg']);
			}
		}
		$id=input('param.id');
		$res=db('etl_joinus')->where('id',$id)->find();
		$this->assign('res',$res);
		return $this->fetch();
	}
}



