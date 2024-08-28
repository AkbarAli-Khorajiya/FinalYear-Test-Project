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
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Created Test List</h3>
        </div>
        <button id="add-btn">
            <span class="icon">+</span>
            <span>Add Test</span>
        </button>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
        </div>
        <table cellspacing="10px" id="test-table">

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
<!-- ---------Add Test modal--------------  -->
<div class="modal-container">
    <form class="form" action="javascript:void(0)">
        <div class="head">
            <h3>Add Student</h3>
            <div class="close">x</div>
        </div>
        <div class="msg">
            <!-- <p class="success">*name is required</p> -->
            <!-- <p class="error">*name is required</p> -->
        </div>
        <div class="col-3">
            <div class="inp-group">
                <label for="firstname" class="">Surname</label>
                <input type="text" id="firstname" placeholder="eg:-xyz">
            </div>
            <div class="inp-group">
                <label for="middlename" class="">Firstname</label>
                <input type="text" id="middlename" placeholder="eg:-xyz">
            </div>
            <div class="inp-group">
                <label for="name" class="">Lastname</label>
                <input type="text" id="name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="col">

            <div class="inp-group">
                <label for="email" class="">Email</label>
                <input type="text" id="email" placeholder="eg:-xyz@gmail.com">
            </div>
        </div>
        <div class="col-2">

            <div class="inp-group">
                <label for="password" class="">Password</label>
                <input type="text" id="password" placeholder="eg:-xyzstudent">
            </div>
            <div class="inp-group">
                <label for="gender" class="">Gender</label>
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="col-2">

            <div class="inp-group">
                <label for="class" class="">Class</label>
                <select name="class" id="class">
                    <option value="First-Year">First-Year</option>
                    <option value="Second-Year">Second-Year</option>
                    <option value="Third-Year">Third-Year</option>
                </select>
            </div>
            <div class="inp-group">
                <label for="status" class="">Status</label>
                <select name="status" id="status">
                    <option value="0">Active</option>
                    <option value="1">InActive</option>
                </select>
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="reset" id="reset" value="Reset">
            <input type="submit" name="submit" id="save" value="Save">
        </div>
    </form>
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