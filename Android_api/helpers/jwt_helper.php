<?php
include "php-jwt/src/BeforeValidException.php";
include "php-jwt/src/ExpiredException.php";
include "php-jwt/src/SignatureInvalidException.php";
include "php-jwt/src/JWT.php";
include "php-jwt/src/JWK.php";
include "php-jwt/src/Key.php";
include "php-jwt/src/CachedKeySet.php";
// include "predis/autoload.php";


use Firebase\JWT\JWT;
use Firebase\JWT\Key;
// Predis\Autoloader::register();




class jwtHelper{
    
    private $accessTokenKey= "MadrasaMisbahUlUloomBatagundAccessTokenKey";
    private $refreshTokenKey= "MadrasaMisbahUlUloomBatagundRefreshTokenKey";
    private $iss = 'localhost';
     
    



    // assignAccessToken To client 
    function signAccessToken($email){
        $issuedAt   = new DateTimeImmutable();
        // $expire= $issuedAt->modify('+1440 minutes')->getTimestamp();
        $expire= $issuedAt->modify('+10 minutes')->getTimestamp();
        $accessTokenArr = array(
            "iss" => ($this -> iss),
            "aud" => $email,
            'iat' =>$issuedAt->getTimestamp(),
            'exp'  => $expire,
            'nbf' => $issuedAt->getTimestamp()
        );
        
        $accessToken = JWT::encode($accessTokenArr, $this -> accessTokenKey, 'HS256');

        return $accessToken;

    }

    // assignRefreshToken To client 
    function signRefreshToken($email){
        $issuedAt   = new DateTimeImmutable();
        // $expire= $issuedAt->modify('+86400 minutes')->getTimestamp();
        $expire= $issuedAt->modify('+1 minutes')->getTimestamp();
        $refreshTokenArr = array(
            "iss" => ($this -> iss),
            "aud" => $email,
            'iat' => $issuedAt->getTimestamp(),
            'exp'  => $expire,
            'nbf' => $issuedAt->getTimestamp()
        );
        
        $refreshToken = JWT::encode($refreshTokenArr, $this -> refreshTokenKey, 'HS256');


    
        // $client1 = new Predis\Client();
        // $client1->set($email, $refreshToken,'ex',$expire);
        return $refreshToken;
    }

    // getAccessToken To client 
    function verifyAccessToken($token){
        $jwt = explode(" ",$token);
        $decoded = JWT::decode($jwt[1], new Key($this -> accessTokenKey, 'HS256'));
        if($decoded){
            return true;
        }else{
            return false;
        }

    }

    // getAccessToken To client 
    function verifyRefreshToken($token){
        // Predis\Autoloader::register();
        // $client1 = new Predis\Client();
        $jwt = explode(" ",$token);
        $decoded = JWT::decode($jwt[1], new Key($this -> refreshTokenKey, 'HS256'));
        // $value = $client1->get($decoded->aud);
        // echo $jwt[1];
        // echo $value;
        // if($value==$jwt[1]){
            return $decoded->aud;
        // }else{
        //     return false;
        // }
    }
    
    // delete client 
    function deleteToken($token){
        $jwt = explode(" ",$token);
        $decoded = JWT::decode($jwt[1], new Key($this -> refreshTokenKey, 'HS256'));
        $client3 = new Predis\Client();
        $res = $client3->del($decoded->aud);
        return $res;
    }


}

?>