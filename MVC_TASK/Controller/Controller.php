
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
require_once("Model/Model.php");
class Controller extends Model
{
    public $baseURL = "";
    function __construct()
    {
        ob_start();
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
                case '/addproduct':
                    if (isset($_POST['addproduct'])) {
                        array_pop($_POST);
                        $ProductTitleCheck = $this->Select("products", array("Title" => $_POST['Title']));

                        // echo "<pre>";
                        // print_r($_FILES);
                        // echo "</pre>";
                        $filename = $_FILES['Images']['name'];
                        $target_dir = "Uploads/";
                        $target_file = $target_dir . basename($_FILES["Images"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $allowedTypes = ['jpg', 'png', 'webp'];
                        if ($_FILES['Images']['error'] == 0) {
                            if (!in_array($imageFileType, $allowedTypes)) {
                                $msg = "Type is not allowed";
                            } // Check if file already exists
                            elseif (file_exists($target_file)) {
                                $msg = "Sorry, file already exists.";
                            } // Check file size
                            elseif ($_FILES["Images"]["size"] > 5000000) {
                                $msg = "Sorry, your file is too large.";
                            } elseif (move_uploaded_file($_FILES["Images"]["tmp_name"], $target_file)) {
                                $msg = "The file " . basename($_FILES["Images"]["name"]) . " has been uploaded.";
                            }
                        } else {
                            $filename = "defult.jpg";
                        }
                        $data = array_merge($_POST, array('Images' => $filename));


                        if ($ProductTitleCheck['Data']['0']->Title != $_POST['Title']) {
                            $ProductAddRes = $this->Insert("products", $data);
                            // echo "<pre>";
                            // print_r($ProductAddRes);
                            // echo "</pre>";
                            if ($ProductAddRes['Code'] == 1) {
                                echo  " <script>
                                alert('Product Add Successfully')
                             window.location.href='Allproduct'
                             </script>";
                            }
                        } else {
                            echo  " <script>
                                alert('Product AllReady Register')
                             </script>";
                        }
                    }
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/addproduct.php");
                    include_once("Views/admin/adminfooter.php");
                    break;
                case '/Allproduct':
                    $allproductRes = $this->Select("products");
                    // echo "<pre>";
                    // print_r($allproductRes);
                    // echo "</pre>";
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/Allproduct.php");
                    include_once("Views/admin/adminfooter.php");
                    break;
                case '/editproduct':
                    $EditProductRes = $this->Select("products", array("id" => $_GET['productid']));
                    // echo "<pre>";
                    // print_r($EditProductRes);
                    // echo "</pre>";

                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/editproduct.php");
                    include_once("Views/admin/adminfooter.php");
                    if (isset($_POST['updateproduct'])) {
                        array_pop($_POST);

                        $filename = $_FILES['Images']['name'];
                        $target_dir = "Uploads/";
                        $target_file = $target_dir . basename($_FILES["Images"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $allowedTypes = ['jpg', 'png', 'webp'];
                        if ($_FILES['Images']['error'] == 0) {
                            if (!in_array($imageFileType, $allowedTypes)) {
                                $msg = "Type is not allowed";
                            } // Check if file already exists
                            elseif (file_exists($target_file)) {
                                $msg = "Sorry, file already exists.";
                            } // Check file size
                            elseif ($_FILES["Images"]["size"] > 5000000) {
                                $msg = "Sorry, your file is too large.";
                            } elseif (move_uploaded_file($_FILES["Images"]["tmp_name"], $target_file)) {
                                $msg = "The file " . basename($_FILES["Images"]["name"]) . " has been uploaded.";
                            }
                        } else {
                            $filename = $_REQUEST['old_Images'];
                        }
                        unset($_POST['old_Images']);
                        $data = array_merge($_POST, array('Images' => $filename));
                        // echo "<pre>";
                        // print_r($data);
                        // echo "</pre>";
                        $UpdateProductRes = $this->Update("products",$data, array("id" => $_GET['productid']));
                        // echo "<pre>";
                        // print_r($UpdateProductRes);
                        // echo "</pre>";
                        if($UpdateProductRes['Code'] == 1){
                            header("location:Allproduct");
                        }

                    }

                    break;
                case '/deleteproduct':
                    $DeleteProductRes = $this->Delete("products", array("CategoryID" => $_GET['productcategoryid']));
                    if ($DeleteProductRes['Code'] == 1) {
                        echo  " <script>
                    alert('Delete Product Successfully')
                    window.location.href='Allproduct'
                    </script>";
                    }
                    break;
                case '/delete':
                    $DeleteRes = $this->Delete("users", array("id" => $_GET['userid']));
                    if ($DeleteRes['Code'] == 1) {
                        echo  " <script>
                    alert('Delete Successfully')
                    window.location.href='Allusers'
                    </script>";
                    }
                    break;
                case '/edit':
                    $UpdateRes = $this->Select("users", array("id" => $_GET['userid']));
                    // echo "<pre>";
                    // print_r($UpdateRes['Data'][0]);
                    // echo "</pre>";
                    include_once("Views/admin/adminheader.php");
                    include_once("Views/admin/edituser.php");
                    include_once("Views/admin/adminfooter.php");
                    if (isset($_POST['update'])) {
                        array_pop($_POST);
                        $Data = $_POST;
                        $UpdateDataRes = $this->Update("users", $Data, array("id" => $_GET['userid']));
                        // echo "<pre>";
                        // print_r($UpdateDataRes);
                        // echo "</pre>";
                        if ($UpdateDataRes['Code'] == 1) {
                            header("location:Allusers");
                        }
                    }

                    break;
                case '/Allusers':
                    $ViewallUsersRes = $this->Select("users", array("roll_id" => "2"));
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
                                // echo "<pre>";
                                // print_r($_SESSION['userdata'][0]->password);

                                // echo "</pre>";
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
                            } else {
                                echo  " <script>
                                    alert('Invalid Users')
                                    </script>";
                            }
                        } else {
                            echo  " <script>
                            alert('Enter valid Email And Password')
                           
                            </script>";
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
        ob_flush();
    }
}
$Controller = new Controller

?>