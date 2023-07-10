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
            "/" . $StrtoArray[1] . "/" . $StrtoArray[2] . "/" . $StrtoArray[3] ."/" . "Assest" . "/";
        // echo $this->baseURL;

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
                case '/admin':
                    include_once("Views/admin/header.php");
                    include_once("Views/admin/dashboard.php");
                    include_once("Views/admin/footer.php");
                    break;
                
                case '/eidituser':
                $UpdateByIdRes = $this->select("users",array("id"=>$_GET['userid'],"role_id"=>"2"));
                $CityData = $this->select("city");

                    // echo "<pre>";
                    // print_r($UpdateByIdRes['Data'][0]->cityid );
                    // echo "</pre>";
                    // exit;
                    include_once("Views/admin/header.php");
                    include_once("Views/admin/updateuser.php");
                    include_once("Views/admin/footer.php");
                    // if(isset($_POST['update'])){
                    //     array_pop($_POST);
                    //     // echo "<pre>"; 
                    //     // print_r($_POST);
                    //     // echo "<pre>";
                    //     $Data = $_POST;
                    // $UpadateRes = $this->update("users",$Data,array("id"=>$_GET['userid']));
                    
                    // if($UpadateRes['Code'] == 1 ){
                    //     header("location:viewallusers");
                        
                    // }
                       
                    // }

                    
                    break;
                case '/deleteuser':
                    $DeleteRes = $this->Delete("users",array("id"=>$_GET['userid']));
                    if($DeleteRes['Code'] == 1){
                        header("location:viewallusers");
                    }
                    break;
                case '/viewallusers':
                    $Allusers = $this->select("users",array("role_id"=>"2"));
                    // echo "<pre>";
                    // print_r($Allusers);
                    // exit;
                    include_once("Views/admin/header.php");
                    include_once("Views/admin/viewallusers.php");
                    include_once("Views/admin/footer.php");
                    if(isset($_POST['Adduser'])){
                        $fullname = $_POST['fname'] . " " . $_POST['lname'];
                        
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "<pre>";
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['fname']);
                        unset($_POST['lname']);

                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "<pre>";
                        $data = array_merge($_POST, array("fullname" => $fullname));
                        // echo "<pre>";
                        // print_r($data);
                        // echo "<pre>";


                        $Insertres = $this->Insert("users", $data);
                        // print_r($Insertres);
                        if ($Insertres['Code'] == 1) {
                            header("location:viewallusers");
                        }
                    }
                    break;
                case '/login':
                    // include_once("Views/header.php");
                    include_once("Views/login.php");
                    if (isset($_POST['login'])) {
                        $Loginres = $this->Login($_POST['username'], $_POST['password']);

                        // echo "<pre>";
                        // print_r($Loginres);
                        // echo "</pre>";
                        // exit;
                        if ($Loginres['Code'] == 1) {
                            $_SESSION['userdata']  = $Loginres['Data'];
                            if ($Loginres['Data']->role_id == 1) {
                                echo    "<script>
                            alert('Hello Admin');
                            window.location.href='admin';
                             </script>";
                            } else {
                                echo    "<script>
                            alert('Login Success');
                            window.location.href='home';
                             </script>";
                            }
                        } else {
                            echo    "<script>
                        alert('Invalid user');
                         </script>";
                        }
                    }

                    break;
                case '/register':
                    // include_once("Views/header.php");
                    include_once("Views/register.php");
                    if (isset($_POST['register'])) {
                        $fullname = $_POST['fname'] . " " . $_POST['lname'];
                        echo $fullname;
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "<pre>";
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['fname']);
                        unset($_POST['lname']);

                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "<pre>";
                        $data = array_merge($_POST, array("fullname" => $fullname));
                        // echo "<pre>";
                        // print_r($data);
                        // echo "<pre>";


                        $Insertres = $this->Insert("users", $data);
                        // print_r($Insertres);
                        if ($Insertres['Data']) {
                            echo " <script>
                            alert('Register Success!!');
                            window.location.href='login';
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
$controller = new controller;
