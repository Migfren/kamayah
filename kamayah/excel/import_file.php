<?php
include 'db.php';

$uploadfile=$_FILES['uploadfile']['tmp_name'];
require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
$id=null;
{
	$highestrow=$worksheet->getHighestRow();

	for($row=1;$row<=$highestrow;$row++)
	{
		$english=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$tausug=$worksheet->getCellByColumnAndRow(1,$row)->getValue();




		if($english!='')
		{
			echo $english.'---'.$tausug;
			$insertqry="INSERT INTO english_tausug(tausug_words,english) 
            VALUES ('$tausug','$english')";

			$insertres=mysqli_query($con,$insertqry);
		}
	}
}
?>