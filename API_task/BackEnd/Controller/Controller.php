<?php
require_once("Model/Model.php");
class Controller extends Model
{

    function __construct()
    {
        parent::__construct();
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/alldata':
                    $AllData = $this->Select("users");
                    echo json_encode($AllData);
                    break;
                case '/checkemail':
                    $checkmail = $this->Select("users",array("email"=>$_REQUEST['email']));
                    // echo "<pre>";
                    // print_r($checkmail);
                    // exit;
                    echo json_encode($checkmail);
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
}

$Controller = new Controller;
