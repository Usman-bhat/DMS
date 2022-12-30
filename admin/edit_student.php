<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
include("config/dbcon.php");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Student</h1>

                    <!-- for alterts start -->
                    <?php include("alert.php"); ?>
                    <!-- for alterts end -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- regestration form -->
    <div class="container">

        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit student</h3>
                <?php
                $student_id = $_GET['sid'];
                $arr = array("/","'",";","-","/*","SELECT","UNION",")");
if(0< count(array_intersect(explode(' ',strtolower($_GET['sid'])),$arr))){?>
    <a class="btn btn-success m-5" href="index.php">Home </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
    <?php
    echo ("<h1> Wrong Id</h1>");
    echo ("<p>No data found</>");
    echo "</div>";
}else{
                $query = "SELECT * FROM students WHERE t_admission_no=$student_id LIMIT 1";
                $query_run = mysqli_query($con, $query);
                if ($query_run->num_rows > 0) {
                    // output data of each row
                    while ($row = $query_run->fetch_assoc()) {

                ?>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="edit_student_code.php">
                <div class="card-body">

                    <input type="hidden" value="<?php echo $row["t_admission_no"]; ?>" name="addno" class="form-control" placeholder="Admission Number">

                    <div class="form-group">
                        <label for="formno">Form number</label>
                        <input type="text" value="<?php echo $row["t_form_no"]; ?>" name="formno" class="form-control" placeholder="Form number">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?php echo $row["t_name"]; ?>" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="parantage">Parantage</label>
                        <input type="text" value="<?php echo $row["t_parentage"]; ?>" name="parantage" class="form-control" placeholder="Parantage">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="address" value="<?php echo $row["t_address"]; ?>" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="aadharno">Aadhar number</label>
                        <input type="text" value="<?php echo $row["t_aadhar"]; ?>" name="aadharno" class="form-control" placeholder="Enter Aadhar number">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" value="<?php echo $row["t_dob"]; ?>" name="dob" class="form-control" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="doa">Date of Admission</label>
                        <input type="date" value="<?php echo $row["t_admission_date"]; ?>" name="doa" class="form-control" placeholder="Date of Admission">
                    </div>
                    <div class="form-group">
                        <label for="phno">Phone Number</label>
                        <input type="text" value="<?php echo $row["t_phone_number"]; ?>" name="phno" class="form-control" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-control" name="class">
                            <option><?php echo $row["t_class"]; ?></option>
                            <option>hifz</option>
                            <option>nazirah</option>
                            <option>other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option><?php echo $row["t_status"]; ?></option>
                            <option>active</option>
                            <option>passout</option>
                            <option>left</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_photo">Photo of Student</label>

                        <input type="file" accept=".jpg, .png, .jpeg" name="image" class=" form-control">
                        <input type="hidden" accept=".jpg, .png, .jpeg" name="old_image" value="<?php echo $row["t_photo"]; ?>">

                        <p class="text-danger">only JPG,PNG and JPEG files are allowed</p>
                    </div>

                    <div id="showimage">

                        <img src="images/student_images/<?php echo $row["t_photo"]; ?>" alt=" img here" width="70dp" height="70dp">
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="update_student" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
    <!-- /.card -->
</div>

<?php
                      }
                } else {
                    $_SESSION["query_success"] = false;
                    $_SESSION['status'] = "Warning !!!    <b> no student Found</b>";
                    die();
                }}
?>
<?php
include("includes/footer.php");
include("includes/script.php");

?>