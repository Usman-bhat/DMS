<?php
include("editor_auth.php");
include("../admin/config/dbcon.php");


// add post code start 
if (isset($_POST['add_post'])) {

    // $title1 = mysqli_real_escape_string($con,$_POST['title']);
    $title =mysqli_real_escape_string($con, $_POST['title']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $cat = mysqli_real_escape_string($con, $_POST['category']);
    $body =mysqli_real_escape_string($con,  $_POST['body']);
    $by = $_SESSION['editor'];

    $query = "INSERT INTO post(p_title,p_body,p_by,p_category,p_tags) VALUES 
    ('$title','$body','$by','$cat','$tags')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION["query_success"] = True;
        $_SESSION['status'] = "Done !!!    <b> Post Added</b> ";
        header("LOCATION: add_post.php");
        die();
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Falied !!!    <b> Post Not Added</b>";
        header("LOCATION: add_post.php");
        die();
    }

    echo $title;
}
// add post code end 




// edit post code start 
if (isset($_POST['edit_post'])) {


    $post_id = mysqli_real_escape_string($con, $_POST['post_id']);
    $title = mysqli_real_escape_string($con, $_POST['utitle']);
    $tags = mysqli_real_escape_string($con, $_POST['utags']);
    $cat = mysqli_real_escape_string($con, $_POST['ucategory']);
    $body = mysqli_real_escape_string($con, $_POST['ubody']);

    $query = "UPDATE post SET p_title='$title',p_body='$body',p_category='$cat',p_tags='$tags' WHERE p_id='$post_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION["query_success"] = True;


        $_SESSION['status'] = "Done !!!    <b> Post Updated</b> <a href='../blog/post.php?p_crud=' class='btn btn-success'>View Post</a>";

        header("LOCATION: index.php");
        die();
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Falied !!!    <b> Post Not Updated</b>";
        header("LOCATION: ainex.php");
        die();
    }

    echo $title;
}

// edit post code end 
