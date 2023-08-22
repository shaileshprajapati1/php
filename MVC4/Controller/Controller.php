

<?php
session_start();
require("Model/Model.php");

class Controller extends Model
{

    public $baseURL = "";
    function __construct()
    {
        parent::__construct();
        $this->baseURL = "http://localhost/php/php/MVC4/public/";


        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/homepage.php");
                    include_once("Views/footer.php");

                    break;

                case '/login':
                    include_once("Views/login.php");
                    if (isset($_POST['login'])) {
                        $LoginRes = $this->Login($_POST['username'], $_POST['password']);

                        if ($LoginRes['Code'] == 1) {
                            $_SESSION['userdata'] = $LoginRes['Data'];
                            // echo "<pre>";
                            // print_r($_SESSION['userdata']);
                            // echo "</pre>";
                            header("location:home");
                        } else {
                            echo  "<script>
                            alert('Invalid User');
                            </script>";
                                                     
                        }
                    }


                    break;
                case '/register':
                    include_once("Views/register.php");
                    if (isset($_POST['register'])) {
                        array_pop($_POST);
                        $Data = $_POST;
                        $InsertRes = $this->Insert("users", $Data);
                        // echo "<pre>";
                        // print_r($InsertRes);
                        // echo "</pre>";
                        if ($InsertRes['Code'] == 1) {
                            echo " <script>
                            alert('User Register Success');
                            window.location.href='login';
                            </script>";
                            // header("location:login");
                        }
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