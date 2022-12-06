<?php
// 4 timezone set
date_default_timezone_set('Asia/Dhaka');
// 5 require model file
require_once('Model/Model.php');
// 6 session start
session_start();
// 7 create class for get info from model file
class Controller extends Model {
    function __construct(){
        //  8 get construct from parent class model
        parent::__construct();
        // 9 set path in server
        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/index':
                    include 'Views/index.php';
                    break;
                case '/register':
                    // 10 start code for register form
                    if (isset($_POST['register'])) {

                        // set image path and make unique img name and extension
                        $path = 'uploads/';
                        $extension = pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION);
                        $file_name = $_POST['firstname'].'_'.date('YmdHms').'.'.$extension;
                        
                        // use ternary operator for file_exists validation
                        $profile = (file_exists($_FILES['profile']['tmp_name'])) ? $file_name : null;
                        
                        // set column name as key and input name as value in array
                        $insert_data = [
                            'fname' => $_POST['firstname'],
                            'lname' => $_POST['lastname'],
                            'email' => $_POST['email'],
                            // 16 hash password
                            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                            'contact' => $_POST['contact'],
                            'gender' => $_POST['gender'],
                            'adress' => $_POST['address'],
                            'state' => $_POST['state'],
                            'profile' => $profile,
                            'hobbies' => implode(',',$_POST['hobbies']) // implode() for values separate with comma
                        ];
                        // 12 set value in hthe insert function head
                        $insertEx = $this->InsertData('user', $insert_data);
                        // 15 show alert for insert
                        if ($insertEx['Code']) {
                            // then file upload to folder
                            if (!is_null($profile)) {
                                move_uploaded_file($_FILES['profile']['tmp_name'],$path.$file_name);
                            }
                            ?>
                            <script type="text/javascript">
                                // show alert
                                alert("<?php echo $insertEx['Message'] ?>");
                                // redirect then
                                window.location.href='login';
                            </script>
                            <?php
                        }else{
                            ?>
                            <script type="text/javascript">
                                // show alert
                                alert("<?php echo $insertEx['Message'] ?>");
                                // redirect then
                                window.location.href='register';
                            </script>
                            <?php                            
                        }
                        // echo "<pre>";
                        // print_r($insertEx);
                        exit;
                    } 
                    include 'Views/header.php';
                    include 'Views/register.php';
                    include 'Views/footer.php';
                    break;
                case '/login':  
                    echo "<h1> this is login page </h1>";
                    break;
                default:
                    
                    break;
            }
        }
    }
}

$obj = new Controller;

?>