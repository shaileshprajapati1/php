<?php
date_default_timezone_set('Asia/Kolkata');
class Model
{
    public $connection = "";
    public function __construct()
    {
        try {
            $this->connection = new mysqli("localhost", "root", "", "task");
            // echo "inside try";
        } catch (\Throwable $th) {
            //    $ErroMsg = $th->getMessage();
            //    echo $ErroMsg;
            $ErroMsg = PHP_EOL . "Error Date Time >>" . date('d-m-Y h:i:s A') . PHP_EOL . "Error Msg >>" . $th->getMessage() . PHP_EOL;
            //    echo $ErroMsg;
            if (!file_exists("log")) {
                mkdir('log');
            }
            $FileName = date('d_m_Y');
            file_put_contents("log/" . $FileName . "_log.txt", $ErroMsg, FILE_APPEND);
        }
    }
    function Login($username, $password)
    {
        $SQL = " SELECT * FROM users WHERE (username = '$username' OR email = '$username' OR phone = '$username') AND password = '$password'";
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx->num_rows > 0) {
            $FatchData = $SQLEx->fetch_object();
            $ResponceData['Data'] = $FatchData;
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
            // print_r($FatchData);
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Agian";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
    function select($tbl, $where = null)
    {
        $SQL = " SELECT * FROM $tbl ";
        if ($where != "") {
            $SQL .= " WHERE";
            // $SQL = rtrim($SQL,"WHERE");
            foreach ($where as $key => $value) {
                $SQL .= " $key = '$value' AND";
                
            }
            $SQL = rtrim($SQL,"AND");
        }

        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx->num_rows > 0) {
            while ($data = $SQLEx->fetch_object()) {
                $FatchData[] = $data;
            }
            // print_r($FatchData);
            $ResponceData['Data'] = $FatchData;
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
            // print_r($FatchData);
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Agian";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
    // function Edit($tbl, $where)
    // {
    //     $SQL = " SELECT * FROM $tbl WHERE";

    //     foreach ($where as $key => $value) {
    //         $SQL .= " $key = '$value '";
    //     }
    //     //         echo $SQL;
    //     // exit;
    //     $SQLEx = $this->connection->query($SQL);
    //     // print_r($SQLEx);
    //     if ($SQLEx->num_rows > 0) {
    //         while ($data = $SQLEx->fetch_object()) {
    //             $FatchData[] = $data;
    //         }
    //         // print_r($FatchData);
    //         $ResponceData['Data'] = $FatchData;
    //         $ResponceData['Msg'] = "Success";
    //         $ResponceData['Code'] = "1";
    //         // print_r($FatchData);
    //     } else {
    //         $ResponceData['Data'] = "0";
    //         $ResponceData['Msg'] = "Try Agian";
    //         $ResponceData['Code'] = "0";
    //     }
    //     return $ResponceData;
    // }
    function Delete($tbl, $where)
    {
        $SQL = " DELETE FROM $tbl WHERE";
        foreach ($where as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        // echo $SQL;
        // exit;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);

        if ($SQLEx > 0) {
            $ResponceData['Data'] = "1";
            $ResponceData['Msg'] = "Success";
            $ResponceData['Code'] = "1";
            // print_r($FatchData);
        } else {
            $ResponceData['Data'] = "0";
            $ResponceData['Msg'] = "Try Agian";
            $ResponceData['Code'] = "0";
        }
        return $ResponceData;
    }
    function Update($tbl, $data, $where)
    {
        $SQL = "UPDATE $tbl SET";
        foreach ($data as $dkey => $dvalue) {
            $SQL .= " $dkey = '$dvalue',";
        }
        $SQL = rtrim($SQL, ",");
        $SQL .= " WHERE ";

        foreach ($where as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        // echo $SQL;
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

    function Insert($tbl, $data)
    {
        $clm = implode(",", array_keys($data));
        $vlu  = implode("','", $data);
        echo  $SQL  = " INSERT INTO $tbl($clm) VALUE ('$vlu') ";
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
} 
// $Model = new Model;
// $Model->Inserst("users",array("name"=>"shailesh","age"=>29));
