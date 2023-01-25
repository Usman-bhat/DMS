<?php
    require("./auth.php");
require("../lang.php");
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <?php

    include("./config/dbcon.php");
    if (isset($_SESSION["user"])) {
        $email = $_SESSION["user"];
        $query = "SELECT * FROM users WHERE u_email = '$email' LIMIT 1";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            foreach ($query_run as $row) { ?>

                <a href="index3.html" class="brand-link">
                    <img src=" ./images/other_images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><?php echo ($row['u_role']); ?></span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src=" <?php echo ("./images/user_images/" . $row['u_photo']); ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="admin_info.php?admin_id=<?php echo ($row['u_id']); ?>" class="d-block"><?php echo ($row['u_name']); ?></a>
                            <a href="" class="d-block"><?php echo ($row['u_email']); ?></a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="<?= __('Search')?>" aria-label="<?= __('Search')?>">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                            <li class="nav-item">
                                <a href="index.php" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        <?= __('Dashboard')?>
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item menu-open">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        <?= __('Students')?>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="Students.php" class="nav-link">
                                            <i class="fas fa-users nav-icon"></i>
                                            <p><?= __('Show Students')?></p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="add_student.php" class="nav-link">
                                            <i class="far fa-user nav-icon"></i>
                                            <p><?= __('Add Students')?></p>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            
                            <li class="nav-item menu-open">
                                <a href="" class="nav-link">
                                    <i class="nav-icon far fa-flag"></i>
                                    <p>
                                    <?= __('Exam')?>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="result" class="nav-link">
                                            <i class="fas fa-users nav-icon"></i>
                                            <p><?= __('Show Exams')?></p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="result/add_exam.php" class="nav-link">
                                            <i class="far fa-user nav-icon"></i>
                                            <p><?= __('Add Exam')?></p>
                                        </a>
                                    </li>
                                </ul>
                                

                            </li>

                            <li class="nav-header"><?= __('Settings')?></li>
                            <li class="nav-item">
                                <a href="admin_info.php?admin_id=<?php echo ($row['u_id']); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p><?= __('Admin Profile')?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="add_news.php" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p><?= __('Add NEWS')?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="show_news.php" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p><?= __('Show NEWS')?></p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <button class="btn btn-sm btn-danger" id="logout_btn"><?= __('Logout')?></button>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
</aside>

<!-- Model for Logging out start -->
<div class="modal fade" id="logout_model">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title"><?= __('Logout')?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><?= __('Do you Really Want to Logout')?> &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal"><?= __('No')?></button>
                <a href="logout.php" type="submit" name="delete_student_btn" class="btn btn-outline-light">
                    <i class="fas fa-trash"></i> <?= __('Logout')?>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Model for Logging out end -->


<?php
            }
        } else {
            $_SESSION["query_success"] = false;
            $_SESSION['status'] = "<b> Unknown Error Occured</b>";
            header("LOCATION: ./index.php");
            die();
        }
    }

?>