<?php
// include('../admin/auth.php');
function get_Data($for){
// require('C:\xampp\htdocs\Darasgah_mag\admin\auth.php');
include('C:\xampp\htdocs\Darasgah_mag\admin\config\dbcon.php');

    $amount= [0,0,0,0,0,0,0,0,0,0,0,0];
    $months= [];
$query = "select month(dt_date) , SUM(dt_amount) from audit_debit WHERE YEAR(dt_date) = 2022 AND dt_for= '".$for. "' GROUP By MONTH(dt_date) order By MONTH(dt_date)";
/*
"select month(dt_date) , SUM(dt_amount) from audit_debit WHERE YEAR(dt_date) = 2022 AND dt_for= 'pay' GROUP By MONTH(dt_date) order By MONTH(dt_date)";
*/

    $query_run = mysqli_query($con, $query);
    while ($res = mysqli_fetch_array($query_run)) {
        $data[] = $res;
    }
    // print_r($data);
    for ($i=0; $i<mysqli_num_rows($query_run); $i++){
        
    // if(number_format($data[$i]['month(dt_date)']) == $i+1){
    //     $amount[$i] = $data[$i]['SUM(dt_amount)'];
    //     $monthes[$i] = $data[$i]['month(dt_date)']; 
    // }else{
    //     $monthes[$i] = "0"; 
    //     $amount[$i] = "0"; 
    // }

        $amount[$i] = $data[$i]['SUM(dt_amount)'];
        $monthes[$i] = $data[$i]['month(dt_date)']; 
        
        // $amount[$data[$i]['month(dt_date)'] - 1] = $data[$i]['SUM(dt_amount)'];
        // $monthes[$data[$i]['month(dt_date)'] - 1] = $data[$i]['month(dt_date)'];  
    }
    // print_r(json_encode($monthes));
    // print_r(json_encode($amount));

    // echo count($monthes);
    if(count($monthes)<12){
        for($i=0;$i<count($monthes);$i++){
            $amount[$monthes[$i]-1] = $amount[$i];
            // $amount[$i]=0;
        }
    }


    // print_r(json_encode($monthes));
    // print_r(json_encode($amount));
    // echo"\n";
    // echo"\n";
    // print_r($amount);

    echo"const amount_".$for." = ";
    echo(json_encode($amount));
    echo"; \n";

    echo"const monthes_".$for." = ";
    echo(json_encode($monthes));
    echo";\n";
}

get_Data('food');
echo"\n";
get_Data('bills');
echo"\n";
get_Data('pay');
echo"\n";
get_Data('construction');
echo"\n";
get_Data('others');
?>