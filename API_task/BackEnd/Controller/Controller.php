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
                    $checkmail = $this->Select("users", array("email" => $_REQUEST['email']));
                    // echo "<pre>";
                    // print_r($checkmail);
                    // exit;
                    echo json_encode($checkmail);
                    break;
                case '/checkvalidation':
                    if (isset($_GET['username'])) {
                        $checkinput = $this->Select("users", array("username" => $_REQUEST['username']));
                    } else if (isset($_GET['email'])) {
                        $checkinput = $this->Select("users", array("email" => $_REQUEST['email']));
                    } else{
                        $checkinput = $this->Select("users", array("phone" => $_REQUEST['phone']));
                    }
                    
                    echo json_encode($checkinput);
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
}

$Controller = new Controller;
