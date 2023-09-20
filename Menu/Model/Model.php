<?php

class Model
{
    protected $Connection = "";
    function __construct()
    {
        $this->Connection = new mysqli("localhost", "root", "", "menu");
        // if($this->Connection){
        //     echo "Connection Success";
        // }else {
        //     echo "Connection Fail";
        // }
    }
    function Insert($tbl, $data)
    {
        $clm = implode(",", array_keys($data));
        $val = implode("','", $data);

        $SQL = " INSERT INTO $tbl ($clm) VALUES ('$val')";
        echo $SQL;
        $SQLEx = $this->Connection->query($SQL);

        if ($SQLEx > 0) {
            $Responce['Code'] = "1";
            $Responce['Data'] = "1";
            $Responce['Msg'] = "Success";
        } else {
            $Responce['Code'] = "0";
            $Responce['Data'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }
    function Select($tbl,$where = null,$join =null,$clm ="*", )
    {

        $SQL = " SELECT $clm FROM $tbl ";
        
        if($join != "" || $join != null){
            foreach ($join as $key => $value) {
                $SQL .= " JOIN $key ON $value ";
            }

        }

        if ($where != "" || $where != null) {
            $SQL .= " WHERE";
            foreach ($where as $key => $value) {
                $SQL .= " $key = '$value' AND";
            }
            $SQL = rtrim($SQL, "AND");
        }
        // echo $SQL;
        $SQLEx = $this->Connection->query($SQL);

        if ($SQLEx->num_rows > 0) {
            while ($data = $SQLEx->fetch_object()) {
                $FetchData[] = $data;
            }
            $Responce['Code'] = "1";
            $Responce['Data'] = $FetchData;
            $Responce['Msg'] = "Success";
        } else {
            $Responce['Code'] = "0";
            $Responce['Data'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }
}
