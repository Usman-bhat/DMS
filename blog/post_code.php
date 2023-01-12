<?php
include("../admin/config/dbcon.php");

$limit = 5;
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 0;
}

$query = "SELECT * FROM post LIMIT {$page},$limit";
$query_run = mysqli_query($con, $query) or die("Query unsuccessfull");
if (mysqli_num_rows($query_run) > 0) {
    $output  = "";
    while ($row = mysqli_fetch_assoc($query_run)) {
        $last_id = $row["p_id"];
        // for small body 
        $desc = substr($row["p_body"], 0, 100) . "...";
        // for designed date 
        $time = strtotime($row["p_date"]);
        $date = date('d-M-Y', $time);
        $output  .= "<div class='post-list'>
    <div class='row m-2'>
        <div class='col-sm-2'>
            <div class='picture'>
                <img alt='Opt wizard thumbnail' src='images/quran1.jpg'>
            </div>
        </div>
        <div class='col-sm-6'>
            <h4>
                <a href='post.php?p_crud={$row['p_crud']}' class='username'>
                    <label class='label label-info'>{$row['p_title']}</label>
                </a>
            </h4>
            <h5>
                <i class='fa fa-calendar'></i>
                {$date}
            </h5>
            <p class='description'>{$desc}</p>
        </div>
        <div class='col-sm-4' data-no-turbolink=''>
            <a class='btn btn-info btn-download btn-round pull-right' href='post.php?p_crud={$row['p_crud']}'>
                <i class='fa fa-share'></i> View
            </a>
        </div>
    </div>
</div>";
    }
    // while loop ends here 
    $output .= "<div class='container' id='load_btn_class'>
<button class='btn btn-outline-primary' id='load_more_btn' data-id='{$last_id}'>Load More</button>
</div>";
    echo $output;
} else {
    echo "";
}
