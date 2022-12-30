<?php
require 'helpers/jwt_helper.php';
try {

        $jwt = new jwtHelper();
        $headers = getallheaders();
        if(isset($headers['authorization'])){
            $res = $jwt->deleteToken($headers['authorization']);
        echo json_encode(array(
            "status"=>200,
            "message"=>'Logged Out'
        ));
        }else{
            echo json_encode(array(
                "status"=>402,
                "message"=>'Bad Request'
            ));

        }
        
} catch (\Throwable $e) {
    echo json_encode(array(
        "error"=>$e->getCode(),
        "message"=>$e->getMessage()
    ));
}

?>