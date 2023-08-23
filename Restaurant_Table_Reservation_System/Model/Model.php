<?php

class Model
{
    protected $connection = "";
    function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "test");
    }
    function Insert($tbl, $data)
    {
        $clm = implode(",", array_keys($data));
        $val = implode("','", $data);
        $SQL = "INSERT INTO $tbl ($clm) VALUES ('$val')";
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx > 0) {
            $Responce['Data'] = "1";
            $Responce['Code'] = "1";
            $Responce['Msg'] = "Success";
        } else {
            $Responce['Data'] = "0";
            $Responce['Code'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }
}
