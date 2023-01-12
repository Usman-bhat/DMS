<?php
$name = array("students" => "students","users" => "users","cr" => "credit_detail","post" => "posts","editor" => "editor","exam" => "exam","news" => "news","dt" => "debit_detail",);

function _name($str){
    global $name;
    if(!empty($name[$str])){
        return $name["$str"];
    }
    return $str;

    
    // echo in_array('adt',$name)?"this":"hiss";
//     if(in_array("$str",$name)){
//         return($name[$str]);
//     }else{
//         return "false";
//     }
}

?>