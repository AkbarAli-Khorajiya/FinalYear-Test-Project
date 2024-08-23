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
            //check for existing user
            if($this->checkUser($post) == 0)
            {
                return 0 ."||Already Registered";
            }
            //check for valid Data
            if($this->validData($post) == 0){
                return 0 ."||Fill all fields";
            }
            else if ($this->validData($post) == 2) {
                return 0 ."||Enter Valid Name";
            }
            else if ($this->validData($post) == 3) {
                return 0 ."||Enter Valid Email";
                
            }
            else if($this->validData($post) == 4) {
                return 0 ."||Password is required";
            }
            else if($this->validData($post) == 4.1) {
                return 0 ."||Password must be between 8 and 20 characters";
            }
            else if($this->validData($post) == 5) {
                return 0 ."||Confirm password is required";
            }
            else if($this->validData($post) == 5.1) {
                return 0 ."||Passwords do not match";
            }
            else if ($this->validData($post) == 6) {
                return 0 ."||Select Gender";
                
            }
            else{   
                $name = $post['name'];
                $email = $post['email'];
                $password = password_hash($post['password'] , PASSWORD_DEFAULT);
                $gender = $post['gender'];
                $query = "insert into user (`name`,`email`,`password`,`gender`) VALUES('$name','$email','$password','$gender')";
                $result = mysqli_query($this->conn, $query);
                if ($result) {
                    return 1 ."||Successfully Registered";
                }
                else
                {
                    return 0 ."||Not Registered";
                }
            }
        }
        function checkUser($data)
        {
            $email = $data['email'];
            $query = "select email from user where email='$email'";
            $result = mysqli_query($this->conn,$query);
            if(mysqli_num_rows($result) > 0)
            {
                return 0;
            }
        }
        function validData($data)
        {
            if(empty($data)) {
                return 0;
            }
            // validate name
            if(empty($data['name'])) {
                return 2;
            }
            else{
                $name = $this->cleanData($data['name']);
                if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    return 2;
                }
                else
                {
                    $data['name'] = $name;
                }
            }
            // validate email
            if(empty($data['email'])) {
                return 3;
            }
            else{
                $email = $this->cleanData($data['email']);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return 3;
                }
                else
                {
                    $data['email'] = $email;
                }
            }
            // validate Password
            if (empty($data["password"])) {
                return 4;
            } 
            else{
                $password = $this->cleanData($data['password']);
                // check if password is between 8 and 20 characters
                if (strlen($password) < 8 || strlen($password) > 20) {
                   return 4.1;
                }
              }
            // validate confirm password
            if (empty($data["confirm-password"])) {
                return 5;
            } 
            else{
                $confirm_password = $this->cleanData($data["confirm-password"]);
                // check if confirm password matches password
                if ($confirm_password != $password) {
                   return 5.1;
                }
              }
            // validate gender
            if(empty($data['gender'])) {
                return 6;
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