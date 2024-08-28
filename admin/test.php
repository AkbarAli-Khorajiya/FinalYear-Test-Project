<?php
include_once 'include/operation.php';
$dbobj = new DB_conn();
//declare object to do operation on test
$TEST_OBJ = new Test_operation();

if (isset($_POST['edit_id'])) {
    $test_id = $_POST['edit_id'];
    $id_query = "select *from test where id =" . $test_id;
    $id_result = mysqli_query($dbobj->get_db(), $id_query);
    while ($row = mysqli_fetch_assoc($id_result)) {
        $test_id = $row['id'];
        $test_name = $row['test_name'];
        $test_date = $row['test_date'];
        $test_start_time = $row['test_start_time'];
        $test_time = $row['test_time'];
        $test_marks = $row['test_marks'];
        $test_question = $row['test_question'];
    }
} else {
    $test_id = $test_name = $test_date = $test_start_time = $test_time = $test_marks = $test_question = "";
}

?>
<!-- Test Alert -->
<div id="alert-container">
    <div class="alert slideright">
        <h3></h3>
        <a class="close-alert">&times;</a>
    </div>
</div>
<!-- -----------Update test pop-up---------- -->
<div id="edit-test-container">
    <div id="edit-test-content" class="slidedown">
        <button type="button" class="close">x</button>
        <h3 class="edit-test-title">Edit Test</h3> <span class="edit_test"
            style="color:red;font-size: 15px;text-align:end;"></span>
        <form id="edit_test_form" name="edit_test_form">
            <table cellspacing="20px">
                <tr>
                    <th colspan="2"> <input type="text" name="test_name" class="test_name" placeholder="Write test name"
                            value="" required> </th>
                </tr>
                <tr>
                    <td> <input type="text" name="test_date" class="test_date" placeholder="Test date" value=""
                            onfocus="if(this.type !='date'){this.type = 'date'; this.showPicker()}"
                            onblur="if(this.value==''){this.type='text'}" required> </td>
                    <td> <input type="text" name="test_start_time" class="test_start_time" placeholder="Test start time"
                            value="" onfocus="if(this.type !='time'){this.type = 'time'; this.showPicker()}"
                            onblur="if(this.value==''){this.type='text'}" required></td>
                </tr>
                <tr>
                    <td> <input type="text" name="test_time" class="test_time" placeholder="Test time (in minutes )"
                            value="" required> </td>
                    <td> <input type="text" name="test_marks" class="test_marks" placeholder="Test marks" value=""
                            required> </td>
                </tr>
                <tr>
                    <td> <input type="text" name="test_question" class="test_question"
                            placeholder="Total number of Question" value="" required> </td>
                    <td style="display:none;"> <input type="text" name="test_id" class="test_id" value="" hidden> </td>
                    <td class="button">
                        <input type="reset" value="Clear">
                        <input type="submit" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- ------------create test------------ -->
<!-- <div class="test-container">
    <h2> Create Test Panel</h2>
    <form id="test_form" name="test_form">
        <table cellspacing="20px">
            <tr>
                <th colspan=""
                    style="display: flex;flex-direction:column;gap:10px;align-items:center;width:fit-content">
                    <h2>Add Test</h2>
                </th>
                <th>
                    <p style="color: red; font-size: 15px;text-align:end" class="test"></p>
                </th>
            </tr>
            <tr>
                <th colspan="2"> <input type="text" name="test_name" class="test_name" placeholder="Write test name"
                        value="<?php echo $test_name; ?>"> </th>
            </tr>
            <tr>
                <td> <input type="text" name="test_date" class="test_date" placeholder="Test date"
                        value="<?php echo $test_date; ?>" onfocus="(this.type='date')"
                        onblur="if(this.value==''){this.type='text'}"> </td>
                <td> <input type="text" name="test_start_time" class="test_start_time" placeholder="Test start time"
                        value="<?php echo $test_start_time; ?>" onfocus="(this.type='time')"
                        onblur="if(this.value==''){this.type='text'}"></td>
            </tr>
            <tr>
                <td> <input type="text" name="test_time" class="test_time" placeholder="Test time (in minutes )"
                        value="<?php echo $test_time; ?>"> </td>
                <td> <input type="text" name="test_marks" class="test_marks" placeholder="Each Question marks"
                        value="<?php echo $test_marks; ?>"> </td>
            </tr>
            <tr>
                <td> <input type="text" name="test_question" class="test_question"
                        placeholder="Total number of Question" value="<?php echo $test_question; ?>"> </td>
                 <td style="display:none;"> <input type="text" name="test_id" value="" hidden> </td> -->
<!-- <td class="button">
    <input type="reset" value="Clear">
    <input type="submit" name="create" value="Create"> -->
<!-- <button type="button" name="create" >Create</button> -->
<!-- </td>
</tr>
</table>
</form>
</div> -->
<div class="breadcrum">
    <p>Dashboard/<span>Test</span></p>
</div>
<div class="test-display">
    <div class="test-title">
        <span>Dashboard \ Test</span>
        <span class="search">
            <button class="search_btn">
                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                    aria-labelledby="search">
                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                        stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </button>
            <input class="search_input" placeholder="Type your text" required="" type="text">
            <button class="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </span>
    </div>
    <div class="display-container">
        <table cellspacing="10px" id="test-table">

            <!-- ///// created test list ///// -->

        </table>
    </div>
</div>
<script>
    <?php include 'js/test.js'; ?>
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