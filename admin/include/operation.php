<?php
error_reporting(0);
require_once 'database2.php';

class Test_operation
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
    public function all_test()
    {

        $query = 'select *from test';
        $result = mysqli_query($this->conn, $query);
        $num = mysqli_num_rows($result);
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
                        <td>' . $row['test_date'] . '</td>
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
    //method used to intialize value for insert
    // function insert_value($name,$date,$start_time,$time,$marks,$question)
    // {
    //     $this->test_name = $name;
    //     $this->test_date = $date;
    //     $this->test_start_time = $start_time;
    //     $this->test_time = $time;
    //     $this->test_marks = $marks;
    //     $this->test_question = $question;
    // }
    //method used to insert test in database
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
            return 1 . "||" . $lastID;
        } else {
            return '<div class="alert alert-danger"><span class="alert-message"><strong>Error! </strong>Something went wrong.</span> </div>';
        }
    }
    //method used to intialize value for update
    // function update_value($id, $name, $date, $start_time, $time, $marks, $question)
    // {
    //     $this->test_id = $id;
    //     $this->test_name = $name;
    //     $this->test_date = $date;
    //     $this->test_start_time = $start_time;
    //     $this->test_time = $time;
    //     $this->test_marks = $marks;
    //     $this->test_question = $question;
    // }
    //method used to update test data in database
    // function update_test()
    // {

    //     $query = "UPDATE `test` SET `test_name`=' $this->test_name',`test_time`=' $this->test_time',`test_start_time`='$this->test_start_time',`test_date`='$this->test_date',`test_question`='$this->test_question',`test_marks`='$this->test_marks' WHERE `id`= $this->test_id";
    //     $result = mysqli_query(($this->dbobj)->get_db(), $query);
    //     if ($result) {
    //         return 1;
    //     }
    // }
    //method used to delete test in database
    // SELECT `id`, `test_id`, `question` FROM `question` WHERE test_id = 1; to get all question of test
    function delete_test($id)
    {
        $que_obj = new Question_operation();
        $query = "select id from question where test_id=".$id['id'];
        $execute = mysqli_query($this->conn, $query);
        $num = mysqli_num_rows($execute);
        if($num != 0)
        {
            $count = 0;
            while($row = mysqli_fetch_assoc($execute))
            {
                if($que_obj->delete_question($row["id"]) == 1)
                {
                    $count++;
                }
            }
            if($num == $count)
            {
                $query = "delete from test where id=".$id['id'];
                if(mysqli_query($this->conn, $query))
                {
                    return 1;
                }
            }
        }
        else
        {
            $query = "delete from test where id=".$id['id'];
                if(mysqli_query($this->conn, $query))
                {
                    return 1;
                }
        }
    }
}

$obj = new Test_operation();
$ch = $_GET["ch"];
switch ($ch) {
    case "1":
        echo $obj->all_test($_POST);
        break;
    case "2":
        echo $obj->insert_test($_POST);
        break;
    case "3":
        echo $obj->delete_test($_POST);
        break;
}


class Question_operation extends Test_operation
{
    private $question;
    private $opt_array;
    private $answer;
    private $test_id;
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
    function set_value($que, $opt_a, $opt_b, $opt_c, $opt_d, $ans, $test_id)
    {
        $this->question = $que;
        $this->opt_array[0] = $opt_a;
        $this->opt_array[1] = $opt_b;
        $this->opt_array[2] = $opt_c;
        $this->opt_array[3] = $opt_d;
        $this->answer = $ans;
        $this->test_id = $test_id;
    }
    function insert_question()
    {

        $query = "insert into question (test_id,question) values ($this->test_id,'$this->question')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $this->insert_option();
            return 1;
        }
    }
    function insert_option()
    {

        $que_id = $this->get_id();
        foreach ($this->opt_array as $value) {
            $option_query = "insert into options (que_id,options) values ($que_id,'$value')";
            $option_result = mysqli_query($this->conn, $option_query);
        }
        return 1;
    }
    function insert_answer()
    {

        $que_id = $this->get_id();
        $answer_query = "insert into answer (que_id,answer) values ($que_id,'$this->answer')";
        $answer_result = mysqli_query($this->conn, $answer_query);
        if ($answer_result) {
            return 1;
        }
    }
    function delete_question($que_id)
    {

        $ans_del_query = 'delete from answer where que_id=' . $que_id;
        $ans_del_result = mysqli_query($this->conn, $ans_del_query);
        if ($ans_del_result) {
            $opt_del_query = 'delete from options where que_id=' . $que_id;
            $opt_del_result = mysqli_query($this->conn, $opt_del_query);
            if ($opt_del_result) {
                $que_del_query = 'delete from question where id=' . $que_id;
                $que_del_result = mysqli_query($this->conn, $que_del_query);
                if ($que_del_result) {
                    return 1;
                }
            }
        }
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