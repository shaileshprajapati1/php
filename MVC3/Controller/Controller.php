<?php
session_start();
require_once("Model/Model.php");

class Controller extends Model
{

    function __construct(public $baseURL = null)
    {
        ob_start();
        parent::__construct();
        $this->baseURL = "http://localhost/PHP/php/MVC3/";
        // echo "<pre>";
        // print_r($_SERVER);
        // echo "</pre>";
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/home.php");
                    include_once("Views/footer.php");
                    break;
                case '/allcountry':
                    $data = $this->Select("country");
                    echo json_encode($data);
                    break;
                case '/allstates':
                    $data = $this->Select("states", array("country_id" => $_REQUEST['countryid']));
                    echo json_encode($data);
                    break;
                case '/allcities':
                    $data = $this->Select("cities", array("state_id" => $_REQUEST['stateid']));
                    echo json_encode($data);
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
                case '/admin':
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/admindashboard.php");
                    include_once("Views/admin/adminfooter.php");
                    break;
                case '/deleteuser':
                    $DeleteRes = $this->Delete("users",array("id"=>$_GET['userid']));
                    // echo "<pre>";
                    // print_r($DeleteRes);
                    // echo "</pre>";
                    if($DeleteRes["Data"] == 1){
                                       
                        header("location:viewalluser");
                    }
                    break;
                case '/adduser':
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/adduser.php");
                    include_once("Views/admin/adminfooter.php");
                    if (isset($_POST["adduser"])) {
                        $HobbyData = implode(",", $_POST['hobby']);
                        // echo $HobbyData;
                        array_pop($_POST);
                        unset($_POST["country"], $_POST["state"], $_POST["hobby"]);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        $data = array_merge($_POST, array("hobby" => $HobbyData));
                        // echo "<pre>";
                        // print_r($data);
                        // echo "</pre>";
                        $AddRes = $this->Insert("users", $data);
                        print_r($AddRes);
                        if ($AddRes["Data"] == 1) {
                            header("location:viewalluser");
                        }
                    }
                    break;
                case '/viewalluser':
                    $viewallusers = $this->Select("users", array("role_id" => 2));
                    // echo "<pre>";
                    // print_r($viewallusers);
                    //  echo "</pre>";
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/viewalluser.php");
                    include_once("Views/admin/adminfooter.php");
                    break;
                case '/edituser':
                    $ViewUserRes = $this->Select("users",array("id"=>$_GET['userid'])); 
                    $AllCityData = $this->Select("Cities") ;
                    // echo "<pre>";
                    // print_r($AllCityData);
                    // echo "</pre>";
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/edituser.php");
                    include_once("Views/admin/adminfooter.php");
                    if(isset($_POST['update'])){
                        $HobbyData = implode(",",$_POST['hobby']);
                        // echo $HobbyData;
                        array_pop($_POST);
                        unset($_POST['country'],$_POST["state"],$_POST['hobby']);
                        $data = array_merge($_POST,array("hobby"=>$HobbyData));
                        $UpdateRes = $this->Update("users",$data,array("id"=>$_GET['userid']));

                        // echo "<pre>";
                        // print_r($UpdateRes);
                        // echo "</pre>";
                        if($UpdateRes['Data'] == 1){
                            header("location:viewalluser");
                        }
                    }
                    break;
                case '/logout':
                    session_destroy();
                    header("location:login");
                    break;
                case '/login':
                    include_once("Views/login.php");
                    if (isset($_POST['login'])) {
                        if ($_POST['username'] !== "" && $_POST['password'] !== "") {
                            $LoginRes = $this->Select("users", array("username" => $_POST['username'], "password" => $_POST['password']));
                            // echo "<pre>";
                            // print_r($LoginRes);
                            // echo "</pre>";
                            if ($LoginRes['Code'] == 1) {
                                $_SESSION['userdata'] = $LoginRes['Data'];
                                if ($LoginRes['Data'][0]->role_id == 1) {
                                    echo "<script>
                                    alert('Hello Admin');
                                    window.location.href='admin';
                                    </script>";
                                } else {
                                    echo "<script>
                                    alert('Login Success');
                                    window.location.href='home';
                                    </script>";
                                }
                            } else {
                                echo "<script>
                                alert('Invalid User');
                                    </script>";
                            }
                        } else {
                            echo "<script>
                            alert('Enter username and password');
                                </script>";
                        }
                    }
                    break;
                case '/register':
                    include_once("Views/register.php");
                    if (isset($_POST['register'])) {
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";

                        array_pop($_POST);
                        unset($_POST['country'], $_POST['state']);
                        $HobbyData = implode(",", $_POST['hobby']);
                        // echo $HobbyData;
                        array_pop($_POST);
                        $Data = array_merge($_POST, array("hobby" => $HobbyData));

                        $InsertRes = $this->Insert("users", $Data);
                        // print_r($InsertRes);
                        if ($InsertRes["Code"] == 1) {
                            header("location:login");
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
