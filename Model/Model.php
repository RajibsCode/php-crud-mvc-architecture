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
        $columns = implode(',',array_keys($data));
        $values = implode("','",array_values($data));
        $sql = "insert into $table ($columns) values ('$values')";
        //echo $sql;
        // 13 exicute query now
        $insertEx = $this->connection->query($sql);
        // 14 response function for mssage
        if ($insertEx) {
            $response['Data'] = null;
            $response['Code'] = true;
            $response['Message'] = 'Data Inserted Successfully';
        }else{
            $response['Data'] = null;
            $response['Code'] = false;
            $response['Message'] = 'Data Insertion faild';            
        }
        return $response;
    }
    // 19 make query for login form
    function loginData ($email, $password){
        $loginSql = "SELECT * FROM user WHERE email = '$email'";
        $loginEx = $this->connection->query($loginSql);
        // then fetch data from object
        $loginData = $loginEx->fetch_object();
        // password verify and alert show for work verify must use password 255 character in database
        if($loginEx->num_rows > 0 && password_verify($password,$loginData->password)){            
            $response['Data'] = $loginData; // set logindata here for work with session
            $response['Code'] = true;
            $response['Message'] = 'Login Successfully';
        }else{
            $response['Data'] = null;
            $response['Code'] = false;
            $response['Message'] = 'Login faild! Email or Password Incorrect';            
        }
        return $response;
    }
    // 29 fetch data for user then show in user.php
    function selectData(string $tableName, array $where = []){
        $selectSql = "SELECT * FROM $tableName";
        if (!empty($where)) {
            $selectSql .= " WHERE ";
            foreach ($where as $key => $value) {
               $selectSql .= " $key = '$value' AND";
            }
            $selectSql = rtrim($selectSql, 'AND');
        }
        $sqlEx = $this->connection->query($selectSql);

        if ($sqlEx->num_rows > 0) {
            // loop for fetch data
            while ($fetchData = $sqlEx->fetch_object()) {
                // get in array
                $allData[] = $fetchData;
            }
            //alert
            $response['Data'] = $allData;
            $response['Code'] = true;
            $response['Message'] = 'Data Retrieved Successfully';

        }else{
            $response['Data'] = [];
            $response['Code'] = false;
            $response['Message'] = 'Data not Retrieved';

        }
        return $response;

        
    }
    // 32 update admin query
    function updateData($table, $data, $where){
        if ($user_data) {
            // make sql query
            $sql = "UPDATE $table SET ";
            foreach ($data as $key => $value) {
                $sql .= "$key = '$value',";
            }
            $sql = rtrim($sql,',');
            $sql .= " WHERE ";

            foreach ($where as $key => $value) {
                $sql .= "$key = '$value' AND";
            }
            $sql = rtrim($sql,'AND');
            return $updateEx = $this->connection->query($sql);
        }else{

        }

    }
}

?>