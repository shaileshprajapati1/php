
<?php

class Controller
{

    function __construct(public $URL = "")
    {
        $this->URL = "http://localhost/PHP/php/Restaurant_Table_Reservation_System/";

        if(isset($_SERVER['PATH_INFO'])){
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/home.php");
                    include_once("Views/footer.php");
                    break;
                case '/login':
                    include_once("Views/login.php");
                    
                    break;
                case '/register':
                    include_once("Views/register.php");
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
}

$Controller = new Controller;
?>