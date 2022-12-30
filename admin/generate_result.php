<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
?>
<script src="assets/plugins/jquery-form/jquery.form.js"></script>
<?php
if(isset($_POST['generateHidden'])){
    include_once("config/dbcon.php");
    // echo "-----------------------------------------------------------------------true";
    $status = mysqli_real_escape_string($con,$_POST['sstatus']);
    $year = mysqli_real_escape_string($con,$_POST['syear']);
    $class = mysqli_real_escape_string($con,$_POST['sclass']);

    $sql = "SELECT * FROM `result` WHERE date(r_date)='".$year."' AND r_exam='mahana'";
    echo "------------------------------------------------------".$sql;
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Generate Result pdf file</h1>

                    <!-- for alterts start -->
                    <?php include("alert.php"); ?>
                    <!-- for alterts end -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Generate result</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<div class="container">
    <div class="row">
            <div class="col-sm-3">
                <form method="post" action="generate_result.php">
                            <!-- select -->
                            <div class="form-group">
                                <label>Select Status</label>
                                <select class=" custom-select " name="sstatus">
                                <option value="active">Active</option>
                                <option value="passout">passout</option>
                                <option value="left">left</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Year</label>
                        <input type="date" name="syear" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Class</label>
                        <select class="custom-select" name="sclass">
                          <option value="hifz">hifz</option>
                          <option value="nazra">nazra</option>
                          <option value="arabic">arabic</option>
                        </select>
                      </div>
                      </div>
                      <div class="col-sm">
                      <!-- select -->
                      <div class="form-group">
                        <input type="submit" name="generate" class="form-control"  />
                        <input type="hidden" name="generateHidden" value="gen" class="form-control" />
                      </div>
                    </div>
                    </form>
    </div>
</div>
</div>

<?php
include("includes/script.php");
include("includes/footer.php");
?>