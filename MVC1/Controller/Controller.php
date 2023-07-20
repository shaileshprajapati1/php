<?php

session_start();
require_once("Model/Model.php");
class Controller extends Model
{

    public function __construct(public $baseURL = "")
    {
        ob_start();
        parent::__construct();

        $StrtoString = explode("/", $_SERVER['PHP_SELF']);

        $this->baseURL = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
        foreach ($StrtoString as $key => $value) {
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
                    include_once("Views/home.php");
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
                case '/services':
                    include_once("Views/header.php");
                    include_once("Views/services.php");
                    include_once("Views/footer.php");
                    break;
                case '/admindashboard':
                    include_once("Views/admin/header.php");
                    include_once("Views/admin/home.php");
                    include_once("Views/admin/footer.php");

                    break;
                case '/deleteuser':
                    $DeleteRes = $this->Delete("users", array("id" => $_GET['userid']));
                    if ($DeleteRes['code'] == 1) {
                        header("location:viewalluser");
                    }

                    break;
                case '/logout':

                    session_destroy();
                    header("location:login");
                    break;
                case '/edituser':
                    $viewuser = $this->select(
                        "users",
                        array("id" => $_GET['userid'], "role_id" => "2"),
                        array(
                            "cities" => "users.city=cities.cid",
                            "states" => "cities.state_id=states.sid",
                            "country" => "states.country_id=country.country_id"
                        )
                    );
                        $CityData = $this->select("cities");
                        $StatesData = $this->select("states");
                        $CountryData = $this->select("country");
                    // echo "<pre>";
                    // print_r($viewuser);
                    // echo "</pre>";
                    // exit;
                    include_once("Views/admin/edituser.php");
                    if(isset($_POST['update'])){
                        $HobbyData = implode(",",$_POST['hobby']);
                        array_pop($_POST);
                        unset($_POST['hobby']);
                        $Data = array_merge($_POST,array("hobby"=>$HobbyData));
                        // echo "<pre>";
                        // print_r($Data);
                        // echo "</pre>";
                        $UpdateRes = $this->Update("users",$Data,array("id"=>$_GET['userid'],"role_id"=>2));
                        echo "<pre>";
                        print_r($UpdateRes);
                        echo "</pre>";
                        if($UpdateRes['code'] ==1){
                            header("location:viewalluser");
                        }

                    }

            

                    break;
                case '/adduser':
                    include_once("Views/admin/adduser.php");
                    if (isset($_POST['add'])) {
                        $HobbyData = implode(",", $_POST['hobby']);
                        // echo $HobbyData;
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['cpassword']);
                        $Data = array_merge($_POST, array("hobby" => $HobbyData));
                        $AdduserRes = $this->Insert("users", $Data);
                        echo "<pre>";
                        print_r($AdduserRes);
                        echo "</pre>";

                        if ($AdduserRes['code'] == 1) {
                            header("location:viewalluser");
                        }
                    }


                    break;
                case '/viewalluser':

                    $Alluser = $this->select("users", array("role_id" => "2"));
                    // echo "<pre>";
                    // print_r($Alluser);

                    include_once("Views/admin/header.php");
                    include_once("Views/admin/viewalluser.php");
                    include_once("Views/admin/footer.php");
                    break;

                case '/login':
                    include_once("Views/login.php");
                    if (isset($_POST['login'])) {
                        $loginRes = $this->Login($_POST['username'], $_POST['password']);
                        // echo "<pre>";
                        // print_r($loginRes);
                        // echo "<pre>";
                        // exit;
                        if ($loginRes['code'] == 1) {
                            $_SESSION['userdata'] = $loginRes['data'];
                            if ($loginRes['data']->role_id == 1) {
                                echo " <script>
                            alert('Hello Admin');
                            window.location.href='admindashboard';
                            </script>";
                            } else {
                                echo " <script>
                            alert('Login Success');
                            window.location.href='home';
                            </script>";
                            }
                        } else {
                            echo " <script>
                             alert('Invalid User');
                           
                            </script>";
                        }
                    }
                    break;
                case '/register':
                    include_once("Views/register.php");
                    if (isset($_POST['register'])) {

                        array_pop($_POST);
                        unset($_POST['cpassword']);
                        print_r($_POST);
                        $data = $_POST;
                        $InsertRes = $this->Insert("users", $data);
                        if ($InsertRes['data'] == 1) {
                            echo " <script>
                            alert('Register Success !!!');
                            window.location.href='login';
                            </script>";
                        } else {
                            echo " <script>
                            alert('Try Again !!!');
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
        ob_flush();
    }
}

$Controller = new Controller;
