<?php

use function PHPSTORM_META\type;

error_reporting(0);
session_start();
$ch = $_GET["ch"];

class DB_conn
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'examzone';
    function get_db()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$conn) {
            die('' . mysqli_connect_error());
        } else {
            return $conn;
        }
    }
}

class Test_operation
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'examzone';
    private $conn;

    function __construct()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$conn) {
            die('' . mysqli_connect_error());
        }
        return $this->conn = $conn;
    }
    public function all_test($post)
    {
        $que_obj = new Question_operation();
        if (isset($post['data']) && strlen($post['data']) > 0) {
            $val = $post['data'];
            if ($_SESSION['admin_role'] == 1) {
                $query = "select * from test where status = 1 and test_name LIKE '%$val%' OR duration LIKE '%$val%' OR test_start_date LIKE '%$val%' OR mark_per_ques LIKE '%$val%'";
            } else {
                $query = "select * from test where status = 1 and created_by_admin = " . $_SESSION['admin_id'] . " and test_name LIKE '%$val%' OR duration LIKE '%$val%' OR test_start_date LIKE '%$val%' OR mark_per_ques LIKE '%$val%'";
            }
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        } else {
            if ($_SESSION['admin_role'] == 1) {
                $query = 'select * from test where status = 1';
            } else {
                $query = 'select * from test where status = 1 and created_by_admin =  ' . $_SESSION['admin_id'] . '';
            }
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        }
        if ($num > 0) {
            $str = '<thead>
                <tr>
                    <th>Test Id</th>
                    <th>Test Name</th>
                    <th>Test Duration(min)</th>
                    <th>Test Start(Date)</th>
                    <th>Test Start(Time)</th>
                    <th>Created For</th>
                    <th>Total Question</th>
                    <th>Marks(per question)</th>';
            if ($_SESSION['admin_role'] != 1) {
                $str .= '<th colspan="2" align="center">Action</th>';
            }
            $str .= '</tr>
            </thead>
            <tbody>';
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $total_que = $que_obj->countQue($row['id']);
                $str .= '<tr>
                        <td>' . $i++ . '</td>
                        <td id="' . $row['id'] . '" class="testlink">' . $row['test_name'] . '</td>
                        <td>' . $row['duration'] . '</td>
                        <td>' . date("d-m-Y", strtotime($row['test_start_date'])) . '</td>
                        <td>' . $row['test_start_time'] . '</td>
                        <td>' . $row['created_for'] . '</td>
                        <td>' . $total_que . '</td>
                        <td>' . $row['mark_per_ques'] . '</td>';
                if ($_SESSION['admin_role'] != 1) {
                    $str .= '<td> <button class="edit-test edit-m" id="' . $row['id'] . '">Edit</button>   
                        <button class="delete-test delete-m" id="' . $row['id'] . '">Delete</button> </td>
                    ';
                }
                $str .= '</tr>';
            }
            $str .= '</tbody>';
        } else {
            $str = 'Data Not Found';
        }
        return $str;
    }
    function insert_test($post)
    {
        $test_name = $post['test-name'];
        $duration = $post['duration'];
        $testStartDate = $post['date'];
        $testStartTime = $post['time'];
        $createdFor = $post['created-for'];
        $marksPerQues = $post['marks'];
        $createdBy = $_SESSION["admin_id"];
        // return $test_name . "||" . $duration . "||" . $testStartDate . "||" . $testStartTime . "||" . $createdFor . "||" . $marksPerQues;

        $query = "INSERT INTO `test`(`test_name`, `duration`, `test_start_time`, `test_start_date`, `mark_per_ques`, `created_for`, `created_by_admin`, `status`) VALUES ('$test_name',' $duration','$testStartTime','$testStartDate','$marksPerQues', '$createdFor','$createdBy','1')";
        if (mysqli_query($this->conn, $query)) {
            $stmt = "SELECT * FROM test ORDER BY id DESC LIMIT 1";
            $execute = mysqli_query($this->conn, $stmt);
            $lastRow = mysqli_fetch_assoc($execute);
            $lastID = $lastRow["id"];
            return 1 . "||" . $lastID . "||Test Created Successfully";
        } else {
            return 0 . "|| Test Not Created";
        }
    }
    //method used to get record for display in update pop up
    function get_edit_test($id)
    {
        $query = "select *from test where id=" . $id['id'];
        $stmt = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($stmt) > 0) {
            $row = mysqli_fetch_assoc($stmt);
            return json_encode($row);
        }
    }
    //Method used to upadte test in database
    function update_test($post)
    {
        $test_id = $post['test-id'];
        $test_name = $post['test-name'];
        $test_duration = $post['duration'];
        $test_marks = $post['marks'];
        $test_start_date = $post['date'];
        $test_start_time = $post['time'];
        $created_for = $post['created-for'];
        $query = "UPDATE `test` SET `test_name`='$test_name',`duration`='$test_duration',`test_start_date`='$test_start_date',`test_start_time`='$test_start_time',`created_for`='$created_for',`mark_per_ques`='$test_marks' WHERE `id` = $test_id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return 1 . "||Test Update Successfully.";
        } else {
            return 0 . "||Test Not Updated.";
        }
    }
    //method used to delete test in database
    // SELECT `id`, `test_id`, `question` FROM `question` WHERE test_id = 1; to get all question of test
    function delete_test($id)
    {


        $query = "UPDATE `test` SET `status`= 0 WHERE `id` =" . $id['id'];
        $execute = mysqli_query($this->conn, $query);
        if ($execute) {
            return 1  . "||Test Deleted Successfully";
        } else {
            return 0 . "||Test Not Deleted";
        }

        // $que_obj = new Question_operation();
        // $query = "select id from question where test_id=" . $id['id'];
        // $execute = mysqli_query($this->conn, $query);
        // $num = mysqli_num_rows($execute);
        // if ($num != 0) {
        //     $count = 0;
        //     while ($row = mysqli_fetch_assoc($execute)) {
        //         $response = $que_obj->delete_question($row);
        //         $responseArr = explode("||", $response);
        //         if ($responseArr[0] == "1") {
        //             $count++;
        //         }
        //     }
        //     if ($num == $count) {
        //         $query = "delete from test where id=" . $id['id'];
        //         if (mysqli_query($this->conn, $query)) {
        //             return 1  . "||Test Deleted Successfully";
        //         } else {
        //             return 0 . "||Test Not Deleted";
        //         }
        //     }
        // } else {
        //     $query = "delete from test where id=" . $id['id '];
        //     if (mysqli_query($this->conn, $query)) {
        //         return 1 . "||Test Deleted Successfully";
        //     } else {
        //         return 0 . "||Test Not Deleted";
        //     }
        // }
    }
}

$test_obj = new Test_operation();
switch ($ch) {
    case "1":
        echo $test_obj->all_test($_POST);
        break;
    case "2":
        echo $test_obj->insert_test($_POST);
        break;
    case "3":
        echo $test_obj->delete_test($_POST);
        break;
    case "4":
        echo $test_obj->get_edit_test($_POST);
        break;
    case "5":
        echo $test_obj->update_test($_POST);
        break;
    case "6":
        echo $test_obj->all_test($_POST);
        break;
}


class Question_operation extends Test_operation
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'examzone';
    private $conn;

    function __construct()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$conn) {
            die(' ' . mysqli_connect_error());
        }
        return $this->conn = $conn;
    }

    function all_ques($post)
    {
        $search = $post['data']['search'];
        $testId = $post['data']['testId'];
        // return $testId;
        // SELECT q.*,GROUP_CONCAT(o.options SEPARATOR ' || ') options,a.answer FROM `question` q JOIN options o ON q.id = o.que_id JOIN answer a ON q.id = a.que_id WHERE q.question LIKE "%s%" && q.test_id = 93 GROUP BY q.id ORDER BY q.id;

        if (!empty($search)) {
            $query = "SELECT q.*,GROUP_CONCAT(o.options SEPARATOR ' || ') options,a.answer FROM `question` q JOIN options o ON q.id = o.que_id JOIN answer a ON q.id = a.que_id WHERE q.question LIKE '%" . $search . "%' && q.test_id =" . $testId . " GROUP BY q.id ORDER BY q.id";
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        } else {
            $query = "SELECT q.*,GROUP_CONCAT(o.options SEPARATOR ' || ') options,a.answer FROM `question` q JOIN options o ON q.id = o.que_id JOIN answer a ON q.id = a.que_id WHERE q.test_id =" . $testId . " GROUP BY q.id ORDER BY q.id";
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        }
        if ($num > 0) {
            $str = '<thead>
                <tr>
                    <th>Que Id</th>
                    <th>Questions</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Right Answer</th>';
            if ($_SESSION['admin_role'] != 1) {
                $str .= '<th colspan="2" align="center">Action</th>';
            }
            $str .= '</tr>
            </thead>
            <tbody>';
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $options = explode('||', $row['options']);
                // return $options[2];
                $str .=
                    '<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $row['question'] . '</td>';
                $a = 0;
                while ($a <  count($options)) {
                    $str .= '<td>' . $options[$a] . '</td>';
                    $a++;
                }

                $str .= '<td class="color-success">' . $row['answer'] . '</td>';
                if ($_SESSION['admin_role'] != 1) {
                    $str .= '<td> <button class="edit-que edit-m" id="' . $row['id'] . '">Edit</button>
                            <button class="delete-que delete-m" id="' . $row['id'] . '">Delete</button> </td>';
                }
                $str .= '</tr>';
            }
            $str .= '</tbody>';
        } else {
            $str = 'Data Not Found';
        }
        return $str;
    }

    function insert_question($post)
    {
        $que = trim($post['question']);
        $test_id = trim($post['test_id']);
        $opt_arr[0] = trim($post['option_a']);
        $opt_arr[1] = trim($post['option_b']);
        $opt_arr[2] = trim($post['option_c']);
        $opt_arr[3] = trim($post['option_d']);
        $answer = trim($post['answer']);
        //return $que . "||" . $test_id . "||" . $opt_arr[0] . "||" . $opt_arr[1] . "||" . $opt_arr[2] . "||" . $opt_arr[3] . "||" . $answer;
        $query = "INSERT into question (`test_id`,`question`) VALUES ($test_id,'$que')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            if ($this->insert_option($opt_arr) == 1) {
                if ($this->insert_answer($answer) == 1) {
                    return 1 . "||" . $test_id . "||Question Inserted Successfully";
                }
            }
        } else {
            return "asjasajcccccccccccc";
            return 0 . "|| Question Not Inserted";
        }
    }
    function insert_option($opt_arr)
    {

        $que_id = $this->get_id();
        foreach ($opt_arr as $opt) {
            $query = "INSERT INTO `options`(`que_id`, `options`) VALUES ('$que_id','$opt')";
            $result = mysqli_query($this->conn, $query);
        }
        return 1;
    }
    function insert_answer($answer)
    {

        $que_id = $this->get_id();
        $answer_query = "insert into answer (que_id,answer) values ($que_id,'$answer')";
        $answer_result = mysqli_query($this->conn, $answer_query);
        if ($answer_result) {
            return 1;
        }
    }
    function delete_question($post)
    {
        $que_id = $post["id"];
        $ans_del_query = 'delete from answer where que_id=' . $que_id;
        $ans_del_result = mysqli_query($this->conn, $ans_del_query);
        if ($ans_del_result) {
            $opt_del_query = 'delete from options where que_id=' . $que_id;
            $opt_del_result = mysqli_query($this->conn, $opt_del_query);
            if ($opt_del_result) {
                $que_del_query = 'delete from question where id=' . $que_id;
                $que_del_result = mysqli_query($this->conn, $que_del_query);
                if ($que_del_result) {
                    return 1 . "||Question Deleted Successfully.";
                }
            }
        }
        return 0 . "||Question Not Deleted.";
    }
    function get_edit_que($id)
    {
        $que_id = $id['id'];
        $test_id = $id['test_id'];
        $dataArr['que_id'] = $que_id;
        $query = "select question from question where id=" . $que_id . " and test_id=" . $test_id . " ";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $dataArr['question'] = $row['question'];
            $opt_query = 'select options from options where que_id =' . $que_id;
            $opt_result = mysqli_query($this->conn, $opt_query);
            if ($opt_result) {
                $i = 1;
                while ($opt_row = mysqli_fetch_assoc($opt_result)) {
                    $dataArr["option_" . $i] = $opt_row['options'];
                    $i++;
                }
            }
            $ans_query = 'select answer from answer where que_id =' . $que_id;
            $ans_result = mysqli_query($this->conn, $ans_query);
            if ($ans_result) {
                $ans_row = mysqli_fetch_assoc($ans_result);
                $dataArr['answer'] = $ans_row['answer'];
            }
            return json_encode($dataArr);
        } else {
            return "Error";
        }
    }
    function update_que($post)
    {
        $que_id = $post["que_id"];
        $test_id = $post['test_id'];
        $que = $post['question'];
        $opt_arr[0] = $post['option_a'];
        $opt_arr[1] = $post['option_b'];
        $opt_arr[2] = $post['option_c'];
        $opt_arr[3] = $post['option_d'];
        $answer = $post['answer'];
        $query = "UPDATE `question` SET `question` = '$que' where id = $que_id and test_id = $test_id";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            if ($this->update_option($que_id, $opt_arr) == 1) {
                if ($this->update_answer($que_id, $answer) == 1) {
                    return 1 . "||Question Updated Successfully";
                }
            }
        } else {
            return 0 . "|| Question Not Updated";
        }
    }
    function update_option($queid, $opt_arr)
    {
        $opt_id_arr = $this->get_opt_id($queid);
        $count = 0;
        for ($i = 0; $i < count($opt_arr); $i++) {
            $query = "UPDATE options set `options` = '$opt_arr[$i]' where id= $opt_id_arr[$i] and que_id = $queid";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                $count++;
            }
        }
        if ($count == 4) {
            return 1;
        }
    }
    function update_answer($queid, $answer)
    {
        $query = "UPDATE answer SET `answer` = '$answer' where que_id = $queid";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return 1;
        }
    }
    function get_opt_id($queid)
    {
        $query = "select id from options where que_id = $queid";
        $result = mysqli_query($this->conn, $query);
        $i = 0;
        $arr = array();
        while ($row = mysqli_fetch_array($result)) {
            $arr[$i] = $row['id'];
            $i++;
        }
        return $arr;
    }
    function get_id()
    {
        $id_query = "select id from question order by id desc limit 1";
        $id_result = mysqli_query($this->conn, $id_query);
        if ($id_result) {
            $id = mysqli_fetch_assoc($id_result);
            return $id["id"];
        }
    }
    function countQue($testId)
    {
        $query = "SELECT COUNT(*) from `question` where `test_id` = $testId";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $val = mysqli_fetch_array($result);
            return $val[0];
        } else {
            return 0;
        }
    }
}
$que_obj = new Question_operation();
switch ($ch) {
    case "11":
        echo $que_obj->insert_question($_POST);
        break;

    case "12":
        echo $que_obj->delete_question($_POST);
        break;

    case "13":
        echo $que_obj->get_edit_que($_POST);
        break;
    case "14":
        echo $que_obj->all_ques($_POST);
        break;
    case "15":
        echo $que_obj->all_ques($_POST);
        break;
    case "16":
        echo $que_obj->update_que($_POST);
        break;
}

class Student_operation
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'examzone';
    private $conn;

    function __construct()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$conn) {
            die('' . mysqli_connect_error());
        }
        return $this->conn = $conn;
    }
    function listUser($post)
    {
        if (isset($post['data']) && strlen($post['data']) > 0) {
            if ($post['data'] == 'Active' || $post['data'] == 'active') {
                $query = "select id,name,email,status,gender,class,created_at from user where status = 1";
            } else if ($post['data'] == 'De-Active' || $post['data'] == 'de-active' || $post['data'] == 'De-active' || $post['data'] == 'de-Active') {
                $query = "select id,name,email,status,gender,class,created_at from user where status = 0";
            } else {
                $val = $post['data'];
                $query = "select id,name,email,status,gender,class,created_at from user where name LIKE '%$val%' OR email LIKE '%$val%' OR gender LIKE '%$val%' OR class LIKE '%$val%'";
            }
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        } else {
            $query = "select id,name,email,status,gender,class,created_at from user";
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        }
        if ($num > 0) {
            $str = "
                <thead>
                    <tr>
                        <th>Reg_id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Created at</th>
                        ";
            if ($_SESSION['admin_role'] == 1) {
                $str .= "<th>Action</th>";
            }
            $str .= "
                    </tr>
                </thead>
                <tbody>";
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $name = explode("|", $row['name']);

                $str .= "<tr>
                        <td>" . $i . "</td>
                        <td>" . $name[0] . " " . $name[1] . " " . $name[2] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td class='status'>" . ($row['status'] == 1 ? "Active" : "De-Active") . "</td>
                        <td>" . $row['gender'] . "</td>
                        <td>" . $row['class'] . "</td>
                        <td>" . date('d/m/Y', strtotime($row['created_at'])) . "</td>
                        ";
                if ($_SESSION['admin_role'] == 1) {
                    $str .= "<td>
                    <button onclick='updateStatus(this)' id=" . $row['id'] . " " . ($row['status'] == 1 ? " class='de-activate'>De-Activate</button>" : " class='activate'>Activate</button>") . "
                    <button id=" . $row['id'] . " class='primaryBtn stdInfo' name='" . $name[0] . " " . $name[1] . " " . $name[2] . "'>Info</button>
                    </td>";
                }
                $str .= "</tr>";
                $i++;
            }
            $str .= "</tbody>";
        } else {
            $str = "data not found";
        }
        return $str;
    }
    function updateStatus($post)
    {
        $id = $post['id'];
        $status = $post['status'];
        $query = "UPDATE `user` SET `status` =$status where `id` = '$id'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return 1;
        }
    }
    function addUser($post)
    {
        //check for existing user
        if ($this->checkUser($post) == 0) {
            return 0 . "||Already Registered";
        }
        // check for valid data
        $post = $this->validData($post);
        if ($post === 0) {
            return 0 . "||Fill all fields";
        } else if ($post === 2) {
            return 0 . "||Enter valid Name";
        } else if ($post === 3) {
            return 0 . "||Enter Valid Email";
        } else if ($post === 4) {
            return 0 . "||Password is required";
        } else if ($post === 4.1) {
            return 0 . "||Password must be between 8 and 20 characters";
        } else if ($post === 5) {
            return 0 . "||Confirm password is required";
        } else if ($post === 5.1) {
            return 0 . "||Passwords do not match";
        } else if ($post === 6) {
            return 0 . "||Select Gender";
        } else if ($post === 7) {
            return 0 . "||Select Class";
        } else {
            $name = $post['surName'] . '|' . $post['firstName'] . '|' . $post['lastName'];
            $email = $post['email'];
            $password = password_hash($post['password'], PASSWORD_DEFAULT);
            $gender = $post['gender'];
            $class = $post['class'];
            $status = $post['status'];
            $query = "insert into user (`name`,`email`,`password`,`gender`,`class`,`status`) VALUES('$name','$email','$password','$gender','$class','$status')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return 1 . "||Successfully Registered";
            } else {
                return 0 . "||Not Registered";
            }
        }
    }
    function checkUser($data)
    {
        $email = $data['email'];
        $query = "select email from user where email='$email'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return 0;
        }
        return 1;
    }
    //Check user input Data
    function validData($data)
    {
        if (empty($data)) {
            return 0;
        }
        // validate name
        if ($data['surName'] == "" || $data['firstName'] == "" || $data['lastName'] == "") {
            return 2;
        } else {
            $surName = $this->cleanData($data['surName']);
            $firstName = $this->cleanData($data['firstName']);
            $lastName = $this->cleanData($data['lastName']);
            if (!preg_match("/^[a-zA-Z ]*$/", $surName)) {
                return 2;
            }
            if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
                return 2;
            }
            if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
                return 2;
            }
            $data['surName'] = $surName;
            $data['firstName'] = $firstName;
            $data['lastName'] = $lastName;
        }
        // validate email
        if (empty($data['email'])) {
            return 3;
        } else {
            $email = $this->cleanData($data['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 3;
            } else {
                $data['email'] = $email;
            }
        }
        // validate Password
        if (empty($data['password'])) {
            return 4;
        } else {
            $password = $this->cleanData($data['password']);
            // check if password is between 8 and 20 characters
            if (strlen($password) < 8 || strlen($password) > 20) {
                return 4.1;
            }
        }
        // validate confirm password
        if (empty($data["confirm-password"])) {
            return 5;
        } else {
            $confirm_password = $this->cleanData($data["confirm-password"]);
            // check if confirm password matches password
            if ($confirm_password != $password) {
                return 5.1;
            }
        }
        // validate gender
        if (empty($data['gender'])) {
            return 6;
        } else {
            $gender = $this->cleanData($data['gender']);
            $data['gender'] = $gender;
        };
        //validate class
        if (empty($data['class'])) {
            return 7;
        } else {
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
}

$std_obj = new Student_operation();
switch ($ch) {
    case '20':
        echo $std_obj->addUser($_POST);
        break;
    case '21':
        echo $std_obj->listUser($_POST);
    case '22':
        echo $std_obj->updateStatus($_POST);
}

// =============Teacher Operation================
class Teacher_operation
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'examzone';
    private $conn;

    function __construct()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$conn) {
            die('' . mysqli_connect_error());
        }
        return $this->conn = $conn;
    }
    function login($post)
    {
        $email = $this->cleanData($post['email']);
        $password = $this->cleanData($post['password']);
        $query = "select * from admin where email = '$email'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                if ($row['status'] == 0) {
                    return 2;
                }
                session_start();
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_role'] = $row['role'];
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    function logout($post)
    {
        session_start();
        session_destroy();
        session_unset();
        return "1";
    }
    function listAllTeacher($post)
    {
        if (isset($post['data']) && strlen($post['data']) > 0) {
        } else {
            $val = $post['data'];
            $query = "select * from admin where role = 2 ";
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        }
        if ($num > 0) {
            $str = '<thead>
                <tr>
                    <th>Reg_id</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $str .= "<tr>
                    <td>" . $i . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td class='status'>" . ($row['status'] == 1 ? "Active" : "De-Active") . "</td>
                    <td>" . date('d/m/Y', strtotime($row['created_at'])) . "</td>
                    <td>
                            <button onclick='updateStatus(this)' id=" . $row['id'] . " " . ($row['status'] == 1 ? " class='de-activate'>De-Activate</button>" : " class='activate '>Activate</button>") .
                    "</td>
                </tr>";
                $i++;
            }
            $str .= "</tbody>";
        } else {
            $str = "data not found";
        }
        return $str;
    }

    public function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function addTeacher($post)
    {
        $name = $this->cleanData($post['teacher-name']);
        $email = $this->cleanData($post['teacher-email']);
        $password = $this->cleanData($post['teacher-pass']);

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "insert into admin (`name`,`email`,`password`,`role`) VALUES('$name','$email','$hashPassword',2)";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return 1 . "||Teacher added Successfully ";
        } else {
            return 0 . "||Something went wrong";
        }
    }
    function updateStatus($post)
    {
        $id = $post['id'];
        $status = $post['status'];
        $query = "UPDATE `admin` SET `status` ='$status' where `id` = '$id'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return 1;
        }
    }
    function getDashInfo($post)
    {
        // Total Teacher
        $stmtTotal = "SELECT COUNT(*) as totalTeacher FROM `admin` where role=2";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row1 = mysqli_fetch_assoc($result);

        // Total Student
        $stmtTotal = "SELECT COUNT(*) as totalStudent FROM `user`";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row2 = mysqli_fetch_assoc($result);

        // Total Test
        $stmtTotal = "SELECT COUNT(*) as totalTest FROM `test` where status = 1";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row3 = mysqli_fetch_assoc($result);

        // Total Active Student
        $stmtTotal = "SELECT COUNT(*) as totalActiveStudent FROM `user` WHERE status = 1";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row4 = mysqli_fetch_assoc($result);

        // Total De-Active Student
        $stmtTotal = "SELECT COUNT(*) as totalDeActiveStudent FROM `user` WHERE status = 0";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row5 = mysqli_fetch_assoc($result);

        // Total De-Active Teacher
        $stmtTotal = "SELECT COUNT(*) as totalActiveTeacher FROM `admin` WHERE status = 1 and role = 2";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row6 = mysqli_fetch_assoc($result);

        // Total De-Active Teacher
        $stmtTotal = "SELECT COUNT(*) as totalDeActiveTeacher FROM `admin` WHERE status = 0 and role = 2";
        $result = mysqli_query($this->conn, $stmtTotal);
        $row7 = mysqli_fetch_assoc($result);

        return $row1['totalTeacher'] . "||" . $row2['totalStudent'] . "||" . $row3['totalTest'] . "||" . $row4['totalActiveStudent'] . "||" . $row5['totalDeActiveStudent'] . "||" . $row6['totalActiveTeacher'] . "||" . $row7['totalDeActiveTeacher'];
    }
    function listTestResult($post)
    {
        if ($_SESSION['admin_role'] == 2) {
            $stmt = "SELECT usub.id,usub.test_id,t.test_name,COUNT(DISTINCT usub.user_id) totalParticipant,t.duration ,(SELECT COUNT(*) from question where test_id = t.id) as totalQuestion,usub.total_marks,t.created_for,teach.name as teacherName FROM `user_submit` AS usub JOIN test AS t ON usub.test_id = t.id JOIN question AS que ON que.test_id = usub.test_id JOIN admin AS teach ON t.created_by_admin = teach.id WHERE teach.id = " . $_SESSION['admin_id'] . " GROUP BY usub.test_id";
        } else {
            $stmt = "SELECT usub.id,usub.test_id,t.test_name,COUNT(DISTINCT usub.user_id) totalParticipant,t.duration ,(SELECT COUNT(*) from question where test_id = t.id) as totalQuestion,usub.total_marks,t.created_for,teach.name as teacherName FROM `user_submit` AS usub JOIN test AS t ON usub.test_id = t.id JOIN question AS que ON que.test_id = usub.test_id JOIN admin AS teach ON t.created_by_admin = teach.id GROUP BY usub.test_id";
        }
        $result = mysqli_query($this->conn, $stmt);
        $num = mysqli_num_rows($result);
        $str = '<thead>
                <tr>
                    <th>Sr No</th>
                    <th>Test Name</th>
                    <th>Total Participants</th>
                    <th>Test Duration (min)</th>
                    <th>Total Questions</th>
                    <th>Total Marks</th>
                    <th>Created For</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        if ($num > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $str .= '<tr>
                <td>' . $i . '</td>
                <td>' . $row["test_name"] . '</td>
                <td>' . $row["totalParticipant"] . '</td>
                <td>' . $row["duration"] . '</td>
                <td>' . $row["totalQuestion"] . '</td>
                <td>' . $row["total_marks"] . '</td>
                <td>' . $row["created_for"] . '</td>
                <td>' . $row["teacherName"] . '</td>
                <td><button id=' . $row['test_id'] . ' class="primaryBtn view-more">View More</button></td>
            </tr>';
                $i++;
            }
            $str .= "</tbody>";
            return $str;
        } else {
            return "Data Not Found";
        }
    }
    function listAttemptedStudents($post)
    {
        // return $post['data']['id'];
        $resultId = $post['data']['id'];
        // return $resultId;
        $stmt = "SELECT usub.id, t.test_name, u.name, usub.mark_obtain, usub.total_marks, u.class, usub.attempted_at FROM user_submit AS usub JOIN user AS u ON usub.user_id = u.id JOIN test AS t ON usub.test_id = t.id WHERE usub.test_id = $resultId";
        // return $stmt;
        $result = mysqli_query($this->conn, $stmt);
        $num = mysqli_num_rows($result);
        $str = '<thead>
                <tr>
                    <th>Sr No</th>
                    <th>Student Name</th>
                    <th>Marks Obtain</th>
                    <th>Total Marks</th>
                    <th>Class</th>
                    <th>Attempted On</th>
                </tr>
            </thead>
            <tbody>';
        if ($num > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $nameArr = explode('|', $row['name']);
                $str .= '<tr>
                <td>' . $i . '</td>
                <td>' . $nameArr[0] . ' ' . $nameArr[1] . ' ' . $nameArr[2] . '</td>
                <td>' . $row["mark_obtain"] . '</td>
                <td>' . $row["total_marks"] . '</td>
                <td>' . $row["class"] . '</td>
                <td>' . date("d M Y", strtotime($row["attempted_at"])) . '</td>
            </tr>';
                $i++;
            }
            $str .= "</tbody>";
            return $str;
        } else {
            return "Data Not Found";
        }
    }
    function listAttemptedTest($post)
    {
        $studentId =  $post['id'];
        $stmt = "SELECT usub.id, t.test_name, usub.mark_obtain, usub.total_marks, usub.attempted_at,t.mark_per_ques FROM user_submit AS usub JOIN test AS t ON usub.test_id = t.id WHERE usub.user_id = $studentId";
        $result = mysqli_query($this->conn, $stmt);
        $num = mysqli_num_rows($result);
        // return $num;
        if ($num > 0) {
            $str = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $totalQuestion = $row['total_marks'] / $row['mark_per_ques'];
                $rightQuestion = $row['mark_obtain'] / $row['mark_per_ques'];
                $str .= '<div class="cardStd test-card" id="' . $row['id'] . '">
                        <div class="card-content">
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-file-text h-4 w-4 text-muted-foreground">
                                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                            <path d="M10 9H8"></path>
                                            <path d="M16 13H8"></path>
                                            <path d="M16 17H8"></path>
                                        </svg>
                                        <h3 class="font-medium">' . $row['test_name'] . '</h3>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-calendar h-3 w-3">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <span>' . $row['attempted_at'] . '</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="text-right ">
                                        <div class="font-medium mb-2 text-lg">' . ($row['mark_obtain'] * 100 / $row['total_marks']) . '%</div>
                                        <div class="text-sm text-muted">
                                            ' . $rightQuestion . '/' . $totalQuestion . ' correct
                                        </div>
                                    </div>
                                    <span class="badge badge-outline badge-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                            <path
                                                d="M7.293 4.707 14.586 12l-7.293 7.293 1.414 1.414L17.414 12 8.707 3.293 7.293 4.707z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            return $str;
        } else {
            return '<div class="text-center py-8">
            <p class="text-muted flex items-center justify-center">No test attempts found for this student.</p>
          </div>';
        }
    }
    function testSummary($post)
    {
        $id =  $post['id'];
        $stmt = "SELECT usub.id, t.test_name, usub.mark_obtain, usub.total_marks, usub.attempted_at,t.mark_per_ques FROM user_submit AS usub JOIN test AS t ON usub.test_id = t.id WHERE usub.id = $id ";
        $result = mysqli_query($this->conn, $stmt);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = mysqli_fetch_assoc($result);
            $totalQuestion = $row['total_marks'] / $row['mark_per_ques'];
            $CorrectQuestion = $row['mark_obtain'] / $row['mark_per_ques'];
            $InCorrectQuestion = $totalQuestion - $CorrectQuestion;
            $testName = $row['test_name'];
            $testDate = $row['attempted_at'];
            $percentage = ($row['mark_obtain'] * 100 / $row['total_marks']);
            $submitId = $row['id'];
        }
        return $totalQuestion . '|' . $CorrectQuestion . '|' . $InCorrectQuestion . '|' . $testName . '|' . $testDate . '|' . $percentage;
    }
    function storeFeedback($post)
    {
        $id =  $post['id'];
        $msg = $post['msg'];
        $stmt = "INSERT INTO feedback (`user_submit_id`,`message`) VALUES(" . $id . ",'" . $msg . "')";
        $result = mysqli_query($this->conn, $stmt);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    function listFeedback($post)
    {
        $id =  $post['id'];
        $stmt = "SELECT * FROM feedback WHERE user_submit_id = $id ";
        $result = mysqli_query($this->conn, $stmt);
        $num = mysqli_num_rows($result);
        $str = '';

        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $str .= ' <div class="space-y-2 feedback-msg">
                                <p class="text-sm">' . $row['message'] . '</p>
                                <p class="feedback-date">' . $row['created_at'] . '</p>
                            </div>';
            }
        } else {
            $str .= '<div class="space-y-2 text-muted flex items-center justify-center">
                                <p class="text-sm">No Feedback Added..!! Send Feedback For Better Result</p>
                            </div>';
        }
        return $str;
    }
}

$tch_obj = new Teacher_operation();
switch ($ch) {
    case '23':
        echo $tch_obj->listAllTeacher($_POST);
        break;
    case '24':
        echo $tch_obj->addTeacher($_POST);
        break;
    case '25':
        echo $tch_obj->updateStatus($_POST);
        break;
    case '26':
        echo $tch_obj->logout($_POST);
        break;
    case '27':
        echo $tch_obj->login($_POST);
        break;
    case '28':
        echo $tch_obj->getDashInfo($_POST);
        break;
    case '29':
        echo $tch_obj->listTestResult($_POST);
        break;
    case '30':
        echo $tch_obj->listAttemptedStudents($_POST);
        break;
    case '31':
        echo $tch_obj->listAttemptedTest($_POST);
        break;
    case '32':
        echo $tch_obj->testSummary($_POST);
        break;
    case '33':
        echo $tch_obj->storeFeedback($_POST);
        break;
    case '34':
        echo $tch_obj->listFeedback($_POST);
        break;
}