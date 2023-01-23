<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");


?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/user_images/noimg.jpg" alt="Loading..." height="60" width="60">
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- for alterts start -->
    <?php include("alert.php"); ?>
    <!-- for alterts end -->
    <!-- Info boxes -->


    <!-- /.row -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= __('Mohtamim Dashboard')?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= __('Home')?></a></li>
                        <li class="breadcrumb-item active"><?= __('Dashboard')?></li>
                        
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- Total Students start -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <!-- Total Students box -->
                        <?php
                        $query = "SELECT * FROM "._name('students');
                        $query_run = mysqli_query($con, $query);
                        if ($query_run) {

                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text"><?= __('Total Students')?></span>
                            <span class="info-box-number">
                                <?php echo (mysqli_num_rows($query_run));   ?>
                            </span>
                            <?php
                        } else {
                            echo ("No Data Found");
                        } ?>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Total Students end -->
                <!-- /.col -->

                <!-- active Students start -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                        <?php
                        $query = "SELECT COUNT(*) FROM "._name('students')." WHERE t_status='active'";
                        $query_run_active = mysqli_query($con, $query);
                        if ($query_run_active) {
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text"><?= __('Active Students')?></span>
                            <span class="info-box-number"><?php echo (mysqli_num_rows($query_run_active));   ?></span>
                            <?php
                        } else {
                            echo ("No Data Found");
                        } ?>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- active Students end -->
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- Hifz Students start -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <?php
                        $query = "SELECT COUNT(*) FROM students WHERE t_class='hifz'";
                        $query_run_active = mysqli_query($con, $query);
                        if ($query_run_active) {
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text"><?= __('Hifiz Class')?></span>
                            <span class="info-box-number"><?php echo (mysqli_num_rows($query_run_active));   ?></span>
                            <?php
                        } else {
                            echo ("No Data Found");
                        } ?>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Hifz Students end -->
                <!-- /.col -->

                <!-- Nazrah Students start -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <?php
                        $query = "SELECT COUNT(*)  FROM "._name('students')." WHERE t_class='nazirah'";
                        $query_run_active = mysqli_query($con, $query);
                        if ($query_run_active) {
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text"><?= __('Nazrah Class')?></span>
                            <span class="info-box-number"><?php echo (mysqli_num_rows($query_run_active)); ?></span>
                            <?php
                        } else {
                            echo ("No Data Found");
                        } ?>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- Nazrah Students end -->
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- //test goes here ----------------------------------------------------------------------------------- -->
    <section class="col-lg connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    <?= __('Credit')?>
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab"><?= __('Area')?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sales-chart" data-toggle="tab"><?= __('Donut')?></a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                        <canvas id="areaChart" height="300" style="height: 300px;"></canvas>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>


    
<?php
    // <section class="content">
    //     <div class="container-fluid">
    //         <div class="row">
    //             <div class="col">
    //                 <!-- AREA CHART -->
    //                 <div class="card card-primary">
    //                     <div class="card-header">
    //                         <h3 class="card-title">Expendeature</h3>
    //                         <div class="card-tools">
    //                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
    //                                 <i class="fas fa-minus"></i>
    //                             </button>
    //                             <button type="button" class="btn btn-tool" data-card-widget="remove">
    //                                 <i class="fas fa-times"></i>
    //                             </button>
    //                         </div><!-- /.card tool -->
    //                     </div><!-- /.card-header -->
    //                     <div class="card-body">
    //                         <div class="chart">
    //                             <canvas id="areaChart"
    //                                 style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    //                         </div>
    //                     </div><!-- /.card-body -->

    //                 </div><!-- /.card -->


    //             </div> <!-- /.colmd6 -->
    //         </div><!-- /.row -->
    //     </div><!-- /.container-fluid -->
    // </section>

    ?>









</div>

<?php
include("includes/script.php");
include("includes/indexScript.php");
include("includes/footer.php");

?>