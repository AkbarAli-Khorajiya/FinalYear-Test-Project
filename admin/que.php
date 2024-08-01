<?php
error_reporting(0);

include_once 'include/operation.php';
$dbobj = new DB_conn();
$QUE_OBJ = new Question_operation();

if (!isset($_GET['id'])) {
    echo '<script>alert("select test or create test")</script>';
    echo '<script>$("#container").load("test.php")</script>';
    die();
}

$stmt = "select *from test where id =" .$_GET['id'];
$execute = mysqli_query($dbobj->get_db(), $stmt);
$result = mysqli_fetch_assoc($execute);

//To insert record in database

if (isset($_POST['insert_que']) && $_POST['insert_que'] == 1) {
    $QUE_OBJ->set_value($_POST['question'], $_POST['option_a'], $_POST['option_b'], $_POST['option_c'], $_POST['option_d'], $_POST['right_answer'], $_POST['test_id']);
    if ($QUE_OBJ->insert_question() == 1) {
        if ($QUE_OBJ->insert_answer() == 1) {
            echo "<script>alert('Question inserted');</>";
        }
    }
}
//display_record in add/modify Qeustion
if (isset($_POST['edit_id'])) {
    //for display question
    $que_id = $_POST['edit_id'];
    $que_dis_query = 'select *from question where id=' . $que_id;
    $que_dis_result = mysqli_query($dbobj->get_db(), $que_dis_query);
    if ($que_dis_result) {
        $que_dis_row = mysqli_fetch_assoc($que_dis_result);
        $question = $que_dis_row['question'];
        //for option display
        $opt_dis_query = 'select *from options where que_id=' . $que_id;
        $opt_dis_result = mysqli_query($dbobj->get_db(), $opt_dis_query);
        $i = 0;
        while ($opt_dis_row = mysqli_fetch_assoc($opt_dis_result)) {
            $opt[$i] = $opt_dis_row['options'];
            $i++;
        }
        //for answer display
        $ans_dis_query = 'select *from answer where que_id=' . $que_id;
        $ans_dis_result = mysqli_query($dbobj->get_db(), $ans_dis_query);
        $ans_dis_row = mysqli_fetch_assoc($ans_dis_result);
        $right_answer = $ans_dis_row['answer'];
    }
} else {
    $question = $opt[0] = $opt[1] = $opt[2] = $opt[3] = $right_answer = "";
}
//To delete record
if (isset($_POST['del_id'])) {
    if ($QUE_OBJ->delete_question($_POST['del_id']) == 1) {
        echo "<script>alert('Question Deleted')</script>";
    } else {
        echo "<script>alert('Question Not Deleted')</script>";
    }
}
//To update record in database
if (isset($_POST['update_que']) && $_POST['update_que'] == 1) {
    $que_id = $_POST['que_id'];
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $right_answer = $_POST['right_answer'];

    $update_query = "UPDATE `question` SET `question`= '$question' ,`option_a`='$option_a',`option_b`='$option_b',`option_c`='$option_c',`option_d`='$option_d',`right_answer`='$right_answer' WHERE `que_id`=" . $que_id;
    $update_result = mysqli_query($link, $update_query) or die('Not executed');
    if ($update_result) {
        echo "<script> alert('Question Updated'); </script>";
        $question = $option_a = $option_b = $option_c = $option_d = $right_answer = "";
    }
}
?>
<!------------- edit popup menu -------------->
<div id="edit-que-container">
    <div id="edit-que-content" class="slidedown">
        <button type="button" class="close">x</button>
        <h3 class="edit-que-title">Edit Question</h3>
        <form id="edit_que_form" name="edit_que_form">
            <table cellspacing="20px">
                <table cellspacing="20px">
                    <tr>
                        <th colspan="2" id="Que"> <input type="text" name="question" placeholder="Write Question" value="<?php echo $question; ?>" required> </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="option_a" placeholder="Option A" value="<?php echo $opt[0]; ?>" required></td>
                        <td><input type="text" name="option_b" placeholder="Option B" value="<?php echo $opt[1]; ?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="option_c" placeholder="Option C" value="<?php echo $opt[2]; ?>" required></td>
                        <td><input type="text" name="option_d" placeholder="Option D" value="<?php echo $opt[3]; ?>" required></td>
                    </tr>
                    <tr>
                        <td> <input type="text" name="right_answer" placeholder="Right Option" value="<?php echo $right_answer; ?>" required> </td>
                        <td style="display:none;"> <input type="text" name="que_id" value="<?php echo $que_id; ?>" hidden> </td>
                        <td class="button">
                            <input type="reset" value="Clear">
                            <input type="button" name="update" value="Update">
                        </td>
                    </tr>
                </table>
        </form>
    </div>
</div>

<div class="que-container">
    <h1><?php echo "<font style='color:red'>".$result['test_name']."</font>"; ?> Questions</h1>
    <form id="question_form" name="question_form">
        <table cellspacing="15px">
            <tr>
                <th colspan="2">
                    <h2>Add Questions</h2>
                </th>
            </tr>
            <tr>
                <th colspan="2"> <input type="text" name="question" placeholder="Write Question" style="height:35px;" value="<?php echo $question; ?>" required> </th>
            </tr>
            <tr>
                <td><input type="text" name="option_a" placeholder="Option A" value="<?php echo $opt[0]; ?>" required></td>
                <td><input type="text" name="option_b" placeholder="Option B" value="<?php echo $opt[1]; ?>" required></td>
            </tr>
            <tr>
                <td><input type="text" name="option_c" placeholder="Option C" value="<?php echo $opt[2]; ?>" required></td>
                <td><input type="text" name="option_d" placeholder="Option D" value="<?php echo $opt[3]; ?>" required></td>
            </tr>
            <tr>
                <td> <input type="text" name="right_answer" placeholder="Right Option" value="<?php echo $right_answer; ?>" required> </td>
                <td style="display:none;"> <input type="text" name="que_id" value="<?php echo $que_id; ?>" hidden> </td>
                <td class="button">
                    <input type="reset" value="Clear">
                    <input type="button" onclick="que_insert()" name="insert" value="Insert">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="que-display">
    <div class="display-container">
        <table cellspacing="10px">
            <?php
            //check that test selected or not from option
            if (isset($_POST['que_dis']) && $_POST['que_dis'] == 1 || isset($_POST['test_id'])) {
            ?>
                <thead>
                    <tr>
                        <th>Que_id</th>
                        <th>Questions</th>
                        <th>Option A</th>
                        <th>Option B</th>
                        <th>Option C</th>
                        <th>Option D</th>
                        <th>Right Answer</th>
                        <th colspan="2" align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //display questions in datagrid
                    $test_id = $_POST['test_id'];
                    $que_dis_query = 'select id,question from question where test_id=' . $test_id;
                    $que_dis_result = mysqli_query($dbobj->get_db(), $que_dis_query) or die('Query not exectued');
                    while ($que_row = mysqli_fetch_assoc($que_dis_result)) {
                    ?>
                        <tr>
                            <td><?php echo $que_row['id'] ?></td>
                            <td><?php echo $que_row['question'] ?></td>
                            <?php
                            //for display options in datagrid
                            $opt_dis_query = "select options from options where que_id=" . $que_row['id'];
                            $opt_dis_result = mysqli_query($dbobj->get_db(), $opt_dis_query);
                            while ($opt_dis_row = mysqli_fetch_assoc($opt_dis_result)) {

                            ?>
                                <td><?php echo $opt_dis_row['options'] ?></td>
                            <?php
                            }
                            //display right answer in datagrid
                            $ans_dis_query = "select answer from answer where que_id=" . $que_row['id'];
                            $ans_dis_result = mysqli_query($dbobj->get_db(), $ans_dis_query);
                            $ans_dis_row = mysqli_fetch_assoc($ans_dis_result);
                            ?>
                            <td><?php echo $ans_dis_row['answer']; ?></td>
                            <td> <button class="edit" onclick="que_edit(<?php echo $que_row['id']; ?>)">Edit</button> </td>
                            <td> <button class="delete" onclick="que_delete(<?php echo $que_row['id']; ?>)">Delete</button> </td>
                        </tr>
                <?php
                    }
                }
                ?>
                </tbody>
        </table>
    </div>
</div>
<script>
    <?php include 'js/que.js'; ?>
</script>
<?php mysqli_close($dbobj->get_db()); ?>