<?php
require("auth.php");
require"../lang.php";
include("includes/header.php");
include("includes/topbar.php");
include("./config/dbcon.php");
include("../Audit_API_FOL/table_names.php");

if (isset($_GET['admin_id'])) {
    $arr = array("/","'",";","SELECT","UNION",")");
if(0< count(array_intersect(explode(' ',strtolower($_GET['admin_id'])),$arr))){
    // include('logout.php');
    echo'<h3 class="profile-username text-center">Wrong id</h3>';
}
    $admin1 = stripcslashes($_GET['admin_id']);
    $admin_id = mysqli_real_escape_string($con,$admin1);

    $query = "SELECT * FROM "._name('users')." WHERE u_id = '$admin_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        foreach ($query_run as $row) { ?>

            <div class="container mt-5">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="images/user_images/<?php echo $row["u_photo"]; ?>" alt="Student Profile Picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo $row["u_name"]; ?></h3>

                        <p class="text-muted text-center">Admin Details</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><?= __('Name')?></b>
                                <b class="float-right pr-5 text-success"><?php echo $row["u_name"]; ?></b>
                            </li>
                            <li class="list-group-item">
                                <b><?= __('Role')?></b>
                                <b class="float-right pr-5 text-success"><?php echo $row["u_role"]; ?></b>
                            </li>
                            <li class="list-group-item">
                                <b><?= __('Email')?> </b>
                                <b class="float-right pr-5 text-success"><?php echo $row["u_email"]; ?></b>
                            </li>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>




<?php
        }
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "<b> Unknown Error Occured</b>";
        header("LOCATION: index.php");
        die();
    }
} else {
    $_SESSION["query_success"] = false;
    $_SESSION['status'] = " 1st if<b> Unknown Error Occured</b>";
    header("LOCATION: index.php");
    die();
}
include("includes/script.php");
include("includes/footer.php");
?>