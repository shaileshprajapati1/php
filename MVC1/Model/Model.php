<?php
date_default_timezone_set("Asia/Kolkata");
class Model
{
    private $con = "";
    public function __construct()
    {
        try {
            $this->con = new mysqli("localhost", "root", "", "task");
        } catch (\Exception $e) {
            // $ErrorMsg = $e->getMessage();
            $ErrorMsg = PHP_EOL . "Error Date Time>>" . date('d-m-Y h:i:s A') . PHP_EOL . "Error Msg >>" . $e->getMessage() . PHP_EOL;
            if (!file_exists("log")) {
                mkdir('log');
            }
            $Filename = date('d_m_Y');
            file_put_contents("log/" . $Filename . "_log.txt", $ErrorMsg, FILE_APPEND);
        }
    }
    function Login($uname, $pass)
    {
        $SQL = " SELECT * FROM users WHERE password = '$pass' AND ( username = '$uname' OR email = '$uname'OR phone  = '$uname')";
        echo $SQL;
        $SQLEx = $this->con->query($SQL);
        if ($SQLEx->num_rows > 0) {
            $FetchData = $SQLEx->fetch_object();
            $ResponceData['data'] = $FetchData;
            $ResponceData['msg'] = "Success";
            $ResponceData['code'] = "1";
        } else {
            $ResponceData['data'] = "0";
            $ResponceData['msg'] = "Try Agian";
            $ResponceData['code'] = "0";
        }
        return $ResponceData;
    }
    function select($tbl, $where = null, $join = null)
    {
        $SQL = " SELECT * FROM $tbl ";
        if ($join != "") {
            foreach ($join as $jkey => $jvalue) {
                $SQL .= " JOIN $jkey ON $jvalue";
            }
        }

        if ($where != "") {
            $SQL .= " WHERE";
            foreach ($where as $key => $value) {
                $SQL .= " $key = '$value' AND";
            }
        }
        $SQL = rtrim($SQL, "AND");


        // echo $SQL;
        // exit;
        $SQLEx = $this->con->query($SQL);
        if ($SQLEx->num_rows > 0) {
            while ($data = $SQLEx->fetch_object()) {
                $FetchData[] = $data;
            }
            // echo "<pre>";
            // print_r($FetchData);
            $ResponceData['data'] = $FetchData;
            $ResponceData['msg'] = "Success";
            $ResponceData['code'] = "1";
        } else {
            $ResponceData['data'] = "0";
            $ResponceData['msg'] = "Try Agian";
            $ResponceData['code'] = "0";
        }
        return $ResponceData;
    }
    function Insert($tbl, $data)
    {
        $clm = implode(",", array_keys($data));
        $val = implode("','", $data);

        $SQL = " INSERT INTO $tbl($clm) VALUE('$val')";
        $SQLEx = $this->con->query($SQL);

        if ($SQLEx > 0) {
            $ResponceData['data'] = "1";
            $ResponceData['msg'] = "Success";
            $ResponceData['code'] = "1";
        } else {
            $ResponceData['data'] = "0";
            $ResponceData['msg'] = "Try Agian";
            $ResponceData['code'] = "0";
        }
        return $ResponceData;
    }
    function Delete($tbl, $where)
    {

        $SQL = " DELETE FROM $tbl WHERE";
        foreach ($where as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        // echo $SQL;
        $SQLEx = $this->con->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx > 0) {
            $ResponceData['data'] = "1";
            $ResponceData['msg'] = "Success";
            $ResponceData['code'] = "1";
        } else {
            $ResponceData['data'] = "0";
            $ResponceData['msg'] = "Try Agian";
            $ResponceData['code'] = "0";
        }
        return $ResponceData;
    }
    public function Update($tbl, $clm, $where)
    {
        $SQL = " UPDATE $tbl SET";
        foreach ($clm as $key => $value) {
            $SQL .= " $key = '$value' ,";
        }
        $SQL = rtrim($SQL, ",");
        $SQL .= " WHERE";
        foreach ($where as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        // echo $SQL;
        $SQLEx = $this->con->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx > 0) {
            $ResponceData['data'] = "1";
            $ResponceData['msg'] = "Success";
            $ResponceData['code'] = "1";
        } else {
            $ResponceData['data'] = "0";
            $ResponceData['msg'] = "Try Agian";
            $ResponceData['code'] = "0";
        }
        return $ResponceData;
    }
}
