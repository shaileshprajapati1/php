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

                case '/registerbyapi':
                    $data = json_decode(file_get_contents('php://input'),true);
                    $InsertDatabyApiRes = $this->Insert("users", $data);
                 
                    echo json_encode($InsertDatabyApiRes);
                    break;
                case '/loginbyapi':
                    $LoginDatabyApiRes = $this->Select("users",array("email"=>$_POST['email'],"password"=>$_POST['password']));
                                 
                    echo json_encode($LoginDatabyApiRes);
                    break;
                case '/viewallusersapi':
                    $viewallDatabyApiRes = $this->Select("users",);
                                 
                    echo json_encode($viewallDatabyApiRes);
                    break;
                case '/edituserbyapi':
                    $EdituserApiRes = $this->Select("users",array("id"=>$_GET['id']));
                                 
                    echo json_encode($EdituserApiRes);
                    break;
                    // case '/home':
                    //     include_once("Views/header.php");
                    //     include_once("Views/home.php");

                    //     break;


                    // case '/logout':
                    //     session_destroy();
                    //     echo " <script>
                    //     alert('Logout Success');
                    //     window.location.href='login';
                    //     </script>";


                    //     break;
                    // case '/viewallusers':
                    //     $ViewUsers = $this->Select("users");
                    //     include_once("Views/header.php");
                    //     include_once("Views/viewallusers.php");

                    //     break;
                    // case '/edituser':
                    //     $Viewuser = $this->Select("users", array("id" => $_GET['userid']));
                    //     include_once("Views/header.php");
                    //     include_once("Views/edituser.php");
                    //     if (isset($_POST['update'])) {
                    //         array_pop($_POST);
                    //         $HobbyDataString = implode(",", $_POST['hobby']);
                    //         unset($_POST['hobby']);
                    //         $data = array_merge($_POST, array("hobby" => $HobbyDataString));
                    //         $UpdateUserRes = $this->Update("users", $data, array("id" => $_GET['userid']));
                    //         // echo "<pre>";
                    //         // print_r($UpdateUserRes);
                    //         // echo "</pre>";

                    //         if ($UpdateUserRes['Code'] == 1) {
                    //             echo " <script>
                    //                 alert('Data Update Success');
                    //                 window.location.href='viewallusers';
                    //                 </script>";
                    //         }
                    //     }
                    //     break;

                    // case '/deleteuser':
                    //     include_once("Views/header.php");
                    //     include_once("Views/viewallusers.php");
                    //     $DeleteUsers = $this->Delete("users", array("id" => $_GET['userid']));
                    //     if ($DeleteUsers['Code'] == 1) {
                    //         echo " <script>
                    //         alert('Data Delete Successfully');
                    //         window.location.href='viewallusers';
                    //         </script>";
                    //     }

                    //     break;

                    // case '/login':
                    //     include_once("Views/header.php");
                    //     include_once("Views/login.php");
                    //     if (isset($_POST['login'])) {
                    //         array_pop($_POST);
                    //         if ($_POST['email'] != "" && $_POST['passwrod'] != "") {
                    //             $LoginRes = $this->Select("users", array("email" => $_POST['email'], "passwrod" => $_POST['passwrod']));
                    //             if ($LoginRes['Code'] == 1) {
                    //                 $_SESSION['Userdata'] = $LoginRes['Data'];
                    //                 echo " <script>
                    //             alert('Login Success');
                    //             window.location.href='viewallusers';
                    //             </script>";
                    //             } else {
                    //                 echo " <script>
                    //             alert('Invalid User');
                    //             window.location.href='login';
                    //             </script>";
                    //             }
                    //         } else {
                    //             echo " <script>
                    //             alert('Enter Email And Password');
                    //             window.location.href='login';
                    //             </script>";
                    //         }
                    //     }

                    //     break;
                    // case '/register':
                    //     include_once("Views/header.php");
                    //     include_once("Views/register.php");
                    //     if (isset($_POST['register'])) {
                    //         array_pop($_POST);
                    //         $HobbyData = implode(",", $_POST['hobby']);
                    //         unset($_POST['hobby']);
                    //         // echo $HobbyData;
                    //         $data = array_merge($_POST, array("hobby" => $HobbyData));

                    //         $InsertRes = $this->Insert("users", $data);

                    //         // echo "<pre>";
                    //         // print_r($InsertRes);
                    //         // echo "</pre>";
                    //         if ($InsertRes['Code'] == 1) {
                    //             echo " <script>
                    //             alert('Data Added Success');
                    //             window.location.href='login';
                    //             </script>";
                    //         } else {
                    //             echo " <script>
                    //             alert('Data Added Fail');
                    //             window.location.href='register';
                    //             </script>";
                    //         }
                    //     }

                    //     break;

                default:
                    # code...
                    break;
            }
        } else {
            // header("location:home");
        }
    }
}
$Controller = new Controller;
