<?php 
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Model;

class Aboutus extends Controller
{

	protected $db;
	public function _initialize()
	{
		parent::_initialize();
		$this->db=new \app\admin\model\Aboutus();
	}

	public function index()
	{
		$res=Db::name('etl_aboutus')->where('id',1)->find();
		$this->assign('res',$res);

		$ress=db('etl_imageus')->where('id',1)->find();
		$this->assign('ress',$ress);
		return $this->fetch();
	}

	public function index2()
	{
		$res=Db::name('etl_aboutus')->where('id',2)->find();
		$this->assign('res',$res);

		$ress=db('etl_imageus')->where('id',2)->find();
		$this->assign('ress',$ress);
		return $this->fetch();
		// dump($res);
	}

	public function index3()
	{
		$res=Db::name('etl_aboutus')->where('id',3)->find();
		$this->assign('res',$res);

		$ress=db('etl_imageus2')->paginate(6);
		$this->assign('ress',$ress);
		return $this->fetch();
		// dump($res);
	}

	public function index4()
	{
		$res=Db::name('etl_aboutus')->where('id',4)->find();
		$this->assign('res',$res);

		$ress=db('etl_imageus3')->select();
		$this->assign('ress',$ress);
		// dump($ress);
		return $this->fetch();
	}

	//编辑公司简介
	public function editus()
	{
		$res=Db::name('etl_aboutus')->where('id',1)->find();
		$this->assign('res',$res);
		if(request()->isPost()){
			$result=$this->db->editus(input('post.'));
			if($result['valid']){
				$this->success('操作成功','admin/aboutus/index');
			}else{
				$this->error('操作失败');
			}
		}
		return $this->fetch();
	}

	//编辑公司理念
	public function editus2()
	{
		$res=Db::name('etl_aboutus')->where('id',2)->find();
		$this->assign('res',$res);
		if(request()->isPost()){
			$result=$this->db->editus2(input('post.'));
			if($result['valid']){
				$this->success('操作成功','admin/aboutus/index');
			}else{
				$this->error('操作失败');
			}
		}
		return $this->fetch();
		// dump($res);
	}

	public function editus3()
	{
		$res=Db::name('etl_aboutus')->where('id',3)->find();
		$this->assign('res',$res);
		if(request()->isPost()){
			$result=$this->db->editus3(input('post.'));
			if($result['valid']){
				$this->success('操作成功','admin/aboutus/index');
			}else{
				$this->error('操作失败');
			}
		}
		return $this->fetch();
		// dump($res);
	}

	public function editus4()
	{
		$res=Db::name('etl_aboutus')->where('id',4)->find();
		$this->assign('res',$res);
		if(request()->isPost()){
			$result=$this->db->editus3(input('post.'));
			if($result['valid']){
				$this->success('操作成功','admin/aboutus/index');
			}else{
				$this->error('操作失败');
			}
		}
		return $this->fetch();
		// dump($res);
	}

	public function imageus()
	{
				$id=(int)input('post.');
				// halt($id);
				$file = request()->file('file');
				if(!$file){
					$this->error('请选择上传文件');
				}else{


				$id=input('post.id');
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
						'id'=>$id,
						//获取文件大小
						// 'size'=>$info->getSize(),
					];
					$field=new \app\admin\model\Imageus();
					$res=$field->imageus($data);
					if($res['valid']){
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

		//上传团队风采图片
		public function uploads()
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
					$res=Db::name('etl_imageus2')->insert($data);
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

		public function delus2()
		{
			$id=input('param.id');
			$img=db('etl_imageus2')->where('id',$id)->find();
			$path=$img['path'];
			// halt($path);
			unlink(ROOT_PATH.'public/'.$path);
			$res=Db::name('etl_imageus2')->where('id',$id)->delete();
			if($res){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}

		//上传奖项荣誉图片
		public function uploads2()
			{

				$content=input('post.content');
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
						'content'=>$content,
						//获取文件大小
						// 'size'=>$info->getSize(),
					];
					$res=Db::name('etl_imageus3')->insert($data);
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

		public function delus3()
		{
			$id=input('param.id');
			$img=db('etl_imageus3')->where('id',$id)->find();
			$path=$img['path'];
			// halt($path);
			unlink(ROOT_PATH.'public/'.$path);
			$res=Db::name('etl_imageus3')->where('id',$id)->delete();
			if($res){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}

		public function edit()
		{
			// halt($_POST);
			$id=input('post.id');
			$field=new \app\admin\model\Imageus3();
			$code=$field->allowField(true)->save($_POST,['id' => $id]);
			if($code){
			    $data=[
			        'status'=>200,
			        'info'=>'操作成功',
			    ];
			}else{
			    $data=[
			        'status'=>400,
			        'info'=>'操作失败',
			    ];
			}
			return $data;
		}
}






