<?php
session_start();
include("Audit_API_FOL/table_names.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="bootstrap/css/callouts.css" rel="stylesheet">
    <style>
        .preloader {
            display: -webkit - flex;
            display: -ms - flexbox;
            display: flex;
            background-color: #f4f6f9;
            height: 100 vh;
            width: 100%;
            transition: height200 ms linear;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 9999;
        }

        .animation__shake {
            -webkit-animation: shake 1500 ms;
            animation: shake 1500 ms;
        }
    </style>
    <title>Misbah-ul-uloom</title>
</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="images/user_images/noimg.jpg" alt="Loading..." height="60" width="60">
    </div> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="m-2">
                <img src=" admin/assets/dist/img/AdminLTELogo.png" alt="school Logo" width="50dp" height="50dp" class="brand-image img-circle elevation-3 " style="opacity: .8">
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
                        <a class="nav-link" href="#">Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog">Blog</a>
                    </li>
                    

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search in Misbah-ul-loom">Search</button>

                </form>
                <!-- login button code for admin start -->
                <?php
                if (isset($_SESSION["auth"])) { ?>
                    <a href="admin/logout.php" class="btn btn-outline-primary m-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout As Admin">Admin Logout</a>
                    <a href="admin/" class="btn btn-outline-primary m-2 " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout As Admin">Dashboard</a>
                <?php
                } else {
                    echo ("<button type='submit' class='btn btn-outline-primary m-2'data-bs-toggle='modal' data-bs-target='#modal-info'>Login</button> ");
                }
                ?>
                <!-- login button code for admin end -->

                <?php
                if (isset($_SESSION["editor"])) { ?>
                    <a href="editor/editor_logout.php" class="btn btn-outline-primary m-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout As editor">Editor Logout</a>
                    <a href="editor" class="btn btn-outline-primary m-2 " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout As Admin">EditorBoard</a>
                <?php
                } else {
                    echo ("<button type='submit' class='btn btn-outline-success m-2'data-bs-toggle='modal' data-bs-target='#modal-editor-login'title='Search in Misbah-ul-loom'>Editor Login</button> ");
                }
                ?>




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


    <div class="container mt-2">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- insert mage here -->
                    <img src="blog/images/quran3.jpg" class="d-block w-100" alt="image">

                </div>
                <div class="carousel-item">
                    <!-- insert mage here -->
                    <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text>
                    </svg> -->
                    <img src="blog/images/quran4.jpg" class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                    <!-- insert mage here -->
                    <img src="blog/images/quran2.jpg" class="d-block w-100" alt="image">

                    <!-- <img src="..." class="d-block w-100" alt="..."> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- cards container  -->
    <div class="container mt-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- card  -->
                    <div class="card" style="width: 18rem;">
                        <img src="blog\images\books2.png" width="180" height="180" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Courses avilable</h5>
                            <p class="card-text">Courses offered by Madrasa for this year</p>
                            <a href="#" class="btn btn-primary">Browse Courses</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <!-- card  -->
                    <div class="card" style="width: 18rem;">
                        <img src="blog\images\donation.png" width="180" height="180" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Donate </h5>
                            <p class="card-text">Contribrute to our madras and be the Part of our family</p>
                            <a href="#" class="btn btn-primary">DONATE</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <!-- card  -->
                    <div class="card" style="width: 18rem;">
                        <img src="blog\images\books1.png" width="180" height="180" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Photo Gallery</h5>
                            <p class="card-text"> Take a virual toure of our madrasa</p>
                            <a href="#" class="btn btn-primary">Take Toure</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="col">
            <div class="card card-default  bs-callout bs-callout-danger">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="glyphicon glyphicon-user "></i>
                        <img src="bootstrap/icons/megaphone-fill.svg" alt="alt">
                        News And Announcements
                    </h3>
                </div>
                <?php
                include("admin/config/dbcon.php");
                $news_query = "SELECT * FROM ". _name("news")." ORDER BY n_date DESC LIMIT 3 ";
                $news_query_run = mysqli_query($con, $news_query);
                if ($news_query_run) {
                    while ($row = $news_query_run->fetch_assoc()) { ?>
                        <!-- /.Cllout Start  -->
                        <div class="card-body">
                            <div class="bs-callout bs-callout-warning">
                                <h5><?php echo ($row["n_title"]); ?></h5>
                                <p><?php echo ($row["n_body"]); ?></p>
                                <small>
                                    <?php
                                    // for designed date 
                                    $time = strtotime($row["n_date"]);
                                    $date = date('d-M-Y', $time);
                                    echo $date;
                                    ?>
                                </small>

                                <div class="container ">
                                    <small>NEWS By</small>
                                    <p class="btn btn-sm btn-primary ">
                                        <?php echo ($row["n_by"]); ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <!-- /.Callout End -->
                <?php
                    }
                }
                ?>

            </div>
            <!-- /.card -->
        </div>
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

    <!-- modal for Editor login form start -->
    <div class="modal fade" id="modal-editor-login">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Info Modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <form action="editor_login.php" method="POST">
                        <div class=" mb-3">
                            <div id="emailHelp" class="form-text">Login System For Editors.</div>
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
    <!-- modal for Editor login form end -->


</body>

<script src="bootstrap/js/bootstrap.min.js"></script>

</html>