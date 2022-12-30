<?php
include("config/dbcon.php");
session_start();
if (isset($_POST['addnews'])) {
    $title =mysqli_real_escape_string($con, $_POST['title']);
    $body = mysqli_real_escape_string($_POST['body']);
    $news_by = $_SESSION['user'];

    $news_query = "INSERT INTO news(n_title,n_body,n_by) VALUES ('$title','$body','$news_by')";
    $news_query_run = mysqli_query($con, $news_query);
    if ($news_query_run) {
        $_SESSION["query_success"] = true;
        $_SESSION['status'] = "<b>NEWS</b>   Aded Successfuly";
        header("LOCATION: add_news.php");
        die();
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Sorry !!! <b> News Not Added</b>";
        header("LOCATION: add_news.php");
        die();
    }
}


// for deleting news 
if (isset($_POST['del_news'])) {
    $news_id = mysqli_real_escape_string($con,$_POST['news_id']);
    $del_news_query = "DELETE FROM news WHERE n_id = '$news_id'";
    $del_news_query_run = mysqli_query($con, $del_news_query);
    if ($del_news_query_run) {
        $_SESSION["query_success"] = true;
        $_SESSION['status'] = "<b>NEWS</b>   deleted  Successfuly";
        header("LOCATION: show_news.php");
        die();
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Sorry !!! <b> News Not Deleted</b>";
        header("LOCATION: show_news.php");
        die();
    }
}
