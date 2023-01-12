<?php
require("auth.php");

include("includes/header.php");
include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");
?>


<!-- result Of Student -->
<div class="container mt-5">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>adaji</th>
                      <th>lahja</th>
                      <th>tajweed</th>
                      <th>etc</th>
                    </tr>
                  </thead>
                  <tbody>

<?php

$student_id = mysqli_real_escape_string($con, $_GET['sid']);
$arr = array("/","'",";","SELECT","UNION",")");
if(0< count(array_intersect(explode(' ',strtolower($_GET['sid'])),$arr))){?>
    <a class="btn btn-success m-5" href="index.php">Home </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
    <?php
    echo ("<h1> Wrong Id</h1>");
    echo ("<p>No data found</>");
    echo "</div>";
}else{
$query = "SELECT * FROM "._name('result')." WHERE r_sid='$student_id'";
$query_run = mysqli_query($con, $query);
if ($query_run->num_rows > 0) {
    // output data of each row
    while ($row = $query_run->fetch_assoc()) {

?>
                    <tr class="expandable-table text-center"aria-expanded="true">
                      <td colspan="5">
                        <p>
                        <?php echo $row["r_date"] . " :   : " . $row["r_exam"]; ?>
                        </p>
                      </td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $row["r_sid"]; ?></td>
                      <td><?php echo $row["r_tajweed"]; ?></td>
                      <td><?php echo $row["r_result"]; ?></td>
                      <td><?php echo $row["r_lahja"]; ?></td>
                      <td><?php echo $row["r_id"]; ?></td>
                    </tr>
                    
                  
    <?php
    }
} else { ?>
    <a class="btn btn-success m-5" href="index.php">Home </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
    <?php
    echo ("<h1> No Data Found</h1>");
    echo ("<p> no data found with this id please ty another one !!!</>");
    echo "</div>";
}} ?>

</tbody>
                </table>
            
        </div>
        </div>

    <script>
        function print_student() {
            window.addEventListener("load", window.print());
        }
    </script>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>