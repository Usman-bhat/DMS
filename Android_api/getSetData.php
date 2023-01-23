<?php
include 'database69.php';
require 'helpers/jwt_helper.php';
include("../Audit_API_FOL/table_names.php");

$db = new Database();
$jwt = new jwtHelper();

$creditTable = _name('cr');
$debitTable = _name('dt');

    try {
        $headers = getallheaders();        
        
        if(isset($headers['authorization']) && preg_match('/Bearer\s(\S+)/', $headers['authorization'])){

            $jwt->verifyAccessToken($headers['authorization']);
            if($jwt){
                // mysqli_real_escape_string($db->mysqli,$_POST['action']);
                $action = isset($_POST['action']) ? $_POST['action']:"";
                // 1.getCreditData 2.getDebitData  3.setCreditData 4. setDebitData 5. default
                switch ($action) {

                    
                    /**
                             * Used To Get All  CreditData From Database
                             * @MAinParam getDebitData
                             * @Param year
                             * @Param month (optional)
                        */
                    case 'getCreditData':
                        if(isset($_POST['year']) ){
                            $data =[ 
                                "year"=>mysqli_real_escape_string($db->mysqli,$_POST['year']),
                                "month"=>isset($_POST['month']) ? mysqli_real_escape_string($db->mysqli,$_POST['month']) : false,
    
                            ];
                            $where = $data['month'] ? "YEAR(cr_date) = '".$data['year']."' AND MONTH(cr_date)='".$data['month']."' ":"YEAR(cr_date) = '".$data['year']."'";
                            // echo $where;
                            $dataFromDb = $db->select($creditTable, "*", null, $where,"cr_date DESC", null);
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
                        
                        /**
                             * Used To Get All  DebitData From Database
                             * @MAinParam getDebitData
                             * @Param year
                             * @Param month (optional)
                        */
                    case 'getDebitData':
                        if(isset($_POST['year']) ){
                            $data =[ 
                                "year"=>mysqli_real_escape_string($db->mysqli,$_POST['year']),
                                "month"=>isset($_POST['month']) ? mysqli_real_escape_string($db->mysqli,$_POST['month']) : false,
    
                            ];
                            $where = $data['month'] ? "YEAR(dt_date) = '".$data['year']."' AND MONTH(dt_date)='".$data['month']."' ":"YEAR(dt_date) = '".$data['year']."'";
                            // echo $where;
                            $dataFromDb = $db->select($debitTable, "*", null, $where,"dt_date DESC", null);
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


                            /**
                             * Used To Save CreditData In Database
                             * @MAinParam setCreditData
                             * @Param amount
                             * @Param by
                             * @Param rec_no
                             * @Param rec_by
                             * @Param mode
                             * @Param for
                             */
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

                            /**
                             * Used To Save DebitData In Database
                             * @MAinParam setDebitData
                             * @Param amount
                             * @Param by
                             * @Param for
                             */
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

                        /**
                             *@CHART 
                             * Get data Which IS used to set PIE Chart
                             * @MAinParam getPieChatData
                             * @Param year E.g, 2022,2023,2024
                             * @Param table  cr=creditTable,  dt=debitTable
                             * select month(cr_date) , SUM(cr_amount) from credit_detail WHERE YEAR(cr_date) = 2023 AND cr_for_id= 'food' GROUP By MONTH(cr_date) order By MONTH(cr_date);
                             * @QUERY = select month(cr_date) , SUM(cr_amount) from credit_detail WHERE YEAR(cr_date) = 2023 GROUP By MONTH(cr_date) order By MONTH(cr_date);
                            */
                        case 'getLineChatData':
                        if(isset($_POST['year']) && isset($_POST['table'])){

                            $year = mysqli_real_escape_string($db->mysqli,$_POST['year']);
                            $table = mysqli_real_escape_string($db->mysqli,$_POST['table']);
                            if($table ==="cr"){
                                $select = "month(cr_date) AS cr_month , SUM(cr_amount) AS cr_amount, cr_for_id" ;
                                
                                //food
                                $dataFromDb = $db->select($creditTable, $select, null, "YEAR(cr_date) = '".$year."' AND cr_for_id='food' ","MONTH(cr_date)",null,"MONTH(cr_date)");
                                $data1 = $db->getResult();
                                //Pay
                                $dataFromDb = $db->select($creditTable, $select, null, "YEAR(cr_date) = '".$year."' AND cr_for_id='pay' ","MONTH(cr_date)",null,"MONTH(cr_date)");
                                $data2 = $db->getResult();
                                //bills
                                $dataFromDb = $db->select($creditTable, $select, null, "YEAR(cr_date) = '".$year."' AND cr_for_id='bills' ","MONTH(cr_date)",null,"MONTH(cr_date)");
                                $data3 = $db->getResult();
                                //Construction
                                $dataFromDb = $db->select($creditTable, $select, null, "YEAR(cr_date) = '".$year."' AND cr_for_id='construction' ","MONTH(cr_date)",null,"MONTH(cr_date)");
                                $data4 = $db->getResult();
                                //others
                                $dataFromDb = $db->select($creditTable, $select, null, "YEAR(cr_date) = '".$year."' AND cr_for_id='others' ","MONTH(cr_date)",null,"MONTH(cr_date)");
                                $data5 = $db->getResult();

                                if($data1 || $data2|| $data3|| $data4|| $data5){
                                    echo json_encode(array_merge($data1,$data2,$data3,$data4,$data5));
                                }else{
                                    throw new Exception("No data Found", 200);
                                }
                            }else if($table === "dt"){
                                $select = "month(dt_date) AS dt_month , SUM(dt_amount) AS dt_amount,dt_for" ;
                                
                                //food
                                $dataFromDb = $db->select($debitTable, $select, null, "YEAR(dt_date) = '".$year."' AND dt_for='food' ","MONTH(dt_date)",null,"MONTH(dt_date)");
                                $data1 = $db->getResult();
                                //Pay
                                $dataFromDb = $db->select($debitTable, $select, null, "YEAR(dt_date) = '".$year."' AND dt_for='pay' ","MONTH(dt_date)",null,"MONTH(dt_date)");
                                $data2 = $db->getResult();
                                //bills
                                $dataFromDb = $db->select($debitTable, $select, null, "YEAR(dt_date) = '".$year."' AND dt_for='bills' ","MONTH(dt_date)",null,"MONTH(dt_date)");
                                $data3 = $db->getResult();
                                //Construction
                                $dataFromDb = $db->select($debitTable, $select, null, "YEAR(dt_date) = '".$year."' AND dt_for='construction' ","MONTH(dt_date)",null,"MONTH(dt_date)");
                                $data4 = $db->getResult();
                                //others
                                $dataFromDb = $db->select($debitTable, $select, null, "YEAR(dt_date) = '".$year."' AND dt_for='other' ","MONTH(dt_date)",null,"MONTH(dt_date)");
                                $data5 = $db->getResult();

                                if($data1 || $data2|| $data3|| $data4|| $data5){
                                    echo json_encode(array_merge($data1,$data2,$data3,$data4,$data5));
                                }else{
                                    throw new Exception("No data Found", 200);
                                }
                                
                            }else{
                                throw new Exception("Bad Table Request", 400);
                            }

                            }else{
                                throw new Exception("Bad Requestnew1", 400);
                              }
                            break;

                            /**
                             * getdata for pie charts in app
                             * @parms year
                             * @parms table
                             * @QUERY = select year(cr_date) , SUM(cr_amount) from credit_detail  GROUP By year(cr_date) order By year(cr_date);
                             */
                    case 'getPieChatData':
                        if(isset($_POST['table']) && isset($_POST['year'])){
                            $table = mysqli_real_escape_string($db->mysqli,$_POST['table']);
                            $yearPie = mysqli_real_escape_string($db->mysqli,$_POST['year']);
                            if($table ==="cr"){
                                $select1 = "monthname(cr_date) AS year  , SUM(cr_amount) AS amount";
                                $dataFromDb1 = $db->select($creditTable, $select1,null, "year(cr_date)= ".$yearPie,"month(cr_date)",null,"month(cr_date)");
                                $data6 = $db->getResult();

                                if($data6){
                                    echo json_encode($data6);
                                }else{
                                    throw new Exception("No data Found", 200);
                                }

                            }else if($table ==="dt"){
                                $select1 = "monthname(dt_date) AS year  , SUM(dt_amount) AS amount";
                                $dataFromDb1 = $db->select($debitTable, $select1, null, "year(dt_date)= ".$yearPie,"month(dt_date)",null,"month(dt_date)");
                                $data6 = $db->getResult();

                                if($data6){
                                    echo json_encode($data6);
                                }else{
                                    throw new Exception("No data Found", 200);
                                }

                            }else{
                                throw new Exception("Bad Request", 400);

                            }


                        }else{
                            throw new Exception("Bad Request", 400);
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