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

                case '/allcountry':
                    $data = $this->select("country");
                    echo json_encode($data);
                    break;
                case '/allstates':
                    $data = $this->select("states",array("country_id"=>$_REQUEST['countryid']));
                    echo json_encode($data);
                    break;
                case '/allcities':
                    $data = $this->select("cities",array("state_id"=>$_REQUEST['stateid']));
                    echo json_encode($data);
                    break;
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
                    $viewuser = $this->select("users", array("id" => $_GET['userid'], "role_id" => "2"), array("cities" => "users.city = cities.cid ", "states" => "cities.state_id=states.sid", "country" => "states.country_id=country.country_id"));



                    $CityData = $this->select("cities");
                    $StatesData = $this->select("states");
                    $CountryData = $this->select("country");
                    // echo "<pre>";
                    // print_r($viewuser);
                    // echo "</pre>";
                    // exit;
                    include_once("Views/admin/edituser.php");
                    if (isset($_POST['update'])) {
                        $HobbyData = implode(",", $_POST['hobby']);


                        array_pop($_POST);
                        unset($_POST['hobby']);
                        // echo "<pre>";
                        // print_r($_FILES); 
                        // echo "</pre>";
                        $errors = array();
                        $file_name = $_FILES['profile_pic']['name'];
                        $file_size = $_FILES['profile_pic']['size'];
                        $file_tmp = $_FILES['profile_pic']['tmp_name'];
                        $file_type = $_FILES['profile_pic']['type'];
                        $exploded = explode('.', $_FILES['profile_pic']['name']);
                        $file_ext = strtolower(end($exploded));
                       

                        $extensions = array("jpeg", "jpg", "png");

                        if ($_FILES['profile_pic']['error'] == 0) {
                            if (in_array($file_ext, $extensions) === false) {
                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                            }

                            if ($file_size > 2097152) {
                                $errors[] = 'File size must be excately 2 MB';
                            }

                            if (empty($errors) == true) {
                                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                                echo "Success";
                            } else {
                                print_r($errors);
                            }
                        } else {
                            $file_name = $_REQUEST['old_profile_pic'];
                        }

                        unset($_POST['old_profile_pic']);
                        // unset($_REQUEST['profile_pic']);
                        $Data = array_merge($_POST, array("hobby" => $HobbyData, "profile_pic" => $file_name));
                        // echo "<pre>";
                        // print_r($Data);
                        // echo "</pre>";
                        // exit;
                        $UpdateRes = $this->Update("users", $Data, array("id" => $_GET['userid'], "role_id" => 2));
                        // echo "<pre>";
                        // print_r($UpdateRes);
                        // echo "</pre>";
                        if ($UpdateRes['code'] == 1) {
                            header("location:viewalluser");
                        }
                    }



                    break;
                case '/adduser':
                    include_once("Views/admin/adduser.php");
                    if (isset($_POST['add'])) {
                        $HobbyData = implode(",", $_POST['hobby']);
                        // echo $HobbyData;
                        $errors = array();
                        $file_name = $_FILES['profile_pic']['name'];
                        $file_size = $_FILES['profile_pic']['size'];
                        $file_tmp = $_FILES['profile_pic']['tmp_name'];
                        $file_type = $_FILES['profile_pic']['type'];
                        $exploded = explode('.', $_FILES['profile_pic']['name']);
                        $file_ext = strtolower(end($exploded));
                        // $file_ext = strtolower(end(explode('.', $_FILES['profile_pic']['name'])));

                        $extensions = array("jpeg", "jpg", "png");

                        if ($_FILES['profile_pic']['error'] == 0) {
                            if (in_array($file_ext, $extensions) === false) {
                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                            }

                            if ($file_size > 2097152) {
                                $errors[] = 'File size must be excately 2 MB';
                            }

                            if (empty($errors) == true) {
                                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                                echo "Success";
                            } else {
                                print_r($errors);
                            }
                        }



                        array_pop($_POST);
                        array_pop($_POST);
                        unset($_POST['cpassword']);
                        $Data = array_merge($_POST, array("hobby" => $HobbyData,"profile_pic"=>$file_name));
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
                        $HobbyData = implode(",", $_POST['hobby']);
                        array_pop($_POST);
                        unset($_POST['cpassword']);
                        // echo "<pre>";
                        // print_r($_FILES);
                        // echo "</pre>";
                        $errors = array();
                        $file_name = $_FILES['profile_pic']['name'];
                        $file_size = $_FILES['profile_pic']['size'];
                        $file_tmp = $_FILES['profile_pic']['tmp_name'];
                        $file_type = $_FILES['profile_pic']['type'];
                        $exploded = explode('.', $_FILES['profile_pic']['name']);
                        $file_ext = strtolower(end($exploded));
                        // $file_ext = strtolower(end(explode('.', $_FILES['profile_pic']['name'])));

                        $extensions = array("jpeg", "jpg", "png");

                        if ($_FILES['profile_pic']['error'] == 0) {
                            if (in_array($file_ext, $extensions) === false) {
                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                            }

                            if ($file_size > 2097152) {
                                $errors[] = 'File size must be excately 2 MB';
                            }

                            if (empty($errors) == true) {
                                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                                echo "Success";
                            } else {
                                print_r($errors);
                            }
                        }



                        $data = array_merge($_POST, array("hobby" => $HobbyData, "profile_pic" => $file_name));
                        // echo "<pre>";
                        // print_r($data);
                        // echo "</pre>";
                        // exit;
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
