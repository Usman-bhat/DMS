<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
include("../Audit_API_FOL/table_names.php");
?>
<div class="content-wrapper">
    <div class="conainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- for alterts start -->
                    <?php include("alert.php"); ?>
                    <!-- for alterts end -->
                    <a href="add_news.php" class="btn btn-primary m-2 float-right">Add NEWS</a>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="student_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NEWS ID</th>
                                    <th>NEWS title</th>
                                    <th>NEWS Body</th>
                                    <th>NEWS By</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("config/dbcon.php");
                                $query = "SELECT * FROM "._name('news');
                                $query_run = mysqli_query($con, $query);
                                if ($query_run->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $query_run->fetch_assoc()) {
                                ?>


                                        <tr>
                                            <td> <?php echo $row["n_id"]; ?> </td>
                                            <td> <?php echo $row["n_title"]; ?> </td>
                                            <td><?php echo $row["n_body"]; ?></td>
                                            <td><?php echo $row["n_by"]; ?></td>
                                            <td>
                                                <form action="add_news_code.php" method="POST">
                                                    <input type="hidden" name="news_id" value="<?php echo $row['n_id']; ?>">
                                                    <button type="submit" name="del_news" class="btn btn-danger"> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h1> No Data Found</h1>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>