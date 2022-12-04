<?php 
// create model class
class Model {
    
    protected $connection = '';
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $db = 'mvc_crud';

    // for database connection
    function __construct(){
        // error report for exception
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db);
        } catch (Exception $ex) {
            echo "Connection Faild: " . $ex->getMessage();
            exit;
        }
    }
}

?>