<?php
session_start();
include "header.php";
    ?>
<div class="container mt-5">
<?php
// if(!(isset($_GET['exid']) || $_POST['exid'])){
//   http_response_code(400);
//   header("LOCATION: ../");
// }
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= __('Add Exam')?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="code_exam69.php?action=addExam">
                <div class="card-body">                  
                <div class="row">
                <div class="col">
                  <label for="exampleInputEmail1"><?= __('Exam Type')?></label>
                  <select name="examType" class="form-control">
                        <option value="mahana">mahana</option>
                        <option value="salana">Salana</option>
                        <option value="shahmai">Shahmai</option>
                    </select>
                  </div>
                  <div class="col">
                  <label for="exampleInputEmail1"><?= __('Date')?></label>
                    <input type="date" name="examDate" class="form-control" placeholder="Exam Date">
                  </div>
                  <div class="col">
                  <label for="exampleInputEmail1"><?= __('Examner Name')?></label>
                    <input type="text" name="examner" class="form-control" placeholder="Examner Name">
                  </div>   
            </div>
                <div class="row mt-3">
                <div class="col">
                  <label for="exampleInputEmail1"><?= __('Total Marks')?></label>
                  <input type="text" name="totalMarks" class="form-control" placeholder="Total Marks">
                  </div>
                  <div class="col">
                  <label for="exampleInputEmail1"><?= __('Exam Remarks')?></label>
                    <input type="text" name="examRemarks" class="form-control" placeholder="<?= __('Exam Remarks')?>">
                  </div>   
            </div>
                <div class="card-footer text-center">
                  <button type="submit" value="add_exam" class="btn btn-lg btn-primary"><?= __('Submit')?></button>
                </div>

                
              </form>
              

              <style>

                  .disableddiv{
                    opacity: 0.4;
                    pointer-events: none;
                  }
                </style>
              
                <?php
                if(!(isset($_SESSION['examId']))){
                  echo'<div class="card mt-5 disableddiv">';
                }else{
                  echo '
                  <div class="container card m-3 bg-success text-center"><h1>EXAM SET</h1></div>';
                  echo'<div class="card mt-5">';
                }
                ?>
                    <table class="table table-hover text-nowrap" id="studentTable">
                    <thead>
                      <tr>
                        <th><?= __('ID')?></th>
                        <th><?= __('Name')?></th>
                        <th><?= __('Action')?></th>
                        <th><?= __('Action')?></th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                        include "../config/dbcon.php";
                        $sql = "select t_admission_no,t_name,t_in_exam from students where t_status = 'active' ";
                        $result= mysqli_query($con,$sql);
                        if(!$result){
                            echo '<tr class="text-center"><td colspan="5"><h3>Some Error Occured</h3></td><tr>';
                        }
                        if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                          if($row['t_in_exam'] =='1'){
                            $classbtnAdd="disabled";
                            $classbtnDis="";
                            $classRow="table-success";
                          }
                          else if($row['t_in_exam'] =='2'){
                            $classbtnAdd="";
                            $classbtnDis="disabled";
                            $classRow="table-danger";
                          }
                          else{
                            $classbtnAdd="";
                            $classbtnDis="";
                            $classRow="";
                          }
                           ?>

                          <tr id="row<?php echo $row['t_admission_no']; ?>" class = "<?php echo $classRow ?>">
                            <td><?php echo $row['t_admission_no']; ?></td>
                            <td><?php echo $row['t_name']; ?></td>
                            
                            <td ><span id="btnAdd<?php echo $row['t_admission_no']; ?>"  data-sid="<?php echo $row['t_admission_no']; ?>" class="btn btn-success addStudentToExam <?php echo $classbtnAdd ?>"><?= __('Add')?></span></td>
                            <td ><span id="btnDis<?php echo $row['t_admission_no']; ?>" data-sid="<?php echo $row['t_admission_no']; ?>" class="btn btn-danger discardStudentFromExam <?php echo $classbtnDis?>"><?= __('Discard')?></span></td>
                            
                        </tr>
                        <?php
                        }   
                        }else{
                            echo '<tr class="text-center"><td colspan="5"><h3>'.__('No Data Found').'</h3></td><tr>';
                        }
                    ?>
                    </tbody>
                    </table>
                </div>
                <div class="text-center">
                <button class="btn btn-success" id="createExamFinalbtn"><?= __('Done')?></a>
                </div>
            </div>
            </div>
            <!-- /.card -->



<?php
include "scripts.php";
    ?>