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
}
