<?php
include_once 'include/operation.php';
$dbobj = new DB_conn();
//declare object to do operation on test
$TEST_OBJ = new Test_operation();
//To insert record in database
// if(isset($_POST['create_test']) && $_POST['create_test']==1 )
// {
//     $TEST_OBJ->insert_value($_POST['test_name'],$_POST['test_date'],$_POST['test_start_time'],$_POST['test_time'],$_POST['test_marks'],$_POST['test_question']);
//     if($TEST_OBJ->insert_test()==1)
//     {
//         echo "<script>alert('Test Created');</script>";
//         // header("location:que.php");
//     }
//     else
//     {
//         echo "<script>alert('Test not created');</script>";
//     }
// }
// //display_record in add/modify Qeustion
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
// //to delete test from databse
// if(isset($_POST['del_id']))
// {
//     if($TEST_OBJ->delete_test($_POST['del_id']) == 1)
//     {
//         echo "<script>alert('Test Deleted')</script>";
//     }
//     else
//     {
//         echo "<script>alert('Test Not Deleted')</script>";
//     }
// }
// //to upadte/modify record in database
// if(isset($_POST['update_test']) && $_POST['update_test'] == 1)
// {
//     $TEST_OBJ->update_value($_POST['test_id'],$_POST['test_name'],$_POST['test_date'],$_POST['test_start_time'],$_POST['test_time'],$_POST['test_marks'],$_POST['test_question']);
//     if($TEST_OBJ->update_test() == 1)
//     {
//         echo "<script>alert('Test Updated');</script>";
//     }
//     else
//     {
//         echo "<script>alert('Test Not Updated');</script>";
//     }
// }
?>

<!-- -----------Update test pop-up---------- -->
<div id="edit-test-container">
    <div id="edit-test-content" class="slidedown">
        <button type="button" class="close">x</button>
        <h3 class="edit-test-title">Edit Test</h3>
        <form id="edit_test_form" name="edit_test_form">
            <table cellspacing="20px">
                <tr>
                    <th colspan="2"> <input type="text" name="test_name" placeholder="Write test name" value="" required> </th>
                </tr>
                <tr>
                    <td> <input type="text" name="test_date" placeholder="Test date" value="" onfocus="if(this.type !='date'){this.type = 'date'; this.showPicker()}" onblur="if(this.value==''){this.type='text'}" required> </td>
                    <td> <input type="text" name="test_start_time" placeholder="Test start time" value="" onfocus="if(this.type !='time'){this.type = 'time'; this.showPicker()}" onblur="if(this.value==''){this.type='text'}" required></td>
                </tr>
                <tr>
                    <td> <input type="text" name="test_time" placeholder="Test time (in minutes )" value="" required> </td>
                    <td> <input type="text" name="test_marks" placeholder="Test marks" value="" required> </td>
                </tr>
                <tr>
                    <td> <input type="text" name="test_question" placeholder="Total number of Question" value="" required> </td>
                    <td style="display:none;"> <input type="text" name="test_id" value="" hidden> </td>
                    <td class="button">
                        <input type="reset" value="Clear">
                        <input type="button" onclick="test_update()" name="update" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- ------------create test------------ -->
<div class="test-container">
    <h2> Create / Update Test</h2>
    <form id="test_form" name="test_form">
        <table cellspacing="20px">
            <tr>
                <th style="display: flex;gap:10px;align-items:center;">
                    <h2>Add Test</h2>
                    <p style="color: red;" class="test"></p>
                </th>
            </tr>
            <tr>
                <th colspan="2"> <input type="text" name="test_name" class="test-name" placeholder="Write test name" value="<?php echo $test_name; ?>"> </th>
            </tr>
            <tr>
                <td> <input type="text" name="test_date" class="test_date" placeholder="Test date" value="<?php echo $test_date; ?>" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"> </td>
                <td> <input type="text" name="test_start_time" class="test_start_time"  placeholder="Test start time" value="<?php echo $test_start_time; ?>" onfocus="(this.type='time')" onblur="if(this.value==''){this.type='text'}"></td>
            </tr>
            <tr>
                <td> <input type="text" name="test_time" class="test_time"  placeholder="Test time (in minutes )" value="<?php echo $test_time; ?>"> </td>
                <td> <input type="text" name="test_marks" class="test_marks"  placeholder="Test marks" value="<?php echo $test_marks; ?>"> </td>
            </tr>
            <tr>
                <td> <input type="text" name="test_question" class="test_question"  placeholder="Total number of Question" value="<?php echo $test_question; ?>"> </td>
                <!-- <td style="display:none;"> <input type="text" name="test_id" value="" hidden> </td> -->
                <td class="button">
                    <input type="reset" value="Clear">
                    <input type="submit" name="create" value="Create">
                    <!-- <button type="button" name="create" >Create</button> -->
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="test-display">
    <div class="test-title">
        <span>Test Details</span>
    </div>
    <div class="display-container">
        <table cellspacing="10px" id="test-table">

            <!-- ///// created test list ///// -->

        </table>
    </div>
</div>
<script>
    <?php include 'js/test.js'; ?>
</script>
<?php mysqli_close($dbobj->get_db()); ?>