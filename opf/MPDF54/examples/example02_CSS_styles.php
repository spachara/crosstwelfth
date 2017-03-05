<?php


$strFileName = "../../test.txt";
$objFopen = fopen($strFileName, 'r');
if ($objFopen) {
    while (!feof($objFopen)) {
        $file = fgets($objFopen, 4096);
        echo $html = "'".$file."'";
    }
    fclose($objFopen);
}



//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF('c'); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyleA4.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
//==============================================================
//==============================================================
//==============================================================

?>