<?php
error_reporting(0);
require_once("Model/Model.php");

class Controller extends Model
{

    function __construct()
    {
        parent::__construct();

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    $menures = $this->Select("menu", array("menu_status" => 'Enable'));
                    // echo "<pre>";
                    // print_r($menures['Data']);
                    // echo "</pre>";
                    $submenuRes = $this->Select("sub_menu", array("submenu_status" => 'Enable',"menu_id"=> $menures['Data'][0]->menu_id,"submenu_display"=>"Yes" )); //,"submenu_order"=>"ORDER BY submenu_order ASC "
                    include_once("Views/header.php");
                    include_once("Views/home.php");
                    include_once("Views/footer.php");

                    break;
                case '/Addmenu':
                    $MenuViewRes = $this->Select("menu", array("menu_status" => 'Enable'));

                    // echo "<pre>";
                    // print_r($MenuViewRes['Data']);
                    // echo "</pre>";


                    if (isset($_POST['addmenu'])) {
                        array_pop($_POST);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        if ($_POST['menu_name'] != "") {
                            $InsertMenuRes = $this->Insert("menu", $_POST);
                            if ($InsertMenuRes['Code'] == 1) {
                                echo " <script>
                                alert('Menu is added Successfully.');
                                window.location.href = 'Addmenu';
                                </script>";
                            }
                        } else {
                            echo 'Enter Menu Name';
                        }
                    }

                    include_once("Views/header.php");
                    include_once("Views/Addmenu.php");
                    include_once("Views/footer.php");


                    break;
                case '/Addsubmenu':
                    $adddropdawon = $this->Select("menu", array("menu_status" => 'Enable'));
                    $AddsubMenuViewRes = $this->Select(
                        "sub_menu",
                        array("submenu_status" => 'Enable'),
                        array("menu" => "menu.menu_id=sub_menu.menu_id"),
                        "sub_menu.submenu_id,sub_menu.menu_id,sub_menu.submenu_name,sub_menu.submenu_url,sub_menu.submenu_display,sub_menu.submenu_order,menu.menu_name"
                    );

                    // echo "<pre>";
                    // print_r($adddropdawon);
                    // echo "</pre>";


                    if (isset($_POST['addsubmenu'])) {
                        array_pop($_POST);
                        // echo "<pre>";
                        // print_r($_POST);
                        // echo "</pre>";
                        if ($_POST['submenu_name'] != "" && $_POST['submenu_url'] != "") {
                            $InsertsubMenuRes = $this->Insert("sub_menu", $_POST);
                            if ($InsertsubMenuRes['Code'] == 1) {
                                echo " <script>
                                alert('Sub Menu is added Successfully.');
                                window.location.href = 'Addsubmenu';
                                </script>";
                            }
                        } else {
                            echo 'Fill All Coloumn';
                        }
                    }

                    include_once("Views/header.php");
                    include_once("Views/Addsubmenu.php");
                    include_once("Views/footer.php");


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
$Controller = new Controller;
