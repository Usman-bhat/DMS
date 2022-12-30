<?php
if(isset($_GET['str']))
$str = $_GET['str'];
$key="allah";
$hash = hash_hmac('sha256',$str,$key);

echo $hash;
?>