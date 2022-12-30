<?php
include("editor_auth.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../bootstrap/css/callouts.css" rel="stylesheet">

    <title>Misbah-ul-uloom</title>
</head>

<body>
    <?php

    if (isset($_SESSION['status'])) {
        if ($_SESSION['query_success'] == true) {
            echo ("<div class='alert alert-success alert-dismissible fade show'>");
        } else {
            echo ('<div class="alert alert-danger alert-dismissible fade show">');
        }
    ?>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <?php echo ($_SESSION['status'] . "</div>");
        unset($_SESSION['status']);
        unset($_SESSION['student_add_success']);
    } ?>
    <div class="contaier m-2">
        <a href="index.php" class="btn btn-primary">Home</a>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Add New Post </h3>
            </div>
            <form action="editor_code.php" method="POST">
                <div class="card-body">
                    <label for="title">Name</label>
                    <input class="form-control" required name="title" type="text" placeholder="Add Title ">
                    <br>
                    <label for="tags">Tags</label>
                    <input class="form-control" required name="tags" type="text" placeholder="Add tags ">
                    <br>
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        <option value="quran">Quran</option>
                        <option value="hadees">hadees</option>
                        <option value="other">Other</option>
                    </select>
                    <br>
                    <label for="body">Body</label>
                    <textarea class="form-control" required name="body" type="text" placeholder="Add Body" cols="50%" rows="4"></textarea>
                    <br>
                    <button class="btn btn-primary" name="add_post" type="submit">Add</button>
                    <a href="index.php" class="btn btn-danger float-right" name="addnews">Cancle</a>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="../bootstrap/js/bootstrap.min.js"></script>

</html>