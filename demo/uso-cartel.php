<?php
header("Content-Type:text/html; charset=utf-8");
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$usuario=$_SESSION['ESTADO'];

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Argentina/Buenos_Aires');
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');


require_once 'Classes/PHPExcel.php';

	$estiloTituloReporte = array(
	    'font' => array(
	        'name'      => 'Arial',
	        'bold'      => true,
	        'italic'    => false,
	        'strike'    => false,
	        'size' =>16,
	        'color'     => array(
	            'rgb' => 'FFFFFF'
	        )
	    ),
	    'fill' => array(
	      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
	      'color' => array(
	            'rgb' => '1c1475')
	  ),
	    'borders' => array(
	        'allborders' => array(
	            'style' => PHPExcel_Style_Border::BORDER_NONE
	        )
	    ),
	    'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	        'rotation' => 0,
	        'wrap' => TRUE
	    )
	);
	 
	$estiloTituloColumnas = array(
	    'font' => array(
	        'name'  => 'Arial',
	        'bold'  => true,
	        'color' => array(
	            'rgb' => 'FFFFFF'
	        )
	    ),
	    'fill' => array(
	        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
	  		'color' => array(
	            'rgb' => '1c1475')
	    ),
	    'borders' => array(
	        'top' => array(
	            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
	            'color' => array(
	                'rgb' => '1c1475'
	            )
	        ),
	        'bottom' => array(
	            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
	            'color' => array(
	                'rgb' => '1c1475'
	            )
	        )
	    ),
	    'alignment' =>  array(
	        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	        'wrap'      => TRUE
	    )
	);
	 
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
	    'font' => array(
	        'name'  => 'Arial',
	        'color' => array(
	            'rgb' => '000000'
	        )
	    ),
	    'fill' => array(
	  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
	  'color' => array(
	            'argb' => 'FFFFFFFF')
	  ),
	    'borders' => array(
	        'left' => array(
	            'style' => PHPExcel_Style_Border::BORDER_THIN ,
	      'color' => array(
	              'rgb' => '000000'
	            )
	        )
	    )
	));

$result_cartel=mysql_query("select cartel_precios.usuario, cartel_precios.fecha, usuarios.sucursal from cartel_precios, usuarios WHERE cartel_precios.usuario = usuarios.email AND cartel_precios.usuario!='' ORDER BY fecha DESC");

if ($row_cartel=mysql_fetch_array($result_cartel)) {
	 $objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("Web 2 Flyer") // Nombre del autor
    ->setLastModifiedBy("Web 2 Flyer") //Ultimo usuario que lo modificó
    ->setTitle("Registro de uso Cartel de Precios WTF") // Titulo
    ->setSubject("Registro de uso Cartel de Precios WTF") //Asunto
    ->setDescription("Reporte de uso del cartel de precios de WTF") //Descripción
    ->setKeywords("reporte cartel precios") //Etiquetas
    ->setCategory("Reporte excel"); //Categorias

    $tituloReporte = "Registro de uso Cartel de Precios WTF";
	$titulosColumnas = array('SUCURSAL', 'E-MAIL', 'FECHA');

	// Se combinan las celdas A1 hasta C1, para colocar ahí el titulo del reporte
	$objPHPExcel->setActiveSheetIndex(0)
	    ->mergeCells('A1:C1');
	 
	// Se agregan los titulos del reporte
	$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2]);
    //Se agregan los datos de los alumnos
 
	$i = 4; //Numero de fila donde se va a comenzar a rellenar
	do {
	     $objPHPExcel->setActiveSheetIndex(0)
	         ->setCellValue('A'.$i, $row_cartel['sucursal'])
	         ->setCellValue('B'.$i, $row_cartel['usuario'])
	         ->setCellValue('C'.$i, $row_cartel['fecha']);
	     $i++;
	} while ($row_cartel=mysql_fetch_array($result_cartel));


	$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:C".($i-1));

	for($i = 'A'; $i <= 'C'; $i++){
	    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
	}

	// Se asigna el nombre a la hoja
	$objPHPExcel->getActiveSheet()->setTitle('Cartel de Precios');
	 
	// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
	$objPHPExcel->setActiveSheetIndex(0);
	 
	// Inmovilizar paneles
	//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
	$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

	 
	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Registro-Uso-Cartel-Precios.xls"');
	header('Cache-Control: max-age=0');


	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');

	exit;
}
	else {
	    print_r('No hay resultados para mostrar.');
	}

?>