<?php
error_reporting(0);
require_once 'database2.php';

class Test_operation
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
    public function all_test($post)
    {
        if (isset($post['data']) && strlen($post['data']) > 0) {
            $val = $post['data'];
            $query = "select * from test where test_name LIKE '%$val%' OR test_date LIKE '%$val%' OR test_question LIKE '%$val%' OR test_marks LIKE '%$val%'";
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        } else {
            $query = 'select *from test';
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        }
        if ($num > 0) {
            $str = '<thead>
                <tr>
                    <th>Test Id</th>
                    <th>Test Name</th>
                    <th>Test Time</th>
                    <th>Starting Time</th>
                    <th>Test Date</th>
                    <th>Total Question</th>
                    <th>Test marks</th>
                    <th colspan="2" align="center">Action</th>
                </tr>
            </thead>
            <tbody>';
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $str .= '<tr>
                        <td>' . $i++ . '</td>
                        <td id="' . $row['id'] . '" class="testlink">' . $row['test_name'] . '</td>
                        <td>' . $row['test_time'] . '</td>
                        <td>' . $row['test_start_time'] . '</td>
                        <td>' . date("d-m-Y", strtotime($row['test_date'])) . '</td>
                        <td>' . $row['test_question'] . '</td>
                        <td>' . $row['test_marks'] . '</td>
                        <td> <button class="edit-test" id="' . $row['id'] . '">Edit</button> </td> 
                        <td> <button class="delete-test" id="' . $row['id'] . '">Delete</button> </td>
                    </tr>';
            }
            $str .= '</tbody>';
        } else {
            $str = 'Data Not Found';
        }
        return $str;
    }
    function insert_test($post)
    {
        $test_name = $post['test_name'];
        $test_date = $post['test_date'];
        $test_start_time = $post['test_start_time'];
        $test_time = $post['test_time'];
        $test_marks = $post['test_marks'];
        $test_question = $post['test_question'];

        $query = "INSERT INTO `test`(`test_name`, `test_time`, `test_start_time`, `test_date`, `test_question`, `test_marks`) VALUES ('$test_name',' $test_time','$test_start_time','$test_date','$test_question','$test_marks')";
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
        $test_id = $post['test_id'];
        $test_name = $post['test_name'];
        $test_date = $post['test_date'];
        $test_start_time = $post['test_start_time'];
        $test_time = $post['test_time'];
        $test_marks = $post['test_marks'];
        $test_question = $post['test_question'];
        $query = "UPDATE `test` SET `test_name`='$test_name',`test_time`='$test_time',`test_start_time`='$test_start_time',`test_date`='$test_date',`test_question`='$test_question',`test_marks`='$test_marks' WHERE `id`= $test_id";
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
        $que_obj = new Question_operation();
        $query = "select id from question where test_id=" . $id['id'];
        $execute = mysqli_query($this->conn, $query);
        $num = mysqli_num_rows($execute);
        if ($num != 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($execute)) {
                $response = $que_obj->delete_question($row);
                $responseArr = explode("||", $response);
                if ($responseArr[0] == "1") {
                    $count++;
                }
            }
            if ($num == $count) {
                $query = "delete from test where id=" . $id['id'];
                if (mysqli_query($this->conn, $query)) {
                    return 1  . "||Test Deleted Successfully";
                } else {
                    return 0 . "||Test Not Deleted";
                }
            }
        } else {
            $query = "delete from test where id=" . $id['id'];
            if (mysqli_query($this->conn, $query)) {
                return 1 . "||Test Deleted Successfully";
            } else {
                return 0 . "||Test Not Deleted";
            }
        }
    }
}

$test_obj = new Test_operation();
$ch = $_GET["ch"];
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
    // private $question;
    // private $opt_array;
    // private $answer;
    // private $test_id;
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
    // function set_value($que, $opt_a, $opt_b, $opt_c, $opt_d, $ans, $test_id)
    // {
    //     $this->question = $que;
    //     $this->opt_array[0] = $opt_a;
    //     $this->opt_array[1] = $opt_b;
    //     $this->opt_array[2] = $opt_c;
    //     $this->opt_array[3] = $opt_d;
    //     $this->answer = $ans;
    //     $this->test_id = $test_id;
    // }

    function all_ques($post)
    {
        $search = $post['data']['search'];
        $testId = $post['data']['testId'];
        // return $testId;
        // SELECT q.*,GROUP_CONCAT(o.options SEPARATOR ' || ') options,a.answer FROM `question` q JOIN options o ON q.id = o.que_id JOIN answer a ON q.id = a.que_id WHERE q.question LIKE "%s%" && q.test_id = 93 GROUP BY q.id ORDER BY q.id;
        
        if (!empty($search)) {
            $query = "SELECT q.*,GROUP_CONCAT(o.options SEPARATOR ' || ') options,a.answer FROM `question` q JOIN options o ON q.id = o.que_id JOIN answer a ON q.id = a.que_id WHERE q.question LIKE '%".$search."%' && q.test_id =".$testId." GROUP BY q.id ORDER BY q.id";
            $result = mysqli_query($this->conn, $query);
            $num = mysqli_num_rows($result);
        } else {
            $query = "SELECT q.*,GROUP_CONCAT(o.options SEPARATOR ' || ') options,a.answer FROM `question` q JOIN options o ON q.id = o.que_id JOIN answer a ON q.id = a.que_id WHERE q.test_id =".$testId." GROUP BY q.id ORDER BY q.id";
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
                    <th>Right Answer</th>
                    <th colspan="2" align="center">Action</th>
                </tr>
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

                $str .= '<td>' . $row['answer'] . '</td>
                        <td> <button class="edit-que" id="' . $row['id'] .'">Edit</button> </td>
                            <td> <button class="delete-que" id="' . $row['id'] . '">Delete</button> </td>
                        </tr>';
            }
            $str .= '</tbody>';
        } else {
            $str = 'Data Not Found';
        }
        return $str;
    }

    function insert_question($post)
    {
        $que = $post['question'];
        $test_id = $post['test_id'];
        $opt_arr[0] = $post['option_a'];
        $opt_arr[1] = $post['option_b'];
        $opt_arr[2] = $post['option_c'];
        $opt_arr[3] = $post['option_d'];
        $answer = $post['answer'];
        $query = "insert into question (test_id,question) values ('$test_id','$que')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            if ($this->insert_option($opt_arr) == 1) {
                if ($this->insert_answer($answer) == 1) {
                    return 1 . "||" . $test_id . "||Question Inserted Successfully";
                }
            }
        } else {
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
        $result = mysqli_query($this->conn,$query);
        if($result)
        {
            if($this->update_option($que_id,$opt_arr) == 1)
            {
                if($this->update_answer($que_id,$answer) == 1)
                {
                    return 1 ."||Question Updated Successfully";
                }
            }            
        }
        else
        {
            return 0 ."|| Question Not Updated";
        }
    }
    function update_option($queid, $opt_arr)
    {
        $opt_id_arr = $this->get_opt_id($queid);
        $count = 0;
        for($i = 0; $i < count($opt_arr); $i++)
        {
            $query = "UPDATE options set `options` = '$opt_arr[$i]' where id= $opt_id_arr[$i] and que_id = $queid";
            $result = mysqli_query($this->conn, $query);
            if($result)
            {
                $count++;
            }
        }
        if($count == 4)
        {
            return 1;
        }
    }
    function update_answer($queid,$answer)
    {
        $query = "UPDATE answer SET `answer` = '$answer' where que_id = $queid";
        $result = mysqli_query($this->conn, $query);
        if($result)
        {
            return 1;
        }
    }
    function get_opt_id($queid)
    {
        $query = "select id from options where que_id = $queid";
        $result = mysqli_query($this->conn, $query);
        $i = 0;
        $arr = array();
        while($row = mysqli_fetch_array($result))
        {   
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
        return 1;
    }
    //Check user input Data
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
        //validate class
        if(empty($dara['class'])){
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
    //function to update student
}