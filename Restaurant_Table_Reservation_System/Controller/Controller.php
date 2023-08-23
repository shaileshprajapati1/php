
<?php
session_start();
require_once("Model/Model.php");

class Controller extends Model
{

    function __construct(public $URL = "")
    {
        parent::__construct();
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
                    if(isset($_POST['register'])){
                        unset($_POST['register']);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        $InsertRes = $this->Insert("users",$_POST);
                        if($InsertRes['Code'] == 1){
                            echo "<script>
                            alert('You Are SuccessFully Sign Up !!!!')
                            window.location.href='login'
                            </script>";
                        }
                    }
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