
<?php
class Model
{
    public $connection = "";

    function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "test");
        // if($this->connection){
        //     echo "success";
        // }
    }
    function Insert($tbl, $data)
    {
        $clm = implode(",", array_keys($data));
        $val = implode("','", $data);
        $SQL = " INSERT INTO $tbl ($clm) VALUES ('$val')";
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // echo $SQLEx;
        if ($SQLEx > 0) {
            $ResponceData['Data'] = "1";
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Again";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
    function Login($uname, $pass)
    {
        $SQL = " SELECT * FROM users WHERE password = '$pass' AND (username = '$uname' OR email = '$uname') ";
        $SQLEx = $this->connection->query($SQL);
        // echo "<pre>";
        // print_r($SQLEx) ;
        // echo "</pre>";
        if ($SQLEx->num_rows > 0) {
            $FetchData = $SQLEx->fetch_object();
            $ResponceData['Data'] = $FetchData;
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Again";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
}


?>