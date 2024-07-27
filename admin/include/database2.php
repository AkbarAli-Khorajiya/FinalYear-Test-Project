<?php
    class DB_conn
    {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database= 'exam_test';
        function get_db()
        {
            $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (!$conn)
            {
                die(''. mysqli_connect_error());
            }
            else
            {
                return $conn;
            }
        }
    }
?>