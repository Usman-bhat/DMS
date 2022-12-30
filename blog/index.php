<?php
session_start();
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

    <title>Misbah-ul-uloom blog</title>
</head>

<body>
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
                        <a class="nav-link" href="#">gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Main Site</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search in Misbah-ul-loom">Search</button>

                </form>
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
                    <img src="images/quran3.jpg" class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                    <!-- insert mage here -->
                    <img src="images/quran2.jpg" class="d-block w-100" alt="image">
                    <!-- <img src="..." class="d-block w-100" alt="..."> -->
                </div>
                <div class="carousel-item">
                    <!-- insert mage here -->
                    <img src="images/quran1.jpg" class="d-block w-100" alt="image">
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

    <!-- post list  -->
    <div class="container m-5 ">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container bootstrap snippets bootdey">
            <div class="row" id="loadData">

                <!-- show data in this div  -->

            </div>

        </div>

    </div>
    <style>
        .post-list {
            position: relative;
        }

        .post-list .picture {
            max-width: 400px;
            overflow: hidden;
            height: auto;
            border-radius: 6px;
        }

        .post-list .label {
            font-weight: normal;
        }

        .post-list .picture {
            max-width: 210px;
        }

        .post-list .picture img {
            width: 100%;
        }

        .post-list h4 {
            font-size: 20px;
        }

        .post-list h5 {
            color: #888;
        }

        .post-list p {
            float: left;
        }

        .post-list:after {
            height: 1px;
            background: #EEEEEE;
            width: 83.3333%;
            bottom: 0;
            right: 0;
            content: "";
            display: block;
            position: absolute;
        }

        .post-list .btn-download {
            margin-top: 45px;
        }

        .btn-info {
            color: #1084FF;
            border-color: #269abc;
        }

        .btn-round {
            border-width: 1px;
            border-radius: 30px !important;
            opacity: 0.79;
            padding: 9px 18px;
        }

        .btn {
            border-width: 2px;
            background-color: rgba(0, 0, 0, 0);
            font-weight: 400;
            opacity: 0.8;
            padding: 7px 16px;
        }

        button:disabled,
        button[disabled] {
            background-color: #a9a9a9;
            border: 3px solid #FF0000;
            color: #a9a9a9;

        }
    </style>

</body>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/jquery/jquery.js"></script>

<script>
    $(document).ready(function() {
        function loadpost(page) {
            $.ajax({
                url: "post_code.php",
                type: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    if (data) {
                        $("#load_btn_class").remove();
                        $("#loadData").append(data);
                    } else {
                        $("#load_more_btn").html("Finished");
                        $("#load_more_btn").prop("disabled", true);
                    }

                }
            });
        }
        loadpost();
        $(document).on("click", "#load_more_btn", function() {
            $("#load_more_btn").html("Loading...");
            var pid = $(this).data("id");
            loadpost(pid);
        });

    });
</script>

</html>