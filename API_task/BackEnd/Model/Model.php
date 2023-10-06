<?php

class Model
{

    function __construct(protected $connection = null)
    {
        $this->connection = new mysqli("localhost", "root", "", "task");
        // if ($this->connection) {
        //     echo "success";
        // } else {
        //     echo "fail";
        // }
    }

    function Select($tbl, $where = null)
    {
        $SQL = " SELECT * FROM $tbl";
        if ($where != null || $where != "") {
            $SQL .= " WHERE";
            foreach ($where as $key => $value) {
                $SQL .= " $key = '$value' AND";
            }
            $SQL = rtrim($SQL, "AND");
        }
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx->num_rows > 0) {
            while ($data = $SQLEx->fetch_object()) {
                $FetchData[] = $data;
            }

            $Responce['Code'] = "1";
            $Responce['Msg'] = "Success";
            $Responce['Data'] = $FetchData;
        } else {
            $Responce['Data'] = "0";
            $Responce['Code'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }

    function Insert($tbl, $data)
    {
        $clm = implode(",", array_keys($data));
        $val = implode("','", $data);
        $SQL = " INSERT INTO $tbl ($clm) VALUES ('$val')";
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx > 0) {
            $Responce['Code'] = "1";
            $Responce['Msg'] = "Success";
            $Responce['Data'] = "1";
        } else {
            $Responce['Data'] = "0";
            $Responce['Code'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }
    function Update($tbl, $data, $where)
    {

        $SQL = " UPDATE $tbl SET ";
        foreach ($data as $key => $value) {
            $SQL .= " $key = '$value' ,";
        }
        $SQL = rtrim($SQL, ",");

        $SQL .= "WHERE";

        foreach ($where as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        //    echo $SQL;

        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx > 0) {
            $Responce['Code'] = "1";
            $Responce['Msg'] = "Success";
            $Responce['Data'] = "1";
        } else {
            $Responce['Data'] = "0";
            $Responce['Code'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }
    function Delete($tbl, $where)
    {

        $SQL = " DELETE FROM $tbl WHERE ";

        foreach ($where as $key => $value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        // echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        if ($SQLEx > 0) {
            $Responce['Code'] = "1";
            $Responce['Msg'] = "Success";
            $Responce['Data'] = "1";
        } else {
            $Responce['Data'] = "0";
            $Responce['Code'] = "0";
            $Responce['Msg'] = "Try Again";
        }
        return $Responce;
    }
}
