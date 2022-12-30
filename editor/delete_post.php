<?php
require("editor_auth.php");

include("../admin/config/dbcon.php");


if (isset($_POST['delete_post_btn'])) {

    $pid = mysqli_real_escape_string($con,  $_POST['delete_id']);
    $del_query = "DELETE FROM posts WHERE p_id = '$pid'";
    $stuent_query_run = mysqli_query($con, $del_query);
    if ($stuent_query_run) {
        $_SESSION["query_success"] = true;
        $_SESSION['status'] = "Post deleted Successfully";
        header("LOCATION: index.php");
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Post deletion Falied";
        header("LOCATION: index.php");
    }
}
