<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
?>
<script src="assets/plugins/jquery-form/jquery.form.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Student</h1>

                    <!-- for alterts start -->
                    <?php include("alert.php"); ?>
                    <!-- for alterts end -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Student</li>
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
                <h3 class="card-title">Add student</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="add_student_code.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="addno">Admission Number</label>
                        <p>
                        <?php
                        include("config/dbcon.php");
                        $query =  "SELECT t_admission_no FROM students ORDER BY t_admission_no DESC LIMIT 1";
                        $query_run = mysqli_query($con, $query);
                        $data =  mysqli_fetch_row($query_run)[0];

                        if($data ){
                            echo "Last Students admission number was <b>". $data  ."</b>" ;
                        } else echo "No admission No found";

                        
                                ?>

                        <!-- SELECT * FROM students ORDER BY t_admission_no DESC LIMIT 1 -->
                        </p>
                        <input required type="text" name="addno" class="form-control" placeholder="Admission Number">
                    </div>
                    <div class="form-group">
                        <label for="formno">Form number</label>
                        <input required type="text" name="formno" class="form-control" placeholder="Form number">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="parantage">Parantage</label>
                        <input required type="text" name="parantage" class="form-control" placeholder="Parantage">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input required type="address" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="aadharno">Aadhar number</label>
                        <input required type="text" name="aadharno" class="form-control" placeholder="Enter Aadhar number">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input required type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="doa">Date of Admission</label>
                        <input required type="date" name="doa" class="form-control" placeholder="Date of Admission">
                    </div>
                    <div class="form-group">
                        <label for="phno">Phone Number</label>
                        <input required type="text" name="phno" class="form-control" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-control" name="class">
                            <option>hifz</option>
                            <option>nazirah</option>
                            <option>other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option>active</option>
                            <option>passout</option>
                            <option>left</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_photo">Photo of Student</label>

                        <input type="file" accept=".jpg, .png, .jpeg" name="image" class=" form-control" id="student_photo">

                        <p class="text-danger">only JPG,PNG and JPEG files are allowed</p>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div id="showimage" style="display: none;">

                        <!-- <img src="images/student_images/noimg.jpg" alt=" img here" width="70dp" height="70dp"> -->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="addstudent" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>


</div>
<!-- <script>
    $(document).ready(function() {
                $('#Student-form').submit(function(event) {
                    if ($('#exampleInputFile').val()) {
                        event.preventDefault();
                        $('#showimage').hide();
                        $(this).ajaxSubmit({
                            target: 'showimage',
                            beforeSubmit: function() {
                                $('.progress-bar').width('0%');
                            },
                            uploadprogress: function(event, position, total, percentageComplete) {
                                $('progress-bar').animate({
                                    width: percentageComplete + '%'
                                }, {
                                    duration: 1000
                                });
                            },
                            success: function() {
                                $('#showimage').show();
                            },
                            resetFom: true
                        });
                    }
                    return false;

                });
            }
</script> -->
<?php
include("includes/script.php");
include("includes/footer.php");
?>