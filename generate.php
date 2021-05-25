<?php
//header("Content-type: application/pdf");
header('Content-Type: text/html; charset=utf-8');
require_once('./lib/tcpdf_min/tcpdf.php');
require_once('./lib/fpdi/autoload.php');
use setasign\Fpdi\TcpdfFpdi;
require("./Rabbit.php");


function uni2zg($str){
    return Rabbit::uni2zg($str);
}


$pdf = new TcpdfFpdi();
$pdf->SetMargins(0, 0, 0);
$pdf->SetCellPadding(0);
$pdf->SetAutoPageBreak(false);
$pdf->setPrintHeader(false);    
$pdf->setPrintFooter(false);

$pdf->setSourceFile('template.pdf');


$data = $_POST;

//$data = json_decode($postData,true);


$name = isset($data['name']) ? $data['name'] : 'name';
$job = isset($data['job']) ? $data['job'] : 'job';
$address1 = isset($data['address1']) ? $data['address1'] : 'address1';
$address2 = isset($data['address2']) ? $data['address2'] : 'address2';
$phone = isset($data['phone']) ? $data['phone'] : 'phone';
$email = isset($data['email']) ? $data['email'] : 'email';
$website = isset($data['website']) ? $data['website'] : 'website';


$pdf->AddPage('L', 'Card');
$pdf->useTemplate($pdf->importPage(1));
$pdf->SetFont($font_family = 'zawgyi', $variant = '', $fontsize = 11);

//$pdf->SetTextColor(0,0,0);
//$pdf->Text(0, 0, uni2zg("သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။")); // current_year

//$pdf->Text(100, 100, uni2zg("သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။")); // current_year


$pdf->SetTextColor(255,255,255);
$pdf->SetFontSize(24);
$pdf->Text(41, 106, uni2zg($address1)); 

$pdf->SetFontSize(16);
$pdf->Text(41, 120.4, uni2zg($address2)); 
$pdf->Text(41, 137.8, uni2zg($phone)); 
$pdf->Text(41, 161.0, uni2zg($email)); 

$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(24);
$pdf->Text(218.5, 105.6, uni2zg($name)); 
$pdf->SetFontSize(18);
$pdf->Text(218.5, 124.9, uni2zg($job)); 

$pdf->Text(218.5, 161.0, uni2zg($website)); 

$pdf->Output(sprintf("business_card_%s.pdf", time()), 'I');
?>