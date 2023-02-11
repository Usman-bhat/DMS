<?php
include "header.php";
?>
<?php
if(!(isset($_POST['exid']) || isset($_GET['exid']))){
  http_response_code(400);
  header("LOCATION: ../");
  die();
}
?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../images/user_images/noimg.jpg" alt="Loading..." height="60" width="60">
</div>

<!-- Content Wrapper. Contains page content -->
<div class="container">

    <!-- /.row -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= __('Result Portal') ?></h1>
                </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../"><?= __('Home') ?></a></li>
                        <li class="breadcrumb-item active"><?= __('Result') ?></li>
                        
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- table Start  -->
    <!-- <div class="container m-2">
    <a href="add_exam.php"class="btn btn-success">Add Result  <i class="fas fa-plus"></i></a>
    </div> -->
    <!-- <div class="row">
            <div class="col-12"> -->
              <div class="card">
                <div class="card-header">

                  <h3 class="card-title">  <?= __('Result') ?>
                    <?php
                    // if(isset($_GET['isclosed']) && $_GET['isclosed']=='1'){
                    //     echo"Add Result";
                    // }else{
                    //   echo "Showing Result";
                    // }
                    ?>
                  
                </h3>

                  <!-- <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-header -->
                
                <div class="card-body">
                  <table id="resultTable"class="table table-bordered table-striped dataTable dtr-inline"> 
                    <!-- class="table table-hover text-nowrap"> -->
                    <thead>
                      <tr>
                        <th><?= __('Name') ?></th>
                        <th><?= __('Total Marks') ?></th>
                        <th><?= __('Adagi') ?></th>
                        <th><?= __('Lahja') ?></th>
                        <th><?= __('Tajweed') ?></th>
                        <th><?= __('other') ?></th>
                        <th><?= __('Total') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                            $genPDFbtn = "";
                        include "../config/dbcon.php";
                        $exid = mysqli_real_escape_string($con,$_GET['exid']);
                        $sql = "SELECT `r_id`, `r_sid`, `r_date`, `r_exid`,`r_adaygi`, `r_lahja`, `r_tajweed`, `r_exam`,`t_admission_no`, `t_in_exam`, `t_status`,`t_name`,`ex_date`,`ex_total_students`,`ex_total_marks`,`ex_is_closed` FROM `result`, `students`,`exam` WHERE `r_exid` ='".$exid."'  and t_status='active' and r_sid = t_admission_no AND DATE_FORMAT(ex_date,'%y-%c,%d') = DATE_FORMAT(r_date,'%y-%c,%d')";
            
                        $result= mysqli_query($con,$sql);
                        if(!$result){
                            http_response_code(500);
                        }
                        if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                           ?>
                      <tr id="row<?php echo $row['r_id'];?>">
                        <?php
                        if($row['ex_is_closed'] == '1'){
                          $genPDFbtn = '<span class="btn btn-success" id="endExam" data-exid="'.$exid.'">End Exam</span>';
                          ?>
                          <!-- code_exam69.php?action=updateStudentsResultToDb&rid=<?php //echo $row['r_id']; ?> -->
                       <!-- <form action="code_exam69.php" method="post" class="addStudentResultForm">     -->
                        <td><?php echo $row['t_name']; ?></td>
                        <td><input type="hidden"  id="totalmarks<?php echo $row['r_id'];?>" value="<?php echo $row['ex_total_marks'];?>"/><?php echo $row['ex_total_marks'];?></td>
                        <td><input type="number" id="val1<?php echo $row['r_id'];?>" value ="<?php echo $row['r_adaygi']; ?>"/></td>
                        <td><input type="number" id="val2<?php echo $row['r_id'];?>" value ="<?php echo $row['r_lahja']; ?>"/></td>
                        <td><input type="number" id="val3<?php echo $row['r_id'];?>" value ="<?php echo $row['r_tajweed']; ?>"/></td>
                        <td><span class="btn btn-sm btn-success addStudentResult" data-rid="<?php echo $row['r_id']; ?>">Add</span></td>
                        <td id="totalMarks"><?= "jjj"; ?></td>

                        <!-- </form> -->
                        <?php
                        }else{
                          $genPDFbtn = '<button class="btn btn-success btn-sm">Generte pdf</button>';
                          $marksSum=0;
                          ?>
                        <td><?php echo $row['t_name']; ?></td>
                        <td><?php echo $row['ex_total_marks']; ?></td>
                        <td>
                          <?php 
                          $marksSum += $row['r_adaygi'];
                          echo $row['r_adaygi']; ?>
                      </td>
                        <td><?= $row['r_lahja']; ?></td>
                        <td><?php $marksSum += $row['r_tajweed'];
                        echo $row['r_tajweed']; ?></td>
                        <td >other</td>
                        <td ><?= $marksSum?></td>
                        
                      <?php  
                      }
                        ?>
                        
                      </tr>
                      <?php
                        }   
                        }else{
                          $genPDFbtn = '<a href="index.php" class="btn btn-success btn-sm">Back</a>';
                            echo '<tr class="text-center"><td colspan="5"><h3>No data found</h3></td><tr>';
                        }
                    ?>
                    
                    </tbody>
                  </table>
                  <div class="container text-center m-3">
                    <?php echo $genPDFbtn?>
                    <!-- <span class="btn btn-success" id="endExam" data-exid="<?php //echo $exid;?>">End Exam</span> -->
                  </div>
                <!-- /.card-body -->
                </div>
              <!-- </div> -->
              <!-- /.card -->
          <!-- table end  -->






<?php
include "scripts.php";
?>