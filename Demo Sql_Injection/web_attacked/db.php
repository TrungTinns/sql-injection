<?php
    function open_database()
    {
        $host = '127.0.0.1'; // tên mysql server
        $user = 'root';
        $pass = '';
        $dbname = 'essay'; // tên databse
        $con = new mysqli($host,$user, $pass, $dbname);
        if($con->connect_error) {
            echo '<div class="alert alert-danger">Unable to connect database</div>';
            die($con->connect_error);
        }
        return $con;
    }
?>
