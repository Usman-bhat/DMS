<?php
require("auth.php");
require("../lang.php");

include("includes/header.php");
include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");
?>
<style>
    @font-face {
    font-family: jameelnoori;
    src: url('../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    .ur_text{
        font-family: 'jameelnoori';
        font-size: larger;
        /* font-family: 'Courier New', Courier, monospace; */
    }

</style>
 <!-- Content Header (Page header) -->
 <div class="container ">
 <div class="content-header border m-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= __('Student Details')?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php"><?= __('Home')?></a></li>
                        <li class="breadcrumb-item active"><?= __('Dashboard')?></li>
                        
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
 </div>
    <!-- /.content-header -->

<?php

$student_id = mysqli_real_escape_string($con, $_GET['sid']);
$arr = array("/","'",";","SELECT","UNION",")");
if(0< count(array_intersect(explode(' ',strtolower($_GET['sid'])),$arr))){?>
    <a class="btn btn-success m-5" href="index.php">Home </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
    <?php
    echo ("<h1> ".__('Wrong Id')."</h1>");
    echo ("<p>".__('No Data Found')."</>");
    echo "</div>";
}else{
$query = "SELECT * FROM "._name('students')." WHERE t_admission_no='$student_id' LIMIT 1";
$query_run = mysqli_query($con, $query);
if ($query_run->num_rows > 0) {
    // output data of each row
    while ($row = $query_run->fetch_assoc()) {

?>

        <!-- Profile Image -->
        <div class="container">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="images/student_images/<?php echo $row["t_photo"]; ?>" alt="Student Profile Picture">
                    </div>

                    <h3 class="profile-username text-center ur_text"><?php echo $row["t_name_ur"]; ?></h3>

                    <p class="text-muted text-center"><?= __('Student Details')?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <div class="row">
                            <div class="col">
                            <li class="list-group-item">
                                    <b><?= __('Name')?></b>
                                    <b class="float-right pr-5 text-success"><?php echo $row["t_name"]; ?></b>
                                </li>
                            </div>
                            <div class="col">
                            <li class="list-group-item">
                                    <b class="ur_text"><?= __('Name Urdu')?></b>
                                    <b class="float-right pr-5 text-success ur_text"><?php echo $row["t_name_ur"]; ?></b>
                                </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <li class="list-group-item">
                                    <b><?= __('Admission Number')?></b>
                                    <b class="float-right pr-5 text-success"><?php echo $row["t_admission_no"]; ?></b>
                                </li>
                            </div>
                            <div class="col">
                                <li class="list-group-item">
                                    <b><?= __('Form Number')?></b>
                                    <b class="float-right pr-5 text-success"><?php echo $row["t_form_no"]; ?></b>
                                    </li>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <li class="list-group-item">
                                <b><?= __('Admission Date')?> </b>
                                <b class="float-right pr-5 text-success"><?php echo $row["t_admission_date"]; ?></b>
                                </li>
                            </div>
                            <div class="col">
                                <li class="list-group-item">
                                <b> <?= __('Date Of Birth')?></b>
                                <b class="float-right pr-5 text-success"><?php echo $row["t_dob"]; ?></b>
                                    </li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <li class="list-group-item">
                                <b><?= __('Parentage')?></b>
                                <b class="float-right pr-5 text-success"><?php echo $row["t_parentage"]; ?></b>
                                </li>
                            </div>
                            <div class="col">
                                <li class="list-group-item">
                                <b class="ur_text"><?= __('Parentage Urdu')?> </b>
                                <b class="float-right pr-5 text-success ur_text"><?php echo $row["t_parentage_ur"]; ?></b>
                                </li>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <li class="list-group-item">
                                <b><?= __('Address')?> </b>
                                <b class="float-right pr-5 text-success"><?php echo $row["t_address"]; ?></b>
                                </li>
                            </div>
                            <div class="col">
                                <li class="list-group-item">
                                <b class="ur_text"><?= __('Address Urdu')?> </b>
                                <b class="float-right pr-5 text-success ur_text"><?php echo $row["t_address_ur"]; ?></b>
                                </li>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                            <li class="list-group-item">
                            <b> <?= __('Aadhar Number')?></b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_aadhar"]; ?></b>
                        </li>
                            </div>
                            <div class="col">
                            <li class="list-group-item">
                            <b><?= __('Phone Number')?> </b>
                            <b class="float-right pr-5 text-success "><?php echo $row["t_phone_number"]; ?></b>
                        </li>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                            <li class="list-group-item">
                            <b> <?= __('Class')?></b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_class"]; ?></b>
                        </li>
                            </div>
                        </div>

                    </ul>
                    <button onclick="print_student()" rel="noopener" target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> <?= __('Print')?> </button>
                    <a href="generateIdCard.php?sid=<?php echo $row["t_admission_no"]; ?>"   class="btn btn-primary btn-block"><i class="fas fa-id-card"></i> <?= __('Generate IDCard')?> </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
    <?php
    }
} else { ?>
    <a class="btn btn-success m-5" href="index.php"><?= __('Home')?> </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> <?= __('Alert')?></h5>
    <?php
    echo ('<h1> No Data Found<span class="ur_text h"> ......کوئی ڈیٹا نہیں ملا </span></h1>');
    echo ("<p> no data found with this id please ty another one.</p>");
    echo ('<p class="ur_text"> اس آئی ڈی کے ساتھ کوئی ڈیٹا نہیں ملا، براہ کرم کوئی اور آئی ڈی  ٹائپ کریں۔ </p>');
    echo "</div>";
}} ?>

    <script>
        function print_student() {
            window.addEventListener("load", window.print());
        }
    </script>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>