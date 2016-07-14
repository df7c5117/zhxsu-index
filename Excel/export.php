<?php
session_start();
$_SESSION['dep']="电脑部";
$dep=$_SESSION['dep'];
require_once 'PHPExcel/PHPExcel.php';
require_once 'PHPExcel/PHPExcel/Writer/Excel5.php';
require_once 'phpExcel/PHPExcel/IOFactory.php';
require('suindex/Include/conn.php');

$c=3;$column=0;
$title=array(
  'A'=>'ID',
  'B'=>'姓名',
  'C'=>'班别',
  'D'=>'性别',
  'E'=>'手机',
  'F'=>'邮箱',
  'G'=>'QQ',
  'H'=>'微信',
  'I'=>'报名部门',
  'J'=>'附言',
  'K'=>'报名时间'
);


$objExcel = new PHPExcel();
$objExcel->setActiveSheetIndex(0);
$objSheet = $objExcel->getActiveSheet();

// 工作表名称
$objSheet->setTitle('37届学生会'.$dep.'报名数据');

// 合并单元格
$objSheet->mergeCells('A1:K1');

// 设置单元格内容(题头)
$objSheet->setCellValue('A1','37届学生会'.$dep.'报名数据统计');

// 设置单元格字体大小(题头)
$objSheet->getStyle('A1')->getFont()->setSize(20);

// 设置单元格粗体字(题头)
$objSheet->getStyle('A1')->getFont()->setBold(true);

// 设置单元格行高(题头)
$objSheet->getRowDimension(1)->setRowHeight(26.5);

// 设置列宽
$width=array(
  'A'=>'2.91',
  'B'=>'7.64',
  'C'=>'11.5',
  'D'=>'4.73',
  'E'=>'12.5',
  'F'=>'19.73',
  'G'=>'10.23',
  'H'=>'11.68',
  'I'=>'8.91',
  'J'=>'20',
  'K'=>'18.82'
);

foreach($width as $key=>$value){
  $objSheet->getColumnDimension($key)->setWidth($value);
}

//设置题头居中
$objSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objSheet->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

// 设置工作表文本居中
foreach($title as $key=>$value){
  $objSheet->getStyle($key)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
  $objSheet->getStyle($key)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
}

// 设置表头
foreach($title as $key=>$value){
  $objExcel->getActiveSheet()->setCellValue($key.'2',$value);
}


// 读取数据库内容
$sql = "SELECT * FROM sign_studata WHERE SignDep LIKE '%$dep%'";
$result=mysqli_query($conn,$sql);
$TT=mysqli_num_rows($result)+2;

$styleArray=array(
  'borders'=>array(
    'allborders'=>array( 
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objSheet->getStyle('A1:K'.$TT)->applyFromArray($styleArray);

// 设置背景颜色
$objSheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objSheet->getStyle('A1')->getFill()->getStartColor()->setARGB("#FF1BB8D6");
$objSheet->getStyle('A2:K2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objSheet->getStyle('A2:K2')->getFill()->getStartColor()->setARGB("#FFBDBDBD");


// 加入数据
$sheet = $objExcel->getActiveSheet();
while($row=mysqli_fetch_row($result)){
  $sheet->setCellValue('A'.$c,$row[0]);
  $sheet->setCellValue('B'.$c,$row[1]);
  $sheet->setCellValue('C'.$c,'高一（'.$row[2].'）班');
  $sheet->setCellValue('D'.$c,$row[3]);
  $sheet->setCellValue('E'.$c,$row[4]);
  $sheet->setCellValue('F'.$c,$row[5]);
  $sheet->setCellValue('G'.$c,$row[6]);
  $sheet->setCellValue('H'.$c,$row[7]);
  $sheet->setCellValue('I'.$c,$dep);
  $sheet->setCellValue('J'.$c,$row[9]);
  $sheet->setCellValue('K'.$c,$row[10]);
  $c++;
}

// 导出Excel
$objExcel->setActiveSheetIndex(0);
$objWriter=PHPExcel_IOFactory::createWriter($objExcel,'Excel5');
output_excel('37届学生会'.$dep.'报名统计表.xls');
$objWriter->save('php://output');


function output_excel($file_name) {
header ('Pragma: public');
header ('Expires: 0');
header ('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header ('Content-Type: application/force-download');
header ('Content-Type: application/octet-stream');
header ('Content-Type: application/download');
Header('content-Type:application/vnd.ms-excel;charset=utf-8');
header ('Content-Disposition: attachment;filename='.$file_name);
header ('Content-Transfer-Encoding: binary');
}
?>