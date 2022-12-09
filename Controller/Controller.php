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
                        // 12 set value in the insert function head
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
                    // 26 role base redirect page and then secure pages
                    if (isset($_SESSION['user_data']) && $_SESSION['user_data']->roll_id == 1) {
                        ?>
                        <script type="text/javascript">
                        window.location.href='admin';
                        </script>
                        <?php
                    }elseif (isset($_SESSION['user_data']) && $_SESSION['user_data']->roll_id == 0) {
                        ?>
                        <script type="text/javascript">
                        window.location.href='user';
                        </script>
                        <?php
                    }
                    // 18 code for login and then login query in model.php
                    if (isset($_POST['login'])) {
                        $email = mysqli_real_escape_string($this->connection, $_POST['email']);
                        $password = mysqli_real_escape_string($this->connection, $_POST['password']);
                        // 20 set value in function
                        $loginEx = $this->loginData($email, $password);
                        
                        // 21 show alert 
                        if ($loginEx['Code']){
                            // 22 set data in session
                            $_SESSION['user_data'] = $loginEx['Data'];
                            // 23 role based login User/Admin and then dynamic logout button header.php
                            if ($_SESSION['user_data']->roll_id == 0) {
                                ?>
                                <script type="text/javascript">
                                alert("<?php echo $loginEx['Message'] ?>");
                                window.location.href='user';
                                </script>
                                <?php
                            }elseif ($_SESSION['user_data']->roll_id == 1) {
                                ?>
                                <script type="text/javascript">
                                alert("<?php echo $loginEx['Message'] ?>");
                                window.location.href='admin';
                                </script>
                                <?php
                            }
                        }else{
                            ?>
                            <script type="text/javascript">
                            alert("<?php echo $loginEx['Message'] ?>");
                            window.location.href='login';
                            </script>
                            <?php       
                        }
                    }
                    // 16 include login file and then dynamic headers.php button 
                    include 'Views/header.php';
                    include 'Views/login.php';
                    include 'Views/footer.php';
                    break;
                case '/logout':
                    // 25 logout code user
                    unset($_SESSION['user_data']);
                    session_destroy();
                    ?>
                    <script type="text/javascript">
                    alert("User Logged Out Successfully");
                    window.location.href='login';
                    </script>
                    <?php
                    break;
                case '/user':
                    // 27 role base secure page
                    if (!isset($_SESSION['user_data']) || $_SESSION['user_data']->roll_id != 0) {
                        ?>
                        <script type="text/javascript">
                        window.location.href='login';
                        </script>
                        <?php
                    }

                    // 28 fetch data function set and then make query
                    $where = ['id' => $_SESSION['user_data']->id];
                    $selectData = $this->selectData('user', $where);


                    include 'Views/header.php';
                    include 'Views/user.php';
                    include 'Views/footer.php';
                    break;
                case '/admin':
                    // role base secure page
                    if (!isset($_SESSION['user_data']) || !$_SESSION['user_data']->roll_id == 1) {
                        ?>
                        <script type="text/javascript">
                        window.location.href='login';
                        </script>
                        <?php
                    }
                      
                    // 30 for fetch admin and show in admin.php
                    $selectData = $this->selectData('user');

                    include 'Views/header.php';
                    include 'Views/admin.php';
                    include 'Views/footer.php';
                    break;
                
                default:
                    
                    break;
            }
        }
    }
}

$obj = new Controller;

?>