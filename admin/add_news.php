<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");

?>
<div class="content-wrapper">

    <?php include("alert.php"); ?>
    <div class="contaier m-2">

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Add NEWS or Announcement</h3>
            </div>
            <form action="add_news_code.php" method="POST">
                <div class="card-body">
                    <input class="form-control" required name="title" type="text" placeholder="Add Title ">
                    <br>
                    <input class="form-control  form-control-lg" required name="body" type="text" placeholder="Add Body">
                    <br>
                    <button class="btn btn-primary" name="addnews" type="submit">Add</button>
                    <a href="show_news.php" class="btn btn-primary float-right" name="addnews">Show NEWS</a>
                </div>
            </form>
        </div>

        <?php
        include("includes/footer.php");
        include("includes/script.php");

        ?>