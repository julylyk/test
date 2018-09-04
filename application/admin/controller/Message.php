<?php 
namespace app\admin\controller;

use think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;

class Message extends Controller
{
	public function index()
	{
		$res=db('etl_message')->paginate(4);
		$this->assign('res',$res);
		// dump($res);
		return $this->fetch();
	}

	//导出
	public function export(){//导出Excel
	       $xlsName  = "JULY"; //下载文件名称前缀
	       $xlsCell  = array(
	           array('name','姓名'),
	           array('createtime','发送时间'),
	           array('content','留言'),
	       ); //设置匹配字段以及字段名称
	       $xlsData  = db('etl_message')->select();
	       $this->exportExcel($xlsName,$xlsCell,$xlsData);
	   }

	 public function exportExcel($expTitle,$expCellName,$expTableData){
	       include_once EXTEND_PATH.'PHPExcel/PHPExcel.php';//方法二
	       $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
	       $fileName = $expTitle.date('_Ymd');//or $xlsTitle 文件名称可根据自己情况设定
	       $cellNum = count($expCellName);
	       $dataNum = count($expTableData);
	       // $objPHPExcel = new PHPExcel();//方法一
	       $objPHPExcel = new \PHPExcel();//方法二
	       $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
	       $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
	       $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
	       for($i=0;$i<$cellNum;$i++){
	           $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
	       }
	       // Miscellaneous glyphs, UTF-8
	       for($i=0;$i<$dataNum;$i++){
	           for($j=0;$j<$cellNum;$j++){
	               $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
	           }
	       }
	       ob_end_clean();//这一步非常关键，用来清除缓冲区防止导出的excel乱码
	       header('pragma:public');
	       header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xlsx"');
	       header("Content-Disposition:attachment;filename=$fileName.xlsx");//"xls"参考下一条备注
	       $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');//"Excel2007"生成2007版本的xlsx，"Excel5"生成2003版本的xls
	       $objWriter->save('php://output');
	       exit;
	   }
}





