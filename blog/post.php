<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>quranic Hub</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">QuranicHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <?php
                include("../admin/config/dbcon.php");
                $crud = $_GET['p_crud'];
                $query = "SELECT * FROM posts WHERE p_crud ='$crud' LIMIT 1";
                $query_run = mysqli_query($con, $query);
                if ($query_run->num_rows > 0) {
                    // output data of each row
                    while ($row = $query_run->fetch_assoc()) { ?>
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1"><?php echo $row["p_title"]; ?></h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Posted on <?php echo $row["p_date"]; ?> by <?php echo $row["p_by"]; ?></div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $row["p_tags"]; ?></a>

                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="images/quran1.jpg" alt="image here" width="900" height="400" /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                <p class="fs-5 mb-4"><?php echo $row["p_body"]; ?></p>
                                <h2 class="fw-bolder mb-4 mt-5">What is Quranic Hub</h2>
                                <p class="fs-5 mb-4">Quranic hub is a small endeavor to spread the teachings of Prophet Mohammad (SAW).

                                    We don't belong to or relate with any organization whatsoever. This is a small step in the way of God and goodness. We call people to do good and forbid evil by making short clips of sermons of famous scholars and educationists.</p>
                                <p class="fs-5 mb-4"> <b> Note!</b> that the opinions regarding any matter of knowledge ( Political, social etc) of some scholars we like to share don't necessarily represent our point of view.</p>
                            </section>
                        </article>
                <?php
                    }
                } else {
                    echo "No Data Found";
                }
                ?>

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Ads</div>
                    <div class="card-body">
                        <div class="row">
                            Ads go here
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Youtube</div>
                    <div class="card-body"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/x1LWziMHlqc" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">
                Quranic Hub

                In the name of ALLAH who is most merciful. The quranic hub is my Small Step to Perform my duties which Allah SWT gave to me at AALAM ARWAH(World of souls). If I ever Upload the wrong Content which Cuts or disrespects Islam Please inform me immediately . I will be much glad to know.
            </p>
            <br>
            <p class="m-0 text-center text-white">Copyright &copy; QuranicHub 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>