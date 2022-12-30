<?php
session_start();
unset($_SESSION["editor"]);
unset($_SESSION["editor_auth"]);
$_SESSION["query_success"] = false;
$_SESSION['status'] = "Logged out successfully";
header("LOCATION: ../");
die();
