<?php 
require('C:\xampp\htdocs\Darasgah_mag\admin\auth.php');
include('C:\xampp\htdocs\Darasgah_mag\admin\config\dbcon.php');

if(isset($_REQUEST['year'])){
    $year = mysqli_real_escape_string($con, $_REQUEST['year']);
    $status = mysqli_real_escape_string($con, $_REQUEST["status"]);
    // if($year){
    //     echo '<h3 class="text-center">Bad Request</h3>';
    // }
    $query =  "SELECT * FROM `students` WHERE YEAR(`t_admission_date`) IN ( ".$year. ") AND t_status = '".$status ."'" ;
    // echo $query;
    $query_run = mysqli_query($con, $query);
    if(!$query_run){
        echo'<h3 class="text-center">Error Please try later</h3>';
    }
    else{
    if ($query_run->num_rows > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($query_run)) {
           echo ' <tr>
            <td>'.$row["t_admission_no"].'</td>
            <td class="ur_text">'.$row["t_name_ur"].'</td>
            <td class="ur_text">'.$row["t_parentage_ur"].'</td>
            <td>'.$row["t_phone_number"].'</td>
            <td>'.$row["t_status"].'</td>
            <td>
                <a href="show_student.php?sid='.$row["t_admission_no"] .'" class="btn btn-sm btn-primary" type="submit">
                    <i class="fas fa-eye"></i> Show
                </a>
            </td>
            <td>

                <a href="edit_student.php?sid='.$row["t_admission_no"] .'" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </td>
            <td>
                <button type="button" value="'.$row["t_admission_no"] .'" class="btn btn-sm btn-danger delete_btn">
                    <i class="fas fa-trash"></i> delete
                </button>
            </td>
        </tr>';

        }
    }else{
        echo '<h3 class="text-center">No Data Found</h3>';
    }
}
}
else{
    http_response_code(400);
}
?>

