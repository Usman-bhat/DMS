<?php
if (isset($_SESSION['status'])) {
    if ($_SESSION['query_success'] == true) {
        echo ("<div class='alert alert-success alert-dismissible'>");
    } else {
        echo ('<div class="alert alert-danger alert-dismissible">');
    }
?>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
<?php echo ($_SESSION['status'] . "</div>");
    unset($_SESSION['status']);
    unset($_SESSION['student_add_success']);
} ?>