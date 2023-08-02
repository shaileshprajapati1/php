
<?php
date_default_timezone_set('Asia/Kolkata');

class Model {
    
    function __construct(protected $connection = "")
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
        echo $SQL;
        // $SQLEx = 
    }

}


?>