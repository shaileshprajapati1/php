<?php
session_start();
require_once("Model/Model.php");

class controller extends Model
{
    public $baseURL = "";
    public function __construct()
    {
        ob_start();
        parent::__construct();
        // echo "<pre>";
        // print_r($_SERVER);

        // echo "<pre>";
        // echo  $this->baseURL = "http://localhost/task/MVC/home";
        $StrtoArray = explode("/", $_SERVER['PHP_SELF']);
        // print_r($StrtoArray);
        // echo "<br>";
        $this->baseURL = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] .
            "/" . $StrtoArray[1] . "/" . $StrtoArray[2] . "/" . $StrtoArray[3] . "/" . "Assest" . "/";
        // echo $this->baseURL;

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                // case '/getalltododata':
                //     $Data = $this->select("todo");
                //     echo json_encode($Data);
                //     break;
                case '/addtodo':
                   $data = json_decode(file_get_contents("php://input"), true);
                   $Data = $this->insert("todo",array("title"=> $data['title'],"status"=>"Pending"));
                   echo json_encode($Data);
                    break;
            }
        } else {
            header("location:home");
        }
        ob_flush();
    }
}
$controller = new controller;
