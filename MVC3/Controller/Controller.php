<?php

require_once("Model/Model.php");

class Controller extends Model {

    function __construct( public $baseURL = null)
    {
        parent::__construct();
        $this->baseURL = "http://localhost/PHP/php/MVC3/";
        // echo "<pre>";
        // print_r($_SERVER);
        // echo "</pre>";
        if(isset($_SERVER['PATH_INFO'])){
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/home.php");
                    include_once("Views/footer.php");
                    break;
                case '/contact':
                    include_once("Views/header.php");
                    include_once("Views/contact.php");
                    include_once("Views/footer.php");
                    break;
                case '/about':
                    include_once("Views/header.php");
                    include_once("Views/about.php");
                    include_once("Views/footer.php");
                    break;
                case '/courses':
                    include_once("Views/header.php");
                    include_once("Views/courses.php");
                    include_once("Views/footer.php");
                    break;
                case '/register':
                    include_once("Views/register.php");
                    if(isset($_POST['register'])){
                        echo "<pre>";
                        print_r($_POST);
                        echo "</pre>";
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            header("location:home");
        }
    }




}
$Controller = new Controller;


?>