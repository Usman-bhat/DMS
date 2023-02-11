<style>
     @font-face {
      font-family: nooriregular;
      src: url('nooriregular.ttf');
    }
     @font-face {
      font-family: noorikshda;
      src: url('../../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    table{
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 5px;
        margin-right: 5px;
    }
    td{
        text-align: right;
        direction: rtl;
        font-family: 'nooriregular';
    }
    table, td, th {
        border: 1px solid black;
    }
    tr{
        height: 5px;
    }

table {
  border-collapse: collapse;
  width: 95%;
  height: auto;
  padding: 10px;
}

    

    
</style>
<?php
require("vendor/autoload.php");
include "../config/dbcon.php";
if(!isset($_GET['exid'])){
    http_response_code(400);
    header("LOCATION: ../");
    die();
}
$exid=mysqli_real_escape_string($con,$_GET['exid']);

$res=mysqli_query($con,"SELECT `r_id`,`r_ex_chapters`,`r_remark`, `r_sid`, `r_date`, `r_exid`,`r_adaygi`, `r_lahja`, `r_tajweed`, `r_exam`,`t_admission_no`, `t_in_exam`, `t_status`,`t_address_ur`,`t_name_ur`,`ex_date`,`ex_total_students`,`ex_total_marks`,`ex_is_closed` FROM `result`, `students`,`exam` WHERE `r_exid` ='".$exid."'  and t_status='active' and r_sid = t_admission_no AND DATE_FORMAT(ex_date,'%y-%c,%d') = DATE_FORMAT(r_date,'%y-%c,%d')");
if(mysqli_num_rows($res)>0){
	$html='<style>
      
      </style>
      <div style="overflow-x: auto;">
      <table class="table">';
		$html.='<tr>
        <td style="width: 20%; font-family:noorikshda;font-size:20px;text-align:center">کیفیت</td>
        <td>تیجہ (100)</td>
        <td>میزان </td>
        <td>درجہ</td>
        <td>تجوید</td>
        <td>مقدار خواندگی</td>
        <td>سکونت</td>
        <td>نام</td>
        <td>نمبر شمار</td> 
        </tr>';
        $i=1;
		while($row=mysqli_fetch_assoc($res)){ 
            $totalMArks=$row['r_adaygi']+$row['r_lahja']+$row['r_tajweed'];
			$html.='<tr>
            <td>'.$row['r_remark'].'</td>
            <td>'.$totalMArks.'</td>
            <td>'.$row['r_adaygi'].'</td>
            <td>'.$row['r_lahja'].'</td>
            <td>'.$row['r_tajweed'].'</td>
            <td>'.$row['r_ex_chapters'].'</td>
            <td>'.$row['t_address_ur'].'</td>
            <td>'.$row['t_name_ur'].'</td>
            <td>'.$i.'</td>
            </tr>';
            $i+=1;
		}
	$html.='<tr col-span=8></tr>
    </table></div>';

    echo $html;
}else{
	$html="Data not found";
}
// $mpdf=new \Mpdf\Mpdf([
//     'mode' => 'utf-8',
//     'format' => [190, 236],
//     'orientation' => 'P',
//     'fontdata' => [ // lowercase letters only in font key
//         'nooriregular' => [
//             'R' => 'noorikshda.ttf',
//             'useOTL' => 0x00,
//             'useKashida' => 10
//         ]
//         ]
// ]);
// $mpdf->SetDirectionality('rtl');
// $mpdf->WriteHTML($html);
// $file='media/'.time().'.pdf';
// $mpdf->output($file,'I');
//D
//I
//F
//S
?>