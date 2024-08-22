<?php
    class Student
    {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'exam_test';
        private $conn = '';
        function __construct()
        {
            $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (!$conn) {
            die('' . mysqli_connect_error());
            }
            return $this->conn = $conn;
        }
        function addUser($post)
        {
            if($post = $this->validData($post)) 
            {   
                $name = $post['name'];
                $email = $post['email'];
                $gender = $post['gender'];
                $query = "insert into user (`name`,`email`,`gender`) VALUES('$name','$email','$gender')";
                $result = mysqli_query($this->conn, $query);
                if ($result) {
                    return 1 ."||Successfully Registered";
                }
                else
                {
                    return 0 ."||Not Registered";
                }
            }  
            else
            {
                return 0 ."|| Enter Valid Data";
            }
        }
        function validData($data)
        {
            if(empty($data)) {
                return 0;
            }
            // validate name
            if(empty($data['name'])) {
                return 0;
            }
            else{
                $name = $this->cleanData($data['name']);
                if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    return 0;
                }
                else
                {
                    $data['name'] = $name;
                }
            }
            // validate email
            if(empty($data['email'])) {
                return 0;
            }
            else{
                $email = $this->cleanData($data['email']);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return 0;
                }
                else
                {
                    $data['email'] = $email;
                }
            }
            // validate gender
            if(empty($data['gender'])) {
                return 0;
            }
            else{
                $gender = $this->cleanData($data['gender']);
                $data['gender'] = $gender;
            };
            return $data;
        }
        // Function to sanatize data
        function cleanData($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $stdObj = new Student();
    
    $ch = $_GET['ch'];
    switch ($ch) {
        case '1':
            echo $stdObj->addUser($_POST);
            break;
    }
?>