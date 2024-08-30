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

$stmt = "select *from test where id =" . $_GET['id'];
$execute = mysqli_query($dbobj->get_db(), $stmt);
$result = mysqli_fetch_assoc($execute);

//To insert record in database

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
<!-- Test Alert -->
<div id="alert-container">
    <div class="alert slideright">
        <h3></h3>
        <a class="close-alert">&times;</a>
    </div>
</div>
<!------------- edit popup menu -------------->
<div id="edit-que-container">
    <div id="edit-que-content" class="slidedown">
        <button type="button" class="close">x</button>
        <h3 class="edit-que-title">Edit Question</h3>
        <form id="edit_que_form" name="edit_que_form">
            <table cellspacing="20px">
                <table cellspacing="20px">
                    <tr>
                        <th colspan="2" id="Que"> <input type="text" class="question" name="question"
                                placeholder="Write Question" value="" required> </th>
                    </tr>
                    <tr>
                        <td><input type="text" class="option_a" name="option_a" placeholder="Option A" value=""
                                required></td>
                        <td><input type="text" class="option_b" name="option_b" placeholder="Option B" value=""
                                required></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="option_c" name="option_c" placeholder="Option C" value=""
                                required></td>
                        <td><input type="text" class="option_d" name="option_d" placeholder="Option D" value=""
                                required></td>
                    </tr>
                    <tr>
                        <td> <select name="answer" class="answer" required></select> </td>
                        <td style="display:none;"> <input type="text" class="que_id" name="que_id" value=" " hidden>
                        </td>
                        <td style="display:none;"> <input type="text" class="test_id" name="test_id"
                                value="<?php echo $_GET['id']; ?>" hidden> </td>
                        <td class="button">
                            <input type="reset" value="Clear">
                            <input type="submit" value="Update">
                        </td>
                    </tr>
                </table>
        </form>
    </div>
</div>

<!-- <div class="que-container">
    <h1>
        //  echo "<font style='color:red'>" . $result['test_name'] . "</font>";
           Questions</h1>
    <form id="create_question_form" name="create_question_form">
        <table cellspacing="15px">
            <tr>
                <th colspan="2">
                    <h2>Add Questions</h2>
                    <span class="que" style="color: red; font-size:15px"></span>
                </th>
            </tr>
            <tr>
                <th colspan="2"> <input type="text" name="question" class="question" placeholder="Write Question" style="height:35px;" value="" required> </th>
            </tr>
            <tr>
                <td><input type="text" class="option_a" name="option_a" placeholder="Option A" value="" required></td>
                <td><input type="text" class="option_b" name="option_b" placeholder="Option B" value="" required></td>
            </tr>
            <tr>
                <td><input type="text" class="option_c" name="option_c" placeholder="Option C" value="" required></td>
                <td><input type="text" class="option_d" name="option_d" placeholder="Option D" value="" required></td>
            </tr>
            <tr>
                <td> <select name="answer" class="answer" required>
                        <option value="">--Select Answer--</option>
                    </select> </td>
                <td style="display:none;"> <input type="text" class="test_id" id="test_id" name="test_id" value="<?php echo $_GET['id']; ?>" hidden> </td>
                <td class="button">
                    <input type="reset" value="Clear">
                    <input type="submit" name="insert" value="Insert">
                </td>
            </tr>
        </table>
    </form>
</div> -->

<!-- getting test id to render all questions -->
<!-- ----------------- -->

<!-- <div class="que-display">
    <div class="que-title">
        <span>Dashboard \ Test \ Question</span>
        <span class="search">
            <button class="search_btn">
                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <input class="search_input" placeholder="Type your text" required="" type="text">
            <button class="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </span>
    </div> -->
<!-- ---------Add Test modal--------------  -->
<div class="modal-container">
    <form class="form" action="javascript:void(0)" id="que-submit-form">
        <div class="head">
            <h3>Add Question</h3>
            <div class="close">x</div>
        </div>
        <div class="msg">
            <!-- <p class="success">*name is required</p> -->
            <!-- <p class="error">*name is required</p> -->
        </div>
        <div class="col">
            <div class="inp-group">
                <label for="test-name">Question</label>
                <input type="text" id="test-name" value="" name="question" class="question"
                    placeholder="Enter question">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="test-name">Option A</label>
                <input type="text" id="option_a" value="" class="option_a" name="option_a" placeholder="Enter Option"
                    required>
            </div>
            <div class="inp-group">
                <label for="test-name">Option B</label>
                <input type="text" id="option_b" value="" class="option_b" name="option_b" placeholder="Enter Option"
                    required>
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="test-name">Option C</label>
                <input type="text" id="option_c" value="" class="option_c" name="option_c" placeholder="Enter Option"
                    required>
            </div>
            <div class="inp-group">
                <label for="test-name">Option D</label>
                <input type="text" id="option_d" value="" class="option_d" name="option_d" placeholder="Enter Option"
                    required>
            </div>
        </div>
        <div class="col">
            <div class="inp-group">
                <label for="test-name">Answer</label>
                <select name="answer" class="answer" required>
                    <option value="">----Select Answer----</option>
                </select>
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="reset" id="clear" value="Reset">
            <input type="submit" name="submit" id="save" value="Save">
        </div>
        <input type="text" class="test_id" id="test_id" name="test_id" value="<?php echo $_GET['id']; ?>" hidden>
        </input>

    </form>
</div>
<!-- ----------------- -->
<div class="breadcrum">
    <p>Dashboard/Test/<span>Question</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Created Question List</h3>
        </div>
        <button id="add-btn">
            <span class="icon">+</span>
            <span>Add Question</span>
        </button>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
        </div>
        <table cellspacing="10px" id="que-table">

            <!-- ///// created test list ///// -->

        </table>
        <div class="pagination" style="display: flex;justify-content: space-between;">
            <div class="total-list">
                <p>Showing 1 to 10 of 50 entries</p>

            </div>
            <div class="page-btn">
                <button class="previous">Previous</button>
                <button class="next">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
    <?php include_once 'js/que.js'; ?>
    $(function() {
        $(".close-alert").click(function() {
            $("#alert-container").fadeOut();
        });

        $("#alert-container").click(function() {
            $("#alert-container").fadeOut();
        }).children().click(function() {
            return false;
        });
    });
</script>
<?php mysqli_close($dbobj->get_db()); ?>