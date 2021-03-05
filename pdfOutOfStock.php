<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'sarabun'
]);

// ตั้งค่าวันที่
$data = date("Y-m-d");
$arr = explode("-",$data);

$day = $arr[2];
$m = $arr[1];
switch ($m) {
    case 1:
        $month = "มกราคม";
        break;
    case 2:
        $month = "กุมภาพันธ์";
        break;
    case 3:
        $month = "มีนาคม";
        break;
    case 4:
        $month = "เมษายน";
        break;
    case 5:
        $month = "พฤษภาคม";
        break;
    case 6:
        $month = "มิถุนายน";
        break;
    case 7:
        $month = "กรกฎาคม";
        break;
    case 8:
        $month = "สิงหาคม";
        break;
    case 9:
        $month = "กันยายน";
        break;
    case 10:
        $month = "ตุลาคม";
        break;
    case 11:
        $month = "พฤษจิยน";
        break;
    case 12:
        $month = "ธันวาคม";
        break;
}
$year = ((int)$arr[0]+543);

$html = "";
$html .= '<table style="margin-bottom: 15px;">';
$html .= '    <tr><td><img style="height:50px;margin-left: 10px;" src="Logo.jpg" alt="" srcset=""></td><td style="margin-left:30px"><br><h4 >&nbsp;&nbsp;&nbsp;รายงานอุปกรณ์ที่หมดแล้วประจำวันที่ '.$day." ".$month." ".$year.'</h4></td></tr>';
$html .= '    <tr ><td style="width:1px"></td><td ></td></tr>';
$html .= '</table>';
$html .= "";

$json = file_get_contents('http://localhost/stationarySystem/api/stationary/readOutOfStock.php');
$obj = json_decode($json);
$arr = $obj->records;

$html .= '<table style="width: 100%;text-align: center;border-collapse: collapse;">';
$html .= '<tr>';
    $html .= '<th style="height:40px;border: 1px solid black;background-color: #4287f5;color: white;">รหัส</th>';
    $html .= '<th style="height:40px;border: 1px solid black;background-color: #4287f5;color: white;">ประเภทอุปกรณ์</th>';
    $html .= '<th style="height:40px;border: 1px solid black;background-color: #4287f5;color: white;width:200px">ชื่ออุปกรณ์</th>';
    $html .= '<th style="height:40px;border: 1px solid black;background-color: #4287f5;color: white;">จำนวน<br>ในสต๊อค</th>';
    
$html .= '</tr>';
    for($i=0;$i<count($arr);$i++){
        $html .= '<tr>';
            $html .= "<td style='height:40px;border: 1px solid black;'>".$arr[$i]->sta_id."</td>";
            $html .= "<td style='height:40px;border: 1px solid black;'>".$arr[$i]->type_name."</td>";
            $html .= "<td style='height:40px;border: 1px solid black;'>".$arr[$i]->sta_name." ".$arr[$i]->brand;
            if($arr[$i]->color != "")$html .= " สี".$arr[$i]->color;
            if($arr[$i]->sta_amount != "")$html .= " ".$arr[$i]->sta_amount." ".$arr[$i]->unit."/หน่วย";
            $html .= "</td>";
            $html .= "<td style='height:40px;border: 1px solid black;'>".$arr[$i]->balance."</td>";
        $html .= '</tr>';
    }

$html .= '</table>';



/*
for($i=0;$i<count($arr);$i++){
    $html .= $arr[$i]->sta_name."<br>";
}
*/


$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
?>





