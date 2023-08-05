
<?php
date_default_timezone_set('Asia/Kolkata');

class Model {
    
    function __construct(protected $connection = null)
    {
        try {
            $this->connection = new mysqli("localhost","root","","task");
        } catch (\Exception $e) {
            // $ErrorMsg = $e->getMessage();
            $ErrorMsg = PHP_EOL."Error Date Time >>".PHP_EOL.date('d-m-Y h:i:s A').PHP_EOL."Error Msg>>".$e->getMessage().PHP_EOL;
            // echo $ErrorMsg;
            if(!file_exists("log")){
                mkdir('log');
            }
           $FileName = date('d_m_Y');
           file_put_contents("log/".$FileName."_log.txt",$ErrorMsg,FILE_APPEND);
        }
    }
    function Insert($tbl,$data)
    {
        $clm =implode(",",array_keys($data)) ;
        $val = implode("','",$data);
        $SQL = " INSERT INTO $tbl ($clm) VALUES ('$val')";
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if($SQLEx >0){
            $ResponceData["Data"] = "1";
            $ResponceData["Msg"] = "success";
            $ResponceData["Code"] = "1";

        } else {
            $ResponceData["Data"] = "0";
            $ResponceData["Msg"] = "Try Again";
            $ResponceData["Code"] = "0";
        }
        return $ResponceData;
    }
    function Select($tbl,$where=null,$join=null)
    {
        $SQL= " SELECT * FROM $tbl ";
        if($where != ""){
            $SQL.= "WHERE ";
            foreach ($where as $key => $value) {
                $SQL.= " $key = '$value' AND";
            }
        }
        $SQL = rtrim($SQL," AND");
        if($join != ""){
            foreach ($join as $jkey => $jvalue) {
                $SQL .= "JOIN $jkey ON $jvalue";
            }
        }

    //    echo $SQL;
        $SQLEx = $this->connection->query($SQL);

        // print_r($SQLEx);
        if($SQLEx->num_rows >0){
            while ($Data = $SQLEx->fetch_object()) {
                $FetchData[] = $Data;
            }
            $ResponceData["Data"] = $FetchData;
            $ResponceData["Msg"] = "success";
            $ResponceData["Code"] = "1";

        } else {
            $ResponceData["Data"] = "0";
            $ResponceData["Msg"] = "Try Again";
            $ResponceData["Code"] = "0";
        }
        return $ResponceData;
    }
    

} 


?>