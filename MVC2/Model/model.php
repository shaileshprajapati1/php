<?php

date_default_timezone_set('Asia/Kolkata');
class Model{
    protected $connection = "";
 public function __construct()
 {
    try {
        $this->connection = new mysqli("localhost","root","","task");
    } catch (\Exception $e) {
        
        $ErrorMsg =PHP_EOL."Error Date Time>>>".date('d-m-Y h:i:s A').PHP_EOL."Error Msg>>>".$e->getMessage().PHP_EOL;
        if(!file_exists("log")){
            mkdir('log');
        }
        $Filename = date('d_m_Y');
        file_put_contents("log/".$Filename."_log.txt",$ErrorMsg,FILE_APPEND);
    }
 }
 public function Insert($tbl,$data){
    $clm  = implode(",",array_keys($data));
    $val = implode("','",$data);
  echo $SQL = " INSERT INTO $tbl($clm) VALUES ('$val')";
    $SQLEx = $this->connection->query($SQL);
    if($SQLEx>0){
        $ResponceData['Data'] = "1";
        $ResponceData['Msg'] = "Success";
        $ResponceData['Code'] = "1";
    } else {
        $ResponceData['Data'] = "0";
        $ResponceData['Msg'] = "Try Agian";
        $ResponceData['Code'] = "0";
    }
    return $ResponceData;
 }


}

?>