<?php
include("editor_auth.php");
include("../admin/config/dbcon.php");


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

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Update Post </h3>
            </div>
            <?php
            $post_id = $_GET['post_id'];
            $arr = array("/","'",";","-","/*","SELECT","UNION",")");
            if(0< count(array_intersect(explode(' ',strtolower($_GET['post_id'])),$arr))){?>
                <a class="btn btn-success m-5" href="index.php">Home </a>
                <div class="alert alert-info  m-3">
                    <h5><i class="icon fas fa-info"></i> Alert!</h5>
                <?php
                echo ("<h1> Wrong Id</h1>");
                echo ("<p>No data found</>");
                echo "</div>";
            }else{
            $query = "SELECT * FROM posts WHERE p_id = '$post_id' LIMIT 1";
            $query_run = mysqli_query($con, $query);
            if ($query_run->num_rows > 0) {
                // output data of each row
                while ($row = $query_run->fetch_assoc()) {
                    $post_by = $row["p_by"];
                    $editor = $_SESSION['editor'];
                    if (!strcmp($post_by, $editor) == 0) {
                        $_SESSION["query_success"] = false;
                        $_SESSION['status'] = "Falied !!!    <b> This POst Is No Yours</b>";
                        header("LOCATION: index.php");
                        die();
                    }
            ?>
                    <form action="editor_code.php" method="POST">
                        <div class="card-body">
                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                            <label for="utitle">Name</label>
                            <input class="form-control" required name="utitle" type="text" value="<?php echo $row["p_title"]; ?>">
                            <br>
                            <label for="utags">Tags</label>
                            <input class="form-control" required name="utags" type="text" value="<?php echo $row["p_tags"]; ?>">
                            <br>
                            <label for="ucategory">Category</label>
                            <select class="form-control" name="ucategory">
                                <option value="<?php echo $row["p_category"]; ?>"><?php echo $row["p_title"]; ?></option>
                                <option value="quran">Quran</option>
                                <option value="hadees">hadees</option>
                                <option value="other">Other</option>
                            </select>
                            <br>
                            <label for="ubody">Body</label>
                            <textarea class="form-control" required name="ubody" type="text" cols="50%" rows="4"><?php echo $row["p_body"]; ?></textarea>
                            <br>
                            <button class="btn btn-primary" name="edit_post" type="submit">Update</button>
                            <a href="index.php" class="btn btn-danger float-right">cancel</a>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo "No Data Found";
            }
        }
            ?>
        </div>
    </div>
</body>

<script src="../bootstrap/js/bootstrap.min.js"></script>

</html>