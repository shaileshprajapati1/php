<?php
session_start();
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
                case '/admin':
                    if(!isset($_SESSION['userdata'])){
                     header("location:");
                    }
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/adminhomepage.php");

                    break;
                case '/delete':
                    $DeleteRes = $this->Delete("users",array("id"=>$_GET['userid']));
                    if($DeleteRes['Code'] == 1){
                       header("location:viewalluser");                        
                    }
                

                    break;
                case '/logout':
                    include_once("Views/admin/logout.php");
                

                    break;
                case '/edit':
                    $CityData = $this->Select("city");
                    $UpdateById = $this->Select("users",array("id"=>$_GET['userid']));
                    // echo "<pre>";
                    // print_r($CityData['Data']);
                    // echo "</pre>";

                    include_once("Views/admin/edituser.php");
                   

                    break;
                case '/adduser':
                    include_once("Views/admin/adduser.php");
                    if(isset($_POST['add'])){
                        $Hobbydata = implode(",",$_POST['hobby']);
                        // echo $Hobbydata;
                        array_pop($_POST);
                        array_pop($_POST);
                        array_pop($_POST);
                        array_pop($_POST);
                        $data = array_merge($_POST,array("hobby"=>$Hobbydata));
                        $AdduserRes = $this->Insert("users",$data);
                        
                        if($AdduserRes['Code'] == 1){
                            header("location:viewalluser");
                        }
                            // echo "<pre>";
                            // print_r($AdduserRes);
                            // echo "</pre>";
                    }
                                       

                    break;
                case '/viewalluser':
                    $viewalluserRes = $this->Select("users",array("role_id"=>"2"));
                    // echo "<pre>";
                    // print_r($viewalluserRes["Data"]);
                    // echo "<pre>";

                    

                    // exit;
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/viewalluser.php");
                   

                    break;
                case '/login':
                    include_once("Views/login.php");
                    if (isset($_POST['login'])) {
                        $LoginRes = $this->Login($_POST['username'], $_POST['password']);
                        if ($LoginRes['Code'] == 1) {
                            $_SESSION['userdata'] = $LoginRes['Data'];
                            if ($LoginRes['Data']->role_id == 1) {
                                echo    " <script>
                                alert('Hello Admin');
                                window.location.href='admin';
                                </script>";
                            } else {
                                echo    " <script>
                                alert('Login Success');
                                window.location.href='home';
                                </script>";
                            }
                        } else {
                            echo    " <script>
                                alert('Invalid user ');
                                
                                </script>";
                        }
                    }
                    echo "<pre>";
                    print_r($LoginRes);
                    echo "</pre>";
                    break;
                case '/register':
                    include_once("Views/register.php");
                    $HobbyData = implode(",", $_POST['hobby']);

                    if (isset($_POST['register'])) {
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['password2']);
                        unset($_POST['hobby']);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        $Data = array_merge($_POST, array("hobby" => $HobbyData));
                        // echo "<pre>";
                        // print_r($Data);
                        // echo "</pre>";
                        $InsertRes = $this->Insert("users", $Data);
                        if ($InsertRes['Data'] == 1) {
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
