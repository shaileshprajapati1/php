<?php
session_start();
require_once("Model/Model.php");

class Controller extends Model
{

    function __construct()
    {
        parent::__construct();
        //    echo "<pre>";
        //    print_r($_SERVER);
        //    echo "</pre>";
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("Views/header.php");
                    include_once("Views/home.php");

                    break;
                case '/logout':
                    session_destroy();
                    echo " <script>
                    alert('Logout Success');
                    window.location.href='login';
                    </script>";


                    break;
                case '/viewallusers':
                    $ViewUsers = $this->Select("users");
                    include_once("Views/header.php");
                    include_once("Views/viewallusers.php");

                    break;
                case '/edituser':
                 $Viewuser =$this->Select("users",array("id"=>$_GET['userid']));
                    include_once("Views/header.php");
                    include_once("Views/edituser.php");

                    break;

                case '/login':
                    include_once("Views/header.php");
                    include_once("Views/login.php");
                    if (isset($_POST['login'])) {
                        array_pop($_POST);
                        if ($_POST['email'] != "" && $_POST['passwrod'] != "") {
                            $LoginRes = $this->Select("users", array("email" => $_POST['email'], "passwrod" => $_POST['passwrod']));
                            if ($LoginRes['Code'] == 1) {
                                $_SESSION['Userdata'] = $LoginRes['Data'];
                                echo " <script>
                            alert('Login Success');
                            window.location.href='viewallusers';
                            </script>";
                            } else {
                                echo " <script>
                            alert('Invalid User');
                            window.location.href='login';
                            </script>";
                            }
                        } else {
                            echo " <script>
                            alert('Enter Email And Password');
                            window.location.href='login';
                            </script>";
                        }
                    }

                    break;
                case '/register':
                    include_once("Views/header.php");
                    include_once("Views/register.php");
                    if (isset($_POST['register'])) {
                        array_pop($_POST);
                        $HobbyData = implode(",", $_POST['hobby']);
                        unset($_POST['hobby']);
                        // echo $HobbyData;
                        $data = array_merge($_POST, array("hobby" => $HobbyData));

                        $InsertRes = $this->Insert("users", $data);

                        // echo "<pre>";
                        // print_r($InsertRes);
                        // echo "</pre>";
                        if ($InsertRes['Code'] == 1) {
                            echo " <script>
                            alert('Data Added Success');
                            window.location.href='login';
                            </script>";
                        } else {
                            echo " <script>
                            alert('Data Added Fail');
                            window.location.href='register';
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
