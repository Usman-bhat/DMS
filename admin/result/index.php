<?php
include "header.php";
// require "../../lang.php";
?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../images/user_images/noimg.jpg" alt="Loading..." height="60" width="60">
</div>

<!-- Content Wrapper. Contains page content -->
<div class="container">

    <!-- for alterts start -->
    <?php include("../alert.php"); ?>
    <!-- for alterts end -->
    <!-- Info boxes -->


    <!-- /.row -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= __('Mohtamim Dashboard')?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../"><?= __('Home')?></a></li>
                        <li class="breadcrumb-item active"><?= __('Result')?></li>
                        
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- table Start  -->
    <div class="container m-2">
    <a href="add_exam.php"class="btn btn-success"><?= __('Add Exam')?>  <i class="fas fa-plus"></i></a>
    </div>
    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><?= __('Exam List')?></h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="<?= __('Search')?>">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th><?= __('ID')?></th>
                        <th><?= __('Exam')?></th>
                        <th><?= __('Date')?></th>
                        <th><?= __('Exam By')?></th>
                        <th><?= __('Action')?></th>
                      </tr>
                    </thead>
                    <tbody>

    
                    <?php
                        include "../config/dbcon.php";
                        $sql = "select * from exam ";
                        $result= mysqli_query($con,$sql);
                        if(!$result){
                            http_response_code(500);
                        }
                        if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                          if($row['ex_is_closed']==0){
                            $classRow = "table-danger";
                            $btnTxt = "Show";
                          }else{
                            $classRow = "";
                            $btnTxt = "Add";
                            $genPDFtn="";
                          }
                           ?>
                           
                      <tr class="<?php echo $classRow; ?>">
                        <td><?php echo $row['ex_id']; ?></td>
                        <td><?php echo __($row['ex_type']); ?></td>
                        <td><?php echo $row['ex_date']; ?></td>
                        <td><?php echo $row['ex_by']; ?></td>
                        <td class="text-center"><a href="add_result.php?exid=<?php echo $row['ex_id']; ?>"class="btn btn-success btn-sm"><?php echo __($btnTxt); ?></a></td>
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
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

          <!-- table end  -->





<?php
include "scripts.php";
?>