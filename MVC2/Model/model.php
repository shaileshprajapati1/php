<?php

date_default_timezone_set('Asia/Kolkata');
class Model
{
    protected $connection = "";
    public function __construct()
    {
        try {
            $this->connection = new mysqli("localhost", "root", "", "task");
        } catch (\Exception $e) {

            $ErrorMsg = PHP_EOL . "Error Date Time>>>" . date('d-m-Y h:i:s A') . PHP_EOL . "Error Msg>>>" . $e->getMessage() . PHP_EOL;
            if (!file_exists("log")) {
                mkdir('log');
            }
            $Filename = date('d_m_Y');
            file_put_contents("log/" . $Filename . "_log.txt", $ErrorMsg, FILE_APPEND);
        }
    }
    public function Insert($tbl, $data)
    {
        $clm  = implode(",", array_keys($data));
        $val = implode("','", $data);
        $SQL = " INSERT INTO $tbl($clm) VALUES ('$val')";
        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx > 0) {
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
    public function Login($username, $password)
    {
        $SQL = " SELECT * FROM users WHERE password = '$password' AND (username = '$username' OR email = '$username' OR phone = '$username')";
        //    echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx->num_rows > 0) {
            $FetchData = $SQLEx->fetch_object();
            // print_r($FetchData);
            $ResponceData['Data'] = $FetchData;
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Agian";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
    public function Select($tbl,$whwere=null)
    {
        $SQL = " SELECT * FROM $tbl " ;
         if($whwere != ""){
            $SQL .= "WHERE";
            foreach ($whwere as $key => $value) {
            $SQL .= " $key = '$value' AND";
            }
            $SQL = rtrim($SQL,"AND");
         }
        //    echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx->num_rows > 0) {
            while ($Data = $SQLEx->fetch_object()) {
                $FetchData[] = $Data;
            }
            // print_r($FetchData);
            $ResponceData['Data'] = $FetchData;
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Agian";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
    public function Delete($tbl,$where){
        $SQL = " DELETE FROM $tbl WHERE";
        foreach ($where as $key => $value) {
        $SQL .= " $key = '$value' AND";
        }
        $SQL =rtrim($SQL,"AND");
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if($SQLEx >0){
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
