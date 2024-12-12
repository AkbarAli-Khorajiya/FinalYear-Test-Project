<?php
    session_start();
    class Student
    {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'exam_test';
        private $conn;
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
            // check for valid data
            $post = $this->validData($post);
            if($post === 0){
                return 0 ."||Fill all fields";
            }
            else if ($post === 2) {
                return 0 . "||Enter valid Name";
            }
            else if ($post === 3) {
                return 0 ."||Enter Valid Email";     
            }
            else if($post === 4) {
                return 0 ."||Password is required";
            }
            else if($post === 4.1) {
                return 0 ."||Password must be between 8 and 20 characters";
            }
            else if($post === 5) {
                return 0 ."||Confirm password is required";
            }
            else if($post === 5.1) {
                return 0 ."||Passwords do not match";
            }
            else if ($post === 6) {
                return 0 ."||Select Gender";
            }
            else if ($post === 7){
                return 0 ."||Select Class";
            }
            else{  
                $name = $post['surName'] .'|'. $post['firstName'] .'|'. $post['lastName'];
                $email = $post['email'];
                $password = password_hash($post['password'] , PASSWORD_DEFAULT);
                $gender = $post['gender'];
                $class = $post['class'];
                $query = "insert into user (`name`,`email`,`password`,`gender`,`class`) VALUES('$name','$email','$password','$gender','$class')";
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
        function loginUser($post)
        {
            $email = $post['email'];
            $password = $post['password'];
            $query = "select * from user where email = '$email'"; 
            $result = mysqli_query($this->conn,$query);
            if(mysqli_num_rows($result)>0)
            {
                $row = mysqli_fetch_assoc($result);
                $user_password = $row['password'];
                $user_id = $row['id'];
                $user_name = explode("|",$row['name']);
                $user_mail = $row['email'];
                $gender = $row['gender'];
                $status = $row['status'];
                if($status == '0')
                {
                    return 0 ."||Access Denied";
                }
                if(password_verify($password , $user_password))
                {
                    $_SESSION['stdLogin'] = 1;
                    $_SESSION['userId'] = $user_id;
                    $_SESSION['userName'] = $user_name;
                    $_SESSION['userMail'] = $user_mail;
                    $_SESSION['userGender'] = $gender; 
                    return 1 ."||Login Success";
                }  
                else
                {
                    return 0 ."||Invalid Credential";
                }
            }
            else
            {
                return 0 ."||Invalid Credential";
            }
        }
        function logoutUser($post)
        {
            if($post['logout'] == 1)
            {
                if(isset($_SESSION['stdLogin']))
                {
                    unset($_SESSION['stdLogin']);
                    unset($_SESSION['userId']);
                    unset($_SESSION['userName']);
                    unset($_SESSION['userMail']);
                    return 1;
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
            return 1;
        }
        //Check user input Data
        function validData($data)
        {
            if(empty($data)) {
                return 0;
            }
            // validate name
            if($data['surName'] == "" || $data['firstName'] == "" || $data['lastName'] == "") 
            {
                return 2;
            }
            else{
                $surName = $this->cleanData($data['surName']);
                $firstName = $this->cleanData($data['firstName']);
                $lastName = $this->cleanData($data['lastName']);
                if(!preg_match("/^[a-zA-Z ]*$/",$surName)) {
                    return 2;
                }
                if(!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
                    return 2;
                }
                if(!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                    return 2;
                }
                $data['surName'] = $surName;
                $data['firstName'] = $firstName;
                $data['lastName'] = $lastName;
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
            if (empty($data['password'])) {
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
             //validate class
            if(empty($data['class'])){
                return 7;
            }
            else{
                $class = $this->cleanData($data['class']);
                $data['class'] = $class;
            }
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

        function userTestSubmit($data)
        {
            $query = 'select que.id, ans.answer from question que,answer ans where que.id=ans.que_id and que.test_id='.$data['test_id'];
            $result = mysqli_query($this->conn,$query);
            $answer_arr = [];
            while($row = mysqli_fetch_assoc($result))
            {
                $answer_arr[$row['id']] = $row['answer'];
            }
            $right_answer_count = 0;
            $wrong_answer_count = 0;
            foreach($answer_arr as $id => $answer)
            {
                if(isset($data[$id]))
                {
                    $answer == $data[$id] ? $right_answer_count++ : $wrong_answer_count++;
                }
            } 
            unset($answer_arr);
            $answer_arr['right_answer'] = $right_answer_count;
            $answer_arr['wrong_answer'] = $wrong_answer_count;
            $answer_arr['total_que'] = $data['total_que'];
            $obj = $this->insertToResult($answer_arr,$data['test_id']);  
            return json_encode($obj);
        }
        function insertToResult($data,$test_id){
            $user_id = 1;//get from session 
            $query = "select * from test where id=".$test_id;
            $result = mysqli_query($this->conn,$query);
            $row = mysqli_fetch_assoc($result);
            $testName = $row['test_name'];
            $obtainMarks = $data['right_answer'] * $row['marks_per_ques'];
            $totalMarks = $data['total_que'] * $row['marks_per_ques'];

            $query = "INSERT INTO `user_submit`( `user_id`, `test_name`,`total_marks`, `mark_obtain`) VALUES (".$user_id.",'".$testName."',".$totalMarks.",".$obtainMarks.")";
            if(mysqli_query($this->conn,$query))
            {
                $data['obtain_marks'] = $obtainMarks;
                $data['total_marks'] = $totalMarks;
                return $data;
            }
        }
    }

    $stdObj = new Student();
    
    $ch = $_GET['ch'];
    switch ($ch) {
        case '1':
            echo $stdObj->addUser($_POST);
            break;
        case '2':
            echo $stdObj->loginUser($_POST);
            break;
        case '3':
            echo $stdObj->logoutUser($_POST);
            break;
        case '4':
            echo $stdObj->userTestSubmit($_POST);
            break;
    }

?>