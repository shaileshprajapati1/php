<?php

class Controller {

    function __construct( public $baseURL = null)
    {
        $this->baseURL = "http://localhost/PHP/php/MVC3/Assest/";
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
                case '/register':
                    include_once("Views/header.php");
                    include_once("Views/register.php");
                    include_once("Views/footer.php");
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            // header("location:home");
        }
    }




}
$Controller = new Controller;


?>