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
            "/" . $StrtoArray[1] . "/" . $StrtoArray[2] . "/" . $StrtoArray[3] . "/" . "Assest" . "/";
        // echo $this->baseURL;

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/getalltododata':
                    $Data = $this->select("todo");
                    echo json_encode($Data);
                    break;
                case '/addtodo':
                    $Data = json_decode(file_get_contents('php://input'), true);
                    print_r($Data);
                    $Res = $this->Insert("todo",array("title"=>$Data["title"],"status"=>"pending"));
                    // echo json_encode($Data);
                    break;
                case '/selecttodobyid':
                    $Data = $this->select("todo",array("id"=>$_REQUEST["todoid"]));
                    echo json_encode($Data);
                    break;
                case '/updatebyid':
                    $Data = json_decode(file_get_contents('php://input'), true);
                    $Res = $this->update("todo",array("title"=>$Data['title'],"status"=>"complate"), array("id" => $_REQUEST['todoid']));
                    echo json_encode($Res);
                    break;
                case '/deletebyid':
                    $Res = $this->Delete("todo", array("id" => $_REQUEST['todoid']));
                    echo json_encode($Res);
                    break;
                case '/allusers':
                    $Allusers = $this->select("users");
                    echo json_encode($Allusers);
                    break;
                case '/login':
                    $Loginres = $this->Login($_REQUEST['username'], $_REQUEST['password']);
                    echo json_encode($Loginres);
                    break;
                case '/Allcountries':
                    $Data = $this->select("country");
                    echo json_encode($Data);
                    break;
                case '/allstates':
                    $Data = $this->select("states", array("country_id" => $_REQUEST['countryid']));
                    echo json_encode($Data);
                    break;
                case '/allcities':
                    $Data = $this->select("cities", array("state_id" => $_REQUEST['statesid']));
                    echo json_encode($Data);
                    break;
                case '/uploadimage':
                    $filename = $_FILES["profile_pic"]["name"];
                    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "uploads/" . $filename);
                    echo json_encode($filename);
                    break;
                case '/register':
                    $Data = json_decode(file_get_contents('php://input'), true);
                    print_r($Data);
                    // $Res = $this->Insert("users",$Data);
                    // print_r($Res);

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

                    $UpdateByIdRes = $this->select("users", array("id" => $_GET['userid'], "role_id" => "2"), array("cities" => "users.city = cities.cid ", "states" => "cities.state_id=states.sid", "country" => "states.country_id=country.country_id")); //,array("cities"=>"users.city=cities.cid","states"=>"cities.state_id=states.sid","country"=>"states.country_id=country.id")
                    $CityData = $this->select("cities");
                    $StatesData = $this->select("states");
                    $CountryData = $this->select("country");

                    // echo "<pre>";
                    // print_r($UpdateByIdRes);
                    // echo "</pre>";
                    // echo "<pre>";
                    // print_r($CityData);
                    // echo "</pre>";
                    // exit;
                    include_once("Views/admin/header.php");
                    include_once("Views/admin/updateuser.php");
                    include_once("Views/admin/footer.php");
                    if (isset($_POST['Update'])) {
                        $filename = $_FILES["profile_pic"]["name"];
                        $Uploadfile = "uploads/" . $filename;
                        $uploadOk = 1;
                        $Error = 0;
                        $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                        // $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
                        // if ($check !== false) {
                        //     echo "File is an image - " . $check["mime"] . ".";
                        //     $uploadOk = 1;
                        // } else {
                        //    
                        //     // echo "File is not an image.";
                        //     $uploadOk = 0;
                        // }


                        // Check if file already exists
                        if (file_exists($filename)) {
                            echo "Sorry, file already exists.";
                            $uploadOk = 0;
                        }

                        // Check file size
                        if ($_FILES["profile_pic"]["size"] > 1000) {
                            echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }

                        // Allow certain file formats
                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                        } else {
                            if ($UploadefileRes = move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $Uploadfile)) {
                                echo "The file " . htmlspecialchars($_FILES["profile_pic"]["name"]) . " has been uploaded.";
                            } else {


                                echo "Sorry, there was an error uploading your file.";
                            }
                        }






                        $HobbyData = implode(",", $_POST['hobby']);
                        // echo $HobbyData;
                        // echo "<pre>"; 
                        // print_r($_POST);
                        // echo "<pre>";
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['old_profile_pic']);
                        $Data = array_merge($_POST, array("hobby" => $HobbyData, "profile_pic" => $filename));
                        echo "<pre>";
                        print_r($Data);
                        echo "<pre>";

                        $UpadateRes = $this->update("users", $Data, array("id" => $_GET['userid']));
                        echo "<pre>";
                        print_r($UpadateRes);
                        echo "<pre>";
                        if ($UpadateRes['Code'] == 1) {
                            header("location:viewallusers");
                        }
                    }


                    break;
                case '/deleteuser':
                    $DeleteRes = $this->Delete("users", array("id" => $_GET['userid']));
                    if ($DeleteRes['Code'] == 1) {
                        header("location:viewallusers");
                    }
                    break;
                case '/logout':
                    session_destroy();
                    header("location:login");
                    break;
                case '/viewallusers':
                    $Allusers = $this->select("users", array("role_id" => "2"), array("cities" => "users.city = cities.cid ", "states" => "cities.state_id=states.sid", "country" => "states.country_id=country.country_id"));
                    // echo "<pre>";
                    // print_r($Allusers);
                    // exit;
                    include_once("Views/admin/header.php");
                    include_once("Views/admin/viewallusers.php");
                    include_once("Views/admin/footer.php");
                    if (isset($_POST['Adduser'])) {


                        $fullname = $_POST['fname'] . " " . $_POST['lname'];

                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "<pre>";
                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['fname']);
                        unset($_POST['lname']);
                        unset($_POST['profile_pic']);

                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "<pre>";
                        $data = array_merge($_POST, array("fullname" => $fullname, "hobby" => $HobbyData));

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
                    // case '/register':
                    //     // include_once("Views/header.php");
                    //     include_once("Views/register.php");
                    //     if (isset($_POST['register'])) {
                    //         // echo "<pre>";
                    //         // print_r($_FILES);
                    //         // echo "</pre>";

                    //         $filename = $_FILES["profile_pic"]["name"];
                    //         $Uploadfile = "uploads/" . $filename;
                    //         $uploadOk = 1;
                    //         $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    //         $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
                    //         if ($check !== false) {
                    //             echo "File is an image - " . $check["mime"] . ".";
                    //             $uploadOk = 1;
                    //         } else {
                    //             echo "File is not an image.";
                    //             $uploadOk = 0;
                    //         }


                    //         // Check if file already exists
                    //         if (file_exists($filename)) {
                    //             echo "Sorry, file already exists.";
                    //             $uploadOk = 0;
                    //         }

                    //         // Check file size
                    //         if ($_FILES["profile_pic"]["size"] > 500000) {
                    //             echo "Sorry, your file is too large.";
                    //             $uploadOk = 0;
                    //         }

                    //         // Allow certain file formats
                    //         if (
                    //             $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    //             && $imageFileType != "gif"
                    //         ) {
                    //             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    //             $uploadOk = 0;
                    //         }

                    //         // Check if $uploadOk is set to 0 by an error
                    //         if ($uploadOk == 0) {
                    //             echo "Sorry, your file was not uploaded.";
                    //             // if everything is ok, try to upload file
                    //         } else {
                    //             if ($UploadefileRes = move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $Uploadfile)) {
                    //                 echo "The file " . htmlspecialchars($_FILES["profile_pic"]["name"]) . " has been uploaded.";
                    //             } else {
                    //                 echo "Sorry, there was an error uploading your file.";
                    //             }
                    //         }

                    //         // exit;
                    //         $fullname = $_POST['fname'] . " " . $_POST['lname'];
                    //         echo $fullname;
                    //         // echo "<pre>";
                    //         // print_r($_POST);
                    //         // echo "<pre>";
                    //         $HobbyData = implode(",", $_REQUEST['hobby']);
                    //         array_pop($_POST);
                    //         array_pop($_POST);
                    //         unset($_POST['fname']);
                    //         unset($_POST['lname']);
                    //         unset($_POST['hobby'], $_POST['re-password']);


                    //         // echo "<pre>";
                    //         // print_r($_POST);
                    //         // echo "<pre>";
                    //         $data = array_merge($_POST, array("fullname" => $fullname, "hobby" => $HobbyData, "profile_pic" => $filename, "password" => md5($_POST['password'])));
                    //         unset($_POST['password']);
                    //         // echo "<pre>";
                    //         // print_r($data);
                    //         // echo "<pre>";

                    //         // exit;
                    //         $Insertres = $this->Insert("users", $data);
                    //         // print_r($Insertres);
                    //         if ($Insertres['Data']) {
                    //             echo " <script>
                    //             alert('Register Success!!');
                    //             window.location.href='login';
                    //             </script>";
                    //         }
                    //     }

                    //     break;

                    // default:
                    //     # code...
                    //     break;
            }
        } else {
            header("location:home");
        }
        ob_flush();
    }
}
$controller = new controller;
