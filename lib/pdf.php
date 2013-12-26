<?php
//============================================================+
// Source -- created from example_001.php in the TCPDF pacage by
//           Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

// Docs: http://www.tcpdf.org/doc/code/classTCPDF.html

// Error if called separately  
if (!defined('INDEX')) { 
   die('You cannot call this script directly!');
}


require_once('./lib/tcpdf_eng.php');
define("TCPDF_ROOT", "./lib/tcpdf");
require_once(TCPDF_ROOT . '/tcpdf.php');

function make_pdf()
{
	global $l; // defined in config/lang/eng.php

	// create new PDF document
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// remove default header/footer
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	//set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	//set some language-dependent strings
	$pdf->setLanguageArray($l);

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('times', 'BI', 20);

	// add a page
	$pdf->AddPage();

	// set some text to print
	$txt = <<<EOD
Hello World!

Please sign below.




X_______________________
EOD;

	// print a block of text using Write()
	$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

	// ---------------------------------------------------------

	//Close and output PDF document
	//$pdf->Output('signed_hello_world.pdf', 'I');

	//Close and return as a string
    return $pdf->Output('', 'S');
}
//============================================================+
// END OF FILE
//============================================================+
