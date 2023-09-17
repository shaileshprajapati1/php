
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
require_once("Model/Model.php");
class Controller extends Model
{
    public $baseURL = "";
    function __construct()
    {
        parent::__construct();
        $this->baseURL = "http://localhost/php/php/MVC_TASK/public/";

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include("Views/header.php");
                    include("Views/home.php");
                    include("Views/footer.php");
                    break;
                case '/admin':
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/admindashboard.php");
                    include_once("Views/admin/adminfooter.php");
                    break;
                case '/Allusers':
                    $ViewallUsersRes = $this->Select("users",array("roll_id"=>"2"));
                    // echo "<pre>";
                    // print_r($ViewallUsersRes['Data']);
                    // echo "</pre>";
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/allusers.php");
                    include_once("Views/admin/adminfooter.php");
                    break;
                case '/logout':
                  session_destroy();
                  header("location:login");

                    break;
                case '/register':
                    include("Views/register.php");
                    if (isset($_POST['register'])) {
                        array_pop($_POST);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        $Emailcheck = $this->Select("users", array("email" => $_POST['email']));
                        // echo "<pre>";
                        // print_r($Emailcheck['Data'][0]->email);
                        // echo "</pre>";
                        // exit;
                        $password = md5($_POST['password']);
                        $cpassword = md5($_POST['cpassword']);
                        unset($_POST['password'], $_POST['cpassword']);
                        $data = array_merge($_POST, array("password" => $password, 'cpassword' => $cpassword));
                        if ($password == $cpassword) {
                            if ($Emailcheck['Data'][0]->email != $_POST['email']) {
                                $InsertRes = $this->Insert("users", $data);
                                if ($InsertRes['Code'] == 1) {
                                    echo  " <script>
                                         alert('User Registration Successfully')
                                         window.location.href='login'
                                         </script>";
                                }
                            } else {
                                echo  " <script>
                                 alert('User Email Allreday Register');
                                 </script>";
                            }
                        } else {
                            echo  " <script>
                                 alert('Enter Correct Confrom Password');
                                 </script>";
                        }
                        // echo "<pre>";
                        // print_r($InsertRes);
                        // echo "</pre>";

                    }
                    break;
                case '/login':
                    include("Views/login.php");
                    if (isset($_POST['login'])) {
                        if ($_POST['email'] != "" && $_POST['password'] != "") {
                            $LoginRes = $this->Select("users", array("email" => $_POST['email'], "password" => md5($_POST['password'])));
                            if ($LoginRes['Code'] == 1) {
                                $_SESSION['userdata'] = $LoginRes['Data'];
                                $name = $_SESSION['userdata'][0]->name;
                                if ($LoginRes['Data'][0]->roll_id == 1) {
                                    echo  " <script>
                                    alert('Welcome $name')
                                    window.location.href='admin'
                                    </script>";
                                } else {
                                    echo  " <script>
                                    alert('Welcome $name')
                                    window.location.href='home'
                                    </script>";
                                }
                            }
                            // echo "<pre>";
                            // print_r($_SESSION['userdata'][0]->name);
                            // echo "</pre>";
                        }
                    }

                    break;
                case '/mobile':
                    // include("Views/header.php");
                    include("Views/mobile.php");
                    if (isset($_POST['addphone'])) {
                        array_pop($_POST);
                        echo "<pre>";
                        print_r($_POST);
                        echo "</pre>";
                    }
                    // include("Views/footer.php");
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
$Controller = new Controller

?>