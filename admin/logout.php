<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["auth"]);
$_SESSION["query_success"] = false;
$_SESSION['status'] = "Logged out successfully";
header("LOCATION: ../");
die();
