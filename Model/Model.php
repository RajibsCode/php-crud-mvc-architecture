<?php 
// 1 create model class
class Model {
    
    protected $connection = '';
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $db = 'php_crud';

    // 2 for database connection
    function __construct(){
        // 3 error report for exception
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db);
        } catch (Exception $ex) {
            echo "Connection Faild: " . $ex->getMessage();
            exit;
        }
    }
    // 11 insert query for register form
    function InsertData ($table, $data){
        //insert into tablename (columns) VALUES (values);
        $columns = implode(',',array_keys($data));
        $values = implode("','",array_values($data));
        $sql = "insert into $table ($columns) values ('$values')";
        //echo $sql;
        // 13 exicute query now
        $insertEx = $this->connection->query($sql);
        if ($insertEx) {
            $response['Data'] = null;
            $response['Code'] = true;
            $response['Message'] = 'Data Inserted Successfully';
        }
    }
}

?>