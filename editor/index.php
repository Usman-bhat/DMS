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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/jquery/jquery.js"></script>
    <title>Misbah-ul-uloom</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="m-2">
                <img src="../admin/assets/dist/img/AdminLTELogo.png" alt="school Logo" width="50dp" height="50dp" class="brand-image img-circle elevation-3 " style="opacity: .8">
            </div>
            <a class="navbar-brand " href="#">misbah-ul-uloom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Main site</a>
                    </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control  me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search in Misbah-ul-loom">Search</button>
                </form>
                <a href="editor_logout.php">
                    <button class="btn btn-danger m-2" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="LogOut From Editor Dashboard">logout</button>
                </a>




            </div>
        </div>
    </nav>
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


    <div class="contaner m-5">
        <h3>Editor</h3>
        <p>Your All posts</p>
        <a href="add_post.php" class="btn btn-primary float-right">Add Post</a>
    </div>
    <div class="container m-5">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Post id</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Post By</th>
                    <th scope="col">category</th>
                    <th scope="col">action </th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../admin/config/dbcon.php");
                $editor = $_SESSION['editor'];
                $query = "SELECT * FROM post WHERE p_by = '$editor' ORDER BY p_category ASC";
                $query_run = mysqli_query($con, $query);
                if ($query_run->num_rows > 0) {
                    // output data of each row
                    while ($row = $query_run->fetch_assoc()) { ?>
                        <tr>

                            <th scope="row"><?php echo $row["p_id"]; ?></th>
                            <td><?php echo $row["p_title"]; ?></td>
                            <td><?php echo $row["p_by"]; ?></td>
                            <td><?php echo $row["p_category"]; ?></td>
                            <td><a href="edit_post.php?post_id=<?php echo $row["p_id"]; ?>" class="btn btn-primary">Edit </a></td>

                            <td>
                                <button type="button" value="<?php echo $row["p_id"]; ?>" class="btn btn-sm btn-danger delete_btn">
                                    <i class="fas fa-trash"></i> delete
                                </button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "No Data Found";
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- modal for login form start -->
    <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Info Modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class=" mb-3">
                            <div id="emailHelp" class="form-text">Only Admins Can Login from Here.</div>
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" required name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- modal for login form end -->


    <!-- Model for delete student -->
    <div class="modal fade" id="del_post_model">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Student</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="delete_post.php">
                    <div class="modal-body">
                        <p>Do you Really Want to delete this Post???</p>
                    </div>
                    <input type="hidden" name="delete_id" class="del_post_id">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">No</button>
                        <button type="submit" name="delete_post_btn" class="btn btn-outline-light">Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>





    <script>
        $(document).ready(function() {
            $(".delete_btn").click(function(e) {
                e.preventDefault();

                var post_id = $(this).val();
                // console.log(post_id);
                $(".del_post_id").val(post_id);
                $("#del_post_model").modal("show");
            });
        });
    </script>

</body>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</html>