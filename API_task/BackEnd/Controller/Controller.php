<?php 
require_once("Model/Model.php");
class Controller extends Model{

    function __construct()
    {
        parent::__construct();
       if(isset($_SERVER['PATH_INFO'])){
        switch ($_SERVER['PATH_INFO']) {
            case '/alldata':
                echo "alldata";
                break;
            
            default:
                # code...
                break;
        }
       }
    }


}

$Controller = new Controller;

?>