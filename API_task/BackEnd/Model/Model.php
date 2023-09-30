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

    function Select($tbl,$where=null){
        
    }
}
