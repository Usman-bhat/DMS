<?php
session_start();
if (!isset($_SESSION["auth"])) {
    $_SESSION["query_success"] = false;
    $_SESSION['status'] = "Access Denied !!!    <b> Login To Access</b>";
    header("LOCATION: ../");
    die();
}
