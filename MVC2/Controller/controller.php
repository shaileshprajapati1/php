<?php
require_once("Model/model.php");
class controller extends Model
{
    public $baseURL = "";
    public function __construct()
    {
        parent::__construct();
        //    echo "http://localhost/task/mvc2/assets/";
        //    $Arraytostr = $_SERVER['PHP_SELF'];
        $Arraytostr = explode("/", $_SERVER['PHP_SELF']);
        // echo "<pre>";
        // print_r($Arraytostr);
        // echo "</pre>";
        $this->baseURL = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
        foreach ($Arraytostr as $key => $value) {
            if ($value == "index.php") {
                break;
            } else {
                $this->baseURL .= $value . "/";
            }
        }

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/homepage.php");
                    include_once("Views/footer.php");

                    break;
                case '/about':
                    include_once("Views/header.php");
                    include_once("Views/about.php");
                    include_once("Views/footer.php");

                    break;
                case '/contact':
                    include_once("Views/header.php");
                    include_once("Views/contact.php");
                    include_once("Views/footer.php");

                    break;
                case '/login':
                    include_once("Views/login.php");
                    break;
                case '/register':
                    include_once("Views/register.php");
                    $HobbyData = implode(",",$_POST['hobby']);
                    
                    if(isset($_POST['register'])){
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['password2']);
                        unset($_POST['hobby']);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        $Data = array_merge($_POST,array("hobby"=>$HobbyData));
                        // echo "<pre>";
                        // print_r($Data);
                        // echo "</pre>";
                        $InsertRes = $this->Insert("users",$Data);
                        if($InsertRes['Data'] == 1){
                            echo "<script>
                            alert('Register Success!!');
                            window.location.href='login';
                            </script>";
                        } else {
                            "<script>
                            alert('Try Agian!!');
                           
                            </script>";
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
$controller = new controller;
