<?php
header('Content-Type: text/html; charset=utf-8');
require_once('lib/tcpdf_min/tcpdf.php');
require_once('lib/fpdi/autoload.php');
use setasign\Fpdi\TcpdfFpdi;
 

require("Rabbit.php");
//echo Rabbit::zg2uni("ေနေကာင္္း");
//echo Rabbit::uni2zg("ေနေကာင္္း");


function uni2zg($str){
    return Rabbit::uni2zg($str);
}


$pdf = new TcpdfFpdi();
$pdf->SetMargins(0, 0, 0);
$pdf->SetCellPadding(0);
$pdf->SetAutoPageBreak(false);
$pdf->setPrintHeader(false);    
$pdf->setPrintFooter(false);
// テンプレート読み込み
$pdf->setSourceFile('resume_template.pdf');
// 用紙サイズ
$pdf->AddPage('P', 'A4');
$pdf->useTemplate($pdf->importPage(1));
// フォント設定 - IPA明朝
//$tcpdf_fonts = new TCPDF_FONTS();
//$font = $tcpdf_fonts->addTTFfont('tcpdf/fonts/ipam.ttf');

//$tcpdf_fonts = new TCPDF_FONTS();
//$font = $tcpdf_fonts->addTTFfont('tcpdf/fonts/ipam.ttf');

//$pdf->SetFont('kozminproregular', '', 8);

// convert TTF font to TCPDF format and store it on the fonts folder
// public static addTTFfont( $fontfile[,  $fonttype = '' ][,  $enc = '' ][,  $flags = 32 ][,  $outpath = '' ][,  $platid = 3 ][,  $encid = 1 ][,  $addcbbox = false ][,  $link = false ]) : (string)
//$fontname = TCPDF_FONTS::addTTFfont('./font.ttf', 'TrueTypeUnicode', '', 32,'','',1);

// use the font
//$pdf->SetFont($fontname, '', 12, '', false);
//$pdf->SetFont($fontname, '', 12, '', false);
//$pdf->SetFont($font_family = 'pyidaungsu', $variant = '', $fontsize = 11);
//$pdf->SetFont($font_family = 'myanmar3', $variant = '', $fontsize = 11);
//$pdf->SetFont($font_family = 'notosan', $variant = '', $fontsize = 11);
$pdf->SetFont($font_family = 'zawgyi', $variant = '', $fontsize = 11);
//$pdf->SetFont($font_family = 'kozminproregular', $variant = '', $fontsize = 11);
// $line_height = $line_start + $line ;

// for line 1
//$lineOne = $line_start + ($line * 1);

function lineY($lineNo){
    $line_start = 15;
    $line = 5.9 ; // line height 5 mm 
    $y = $line_start + ($line * $lineNo);
    if($lineNo >= 18 ) $y += 2.3;
    if($lineNo >= 27 ) $y += 6;
    return $y;
}


$pdf->Text(0, 0, uni2zg("သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။")); // current_year
// 32 နေရာစာ အချက်အလက် ဖြည့်သွင်း
$pdf->Text(165, lineY(1), uni2zg("ပြည်ထောင်စုမြန်မာနိုင်ငံတော်")); // current_year
$pdf->Text(179, lineY(1), "04"); // current_month
$pdf->Text(190, lineY(1), "28"); // current_date

$pdf->Text(34,  lineY(2), uni2zg("ပြည်ထောင်စုမြန်မာနိုင်ငံတော်")); // name

$pdf->Text(34,  lineY(3), uni2zg("ပြည်ထောင်စုမြန်မာနိုင်ငံတော်")); // japan_name
$pdf->Text(79, lineY(3), uni2zg("ပြည်ထောင်စုမြန်မာနိုင်ငံတော်")); // gender_id
$pdf->Text(89, lineY(3), "2021"); // date_of_birth
$pdf->Text(104, lineY(3), "04"); // date_of_birth
$pdf->Text(116, lineY(3), "28"); // date_of_birth
$pdf->Text(149.7, lineY(3), uni2zg("မြန်မာ နိုင်ငံသား")); // nationality_id

$pdf->Text(116, lineY(4), "27"); // martial_status
$pdf->Text(149.7, lineY(4), "martial_status"); // martial_status


$pdf->Text(32.7, lineY(5), "postal_code"); // postal_code
$pdf->Text(88.9,  lineY(5), "visa_status_id"); // visa_status_id
$pdf->Text(149.6, lineY(5), "visa_deadline_date"); // visa_deadline_date

$pdf->Text(32.7, lineY(6), "address"); // address
$pdf->Text(149.6, lineY(6), "japan_level_id"); // japan_level_id

$pdf->Text(55.3, lineY(7), "email"); // email
$pdf->Text(149.6, lineY(7), "phone_no"); // phone_no

$startYearX = 26.5;
$startMonthX = 38.2;
$endYearX = 44.5;
$endMonthX = 56.6;
$nameX = 63.1;

// need to loop upon 5 school data
$pdf->Text($startYearX,  lineY(10), "2021"); // school_in_date : year : 2021
$pdf->Text($startMonthX,  lineY(10), "12"); // school_in_date : month : 12
$pdf->Text($endYearX,  lineY(10), "2021"); // school_out_date : year : 2021
$pdf->Text($endMonthX,  lineY(10), "10"); // school_out_date : month : 12
$pdf->Text($nameX, lineY(10), "school_name"); // school_name

$pdf->Text(57, lineY(16), "school_status + school_major"); // school_status
// $pdf->Text(100, lineY(17), "school_major"); // school_major

// need to loop upon 5 certificate data
$pdf->Text($startYearX,  lineY(19), "2021"); // certificate_date : year : 2021
$pdf->Text($startMonthX,  lineY(19), "12"); // certificate_date : month : 12
$pdf->Text($endYearX, lineY(19), "certificate_name"); // certificate_name

$pdf->Text(120.2, lineY(18), "remark"); // remark

$pdf->Text($endYearX, lineY(24), "certificate_remark"); // certificate_remark
$pdf->Text(104.9, lineY(24), "driver_license_status"); // driver_license_status


// need to loop upoon 5 job data
$pdf->Text($startYearX,  lineY(27), "2021"); // job_in_date : year : 2021
$pdf->Text($startMonthX,  lineY(27), "12"); // job_in_date : month : 12
$pdf->Text($endYearX,  lineY(27), "2021"); // japan_name  : year : 2021
$pdf->Text($endMonthX,  lineY(27), "12"); // japan_name  : month : 12
$pdf->Text(63.6, lineY(27), "job_name"); // japan_name
$pdf->Text(133.3, lineY(27), "job_detail"); // japan_name
// $pdf->Text(100, 100, "job_place"); // japan_name



//$pdf->Text(100, 100, "state_id"); // state_id
//$pdf->Text(100, 100, "arrival_date"); // arrival_date
//$pdf->Text(100, 100, "other_personal_staff"); // other_personal_staff

$pdf->Text($startYearX, lineY(34), "self_promotion"); // self_promotion
$pdf->Text($startYearX, lineY(39), "wanted"); // wanted



$pdf->Output(sprintf("MyResume_%s.pdf", time()), 'I');
//$pdf->Output("cv_form_6.pdf", 'I');
?>