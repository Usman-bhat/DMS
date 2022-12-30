<?php
include 'database69.php';
require 'helpers/jwt_helper.php';

$db = new Database();
$jwt = new jwtHelper();

$creditTable = 'audit_credit';
$debitTable = 'audit_debit';

    try {
        $headers = getallheaders();        
        
        if(isset($headers['authorization']) && preg_match('/Bearer\s(\S+)/', $headers['authorization'])){

            $jwt->verifyAccessToken($headers['authorization']);
            if($jwt){
                // mysqli_real_escape_string($db->mysqli,$_POST['action']);
                $action = isset($_POST['action']) ? $_POST['action']:"";
                // 1.getCreditData 2.getDebitData  3.setCreditData 4. setDebitData 5. default
                switch ($action) {
// %%=========================================================================================================================================================%%
                    case 'getCreditData':
                        if(isset($_POST['year']) ){
                            $data =[ 
                                "year"=>mysqli_real_escape_string($db->mysqli,$_POST['year']),
                                "month"=>isset($_POST['month']) ? mysqli_real_escape_string($db->mysqli,$_POST['month']) : false,
    
                            ];
                            $where = $data['month'] ? "YEAR(cr_date) = '".$data['year']."' AND MONTH(cr_date)='".$data['month']."' ":"YEAR(cr_date) = '".$data['year']."'";
                            // echo $where;
                            $dataFromDb = $db->select($creditTable, "*", null, $where,null, null);
                            if($dataFromDb){
                                // print_r($db->getResult());
                                echo json_encode($db->getResult());
                            }else{
                                throw new Exception("No data Found", 200);
                            }
                            
                        }else{
                            throw new Exception("Bad Request11", 400);
                        }
                        break;
// %%=========================================================================================================================================================%%
                    case 'getDebitData':
                        if(isset($_POST['year']) ){
                            $data =[ 
                                "year"=>mysqli_real_escape_string($db->mysqli,$_POST['year']),
                                "month"=>isset($_POST['month']) ? mysqli_real_escape_string($db->mysqli,$_POST['month']) : false,
    
                            ];
                            $where = $data['month'] ? "YEAR(dt_date) = '".$data['year']."' AND MONTH(dt_date)='".$data['month']."' ":"YEAR(dt_date) = '".$data['year']."'";
                            // echo $where;
                            $dataFromDb = $db->select($debitTable, "*", null, $where,null, null);
                            if($dataFromDb){
                                // print_r($db->getResult());
                                echo json_encode($db->getResult());
                            }else{
                                throw new Exception("No data Found", 200);
                            }
                            
                        }else{
                            throw new Exception("Bad Request44", 400);
                        }
                        break;
// %%=========================================================================================================================================================%%
                        case 'setCreditData';
                            if(isset($_POST['amount']) && isset($_POST['by'])&& isset($_POST['rec_no'])&& isset($_POST['rec_by'])&& isset($_POST['mode'])&& isset($_POST['for'])){

                            
                            $dataIN = [
                                "cr_amount"=>mysqli_real_escape_string($db->mysqli,$_POST['amount']),
                                "cr_by"=>mysqli_real_escape_string($db->mysqli,$_POST['by']),
                                "cr_reciept_no"=>mysqli_real_escape_string($db->mysqli,$_POST['rec_no']),
                                "cr_reciept_by"=>mysqli_real_escape_string($db->mysqli,$_POST['rec_by']),
                                "cr_mode"=>isset($_POST['for']) ? mysqli_real_escape_string($db->mysqli,$_POST['mode']) : 'cash',
                                "cr_for_id"=>mysqli_real_escape_string($db->mysqli,$_POST['for']),
                                
                             ];
                             $inDb =   $db->insert($creditTable, $dataIN );
                             if($inDb){
                                echo json_encode(array(
                                    "status"=>200,
                                    "message"=>'Inserted Successfully'
                                ));

                             }else{
                                throw new Exception("Internal Server Error", 500);
                             }
                             


                            }else{
                                throw new Exception("Bad Requestnew1", 400);
                              }
                            break;
// %%=========================================================================================================================================================%%
                        case 'setDebitData';
                        if(isset($_POST['amount']) && isset($_POST['by'])){

                            
                            $dataIN = [
                                "dt_amount"=>mysqli_real_escape_string($db->mysqli,$_POST['amount']),
                                "dt_by"=>mysqli_real_escape_string($db->mysqli,$_POST['by']),
                                "dt_for"=>isset($_POST['for']) ? mysqli_real_escape_string($db->mysqli,$_POST['for']) : 'other',
                             ];
                             $inDb =   $db->insert($debitTable, $dataIN );
                             if($inDb){
                                echo json_encode(array(
                                    "status"=>200,
                                    "message"=>'Inserted Successfully'
                                ));

                             }else{
                                throw new Exception("Internal Server Error", 500);
                             }
                             


                            }else{
                                throw new Exception("Bad Requestnew1", 400);
                              }
                            break;
                    
                    default:
                        throw new Exception("Bad Request Default", 400);
                        break;
                }




            }else{
                // access token verification faioled 
                throw new Exception("Unauthorized", 500);
            }          

        }else throw new Exception("Unauthorized", 500);
    }
     catch (\Throwable $e) {
        echo json_encode(array(
            "error"=>$e->getCode(),
            "message"=>$e->getMessage()
        ));
        // print_r($e);
    }



?>