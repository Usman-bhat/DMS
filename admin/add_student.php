<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
include("../Audit_API_FOL/table_names.php");
?>
<script src="assets/plugins/jquery-form/jquery.form.js"></script>
<style>
    @font-face {
    font-family: jameelnoori;
    src: url('../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    .ur_text{
        font-family: 'jameelnoori';
        font-size: large;
        /* font-family: 'Courier New', Courier, monospace; */
    }

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                    <h1 class="m-0">Add Student  | <b class="ur_text">درج طالب علم</b> </h1>

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
                <h3 class="card-title">Add student | <b class="ur_text">درج طالب علم</b></h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="add_student_code.php" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- row for admission and from numbers START -->
                <div class="row">
                    <div class="col">
                            <div class="form-group">
                                <label for="addno">Admission Number |<span class="ur_text"> داخلہ نمبر </span></label>
                                <p>
                                <?php
                                include("config/dbcon.php");
                                $query =  "SELECT t_admission_no FROM "._name("students")." ORDER BY t_admission_no DESC LIMIT 1";
                                $query_run = mysqli_query($con, $query);
                                $data =  mysqli_fetch_row($query_run);
                                // print_r($data);

                                if($data ){
                                    echo "Last Adm no. was <b>". $data[0]."</b>" ;
                                } else echo "No admission No found";

                                
                                        ?>

                                <!-- SELECT * FROM students ORDER BY t_admission_no DESC LIMIT 1 -->
                                </p>
                                <input required type="text" name="addno" class="form-control" placeholder="Admission Number">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formno">Form number | <span class="ur_text">  فارم نمبر</span></label>
                                <p>.</p>
                                <input required type="text" name="formno" class="form-control" placeholder="Form number">
                            </div>
                        </div>
                </div>
                    <!-- row for admission and from numbers END -->


                    <!-- Name urdu English START -->
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input required type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="name_ur" class="ur_text">نام اردو میں</label>
                                <input required type="text" name="name_ur" class="form-control ur_text" placeholder="نام">
                            </div>
                        </div>
                    </div>
                    <!-- Name urdu English END -->

                    <!-- ُ Parentage ROW START  -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="parantage">Parantage</label>
                                <input required type="text" name="parantage" class="form-control" placeholder="Parantage">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="parantage" class="ur_text">ولدیت</label>
                                <input required type="text" name="parantage_ur" class="form-control ur_text" placeholder="ولدیت">
                            </div>
                        </div>
                    </div>
                    <!-- ُ Parentage ROW END  -->



                    <!-- ُ Address ROW START  -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input required type="address" name="address" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="address" class="ur_text">مکمل پتہ</label>
                                <input required type="address" name="address_ur" class="form-control ur_text" placeholder="پتہ">
                            </div>
                        </div>
                    </div>
                    <!-- ُ Address ROW END  -->

                    
                    <!-- Date of amission and Date of birth START  -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="dob">Date of Birth | <span class="ur_text">یوم پیدائش</span></label>
                                <input required type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="doa">Date of Admission | <span class="ur_text">یوم دخلہ</span></label>
                                <input required type="date" name="doa" class="form-control" placeholder="Date of Admission">
                            </div>
                        </div>
                    </div>
                    <!-- Date of amission and Date of birth END  -->


                    <!-- Phone number and Aadhar number row START  -->
                    <div class="row">
                        <div class="col">
                    
                        <div class="form-group">
                            <label for="phno">Phone Number  | <span class="ur_text">فون نمبر</span></label>
                            <input required type="text" name="phno" class="form-control" placeholder="Phone number">
                        </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="aadharno">Aadhar number  | <span class="ur_text">آدھار نمبر</span></label>
                                <input required type="text" name="aadharno" class="form-control" placeholder="Aadhar number">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="pincode">Pin Code  | <span class="ur_text">پن کوڈ</span></label>
                                <input required type="number" name="pincode" class="form-control" placeholder="Pin Code">
                            </div>
                        </div>
                    </div>

                    <!-- Phone number and Aadhar number row END  -->
                    
                    <!-- Prev Study Detail  row START  -->
                    <div class="row">
                        <div class="col">
                    
                        <div class="form-group">
                            <label for="prev_study_place"> Previoud School</label>
                            <input required type="text" name="prev_study_place" class="form-control" placeholder="Previoud School">
                        </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="prev_study_place_ur" class="ur_text">سابقہ تعلیم  مدرسہ</label>
                                <input required type="text" name="prev_study_place_ur" class="form-control ur_text" placeholder="سابقہ تعلیم  مدرسہ">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="ur_text">سابقہ تعلیم </label>
                                <select class="form-control ur_text" name="prev_class">
                                    <option value="start">ابتدا</option>
                                    <option value="hifz">حفظ</option>
                                    <option value="nazirah">ناظرہ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Prev Study Detail row END  -->



        <!-- Status Class Photo Row START  -->
        <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-control ur_text" name="class">
                            <option value="hifz">hifz | حفظ </option>
                            <option value="nazirah ">nazirah | ناظرہ </option>
                            <option value="other">other | اور کوئی </option>
                        </select>
                    </div>
                </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option >active</option>
                                <option>passout</option>
                                <option>left</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="col"> -->
                        <div class="form-group">
                            <label for="student_photo">Photo of Student</label>

                            <input type="file" accept=".jpg, .png, .jpeg" name="image" class=" form-control" id="student_photo">

                            <p class="text-danger">only JPG,PNG and JPEG files are allowed</p>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    <!-- </div> -->
        <!-- </div> -->
        <!-- Status Class Photo Row END  -->

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