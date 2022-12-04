<?php
// timezone set
date_default_timezone_set('Asia/Dhaka');
// require model file
require_once('Model/Model.php');
// session start
session_start();
// for get info from model file
class Controller extends Model {
    function __construct(){
        // get construct from parent class model
        parent::__construct();
        // set path in server
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/index':
                    include 'Views/index.php';
                    break;
                
                default:
                    
                    break;
            }
        }
    }
}

$obj = new Controller;

?>