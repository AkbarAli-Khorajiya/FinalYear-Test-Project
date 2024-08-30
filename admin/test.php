<!-- Test Alert -->
<div id="alert-container">
    <div class="alert slideright">
        <h3></h3>
        <a class="close-alert">&times;</a>
    </div>
</div>
<!-- -----------Update test pop-up---------- -->
<div class="edit-modal-container">
    <form class="form" action="javascript:void(0)" id="test-update-form">
        <div class="head">
            <h3>Update Test</h3>
            <div class="close">x</div>
        </div>
        <div class="msg">
            <p class="success"> </p>
            <p class="error"> </p>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="test-name">Test name</label>
                <input type="text" id="test-name" value="" name="test-name" placeholder="eg:-xyz">
            </div>
            <div class="inp-group">
                <label for="created-for" class="">Create For</label>
                <select name="created-for" id="created-for">
                    <option value="">----Select----</option>
                    <option value="First-Year">First-Year</option>
                    <option value="Second-Year">Second-Year</option>
                    <option value="Third-Year">Third-Year</option>
                    <option value="All">All</option>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="duration">Test duration(min)</label>
                <input type="number" id="duration" value="" name="duration" placeholder="eg:-10">
            </div>
            <div class="inp-group">
                <label for="marks">Marks(per question)</label>
                <input type="text" id="marks" value="" name="marks" placeholder="eg:-3">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="date">Test Start(Date)</label>
                <input type="date" id="date" name="date" value="">
            </div>
            <div class="inp-group">
                <label for="time">Test Start(Time)</label>
                <input type="time" id="time" name="time" value="">
                <input type="text" name="test-id" value="" hidden>
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="clear" id="clear" value="Reset">
            <input type="submit" name="submit" id="save" value="Update">
        </div>
    </form>
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
                        value="<?php //echo $test_name; ?>"> </th>
            </tr>
            <tr>
                <td> <input type="text" name="test_date" class="test_date" placeholder="Test date"
                        value="<?php //echo $test_date; ?>" onfocus="(this.type='date')"
                        onblur="if(this.value==''){this.type='text'}"> </td>
                <td> <input type="text" name="test_start_time" class="test_start_time" placeholder="Test start time"
                        value="<?php //echo $test_start_time; ?>" onfocus="(this.type='time')"
                        onblur="if(this.value==''){this.type='text'}"></td>
            </tr>
            <tr>
                <td> <input type="text" name="test_time" class="test_time" placeholder="Test time (in minutes )"
                        value="<?php //echo $test_time; ?>"> </td>
                <td> <input type="text" name="test_marks" class="test_marks" placeholder="Each Question marks"
                        value="<?php //echo $test_marks; ?>"> </td>
            </tr>
            <tr>
                <td> <input type="text" name="test_question" class="test_question"
                        placeholder="Total number of Question" value="<?php //echo $test_question; ?>"> </td>
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
    <form class="form" action="javascript:void(0)" id="test-submit-form">
        <div class="head">
            <h3>Add Test</h3>
            <div class="close">x</div>
        </div>
        <div class="msg">
            <!-- <p class="success">*name is required</p> -->
            <!-- <p class="error">*name is required</p> -->
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="test-name">Test name</label>
                <input type="text" id="test-name" value="" name="test-name" placeholder="eg:-xyz">
            </div>
            <div class="inp-group">
                <label for="created-for" class="">Create For</label>
                <select name="created-for" id="created-for">
                    <option value="">----Select----</option>
                    <option value="First-Year">First-Year</option>
                    <option value="Second-Year">Second-Year</option>
                    <option value="Third-Year">Third-Year</option>
                    <option value="All">All</option>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="duration">Test duration(min)</label>
                <input type="number" id="duration" value="" name="duration" placeholder="eg:-10">
            </div>
            <div class="inp-group">
                <label for="marks">Marks(per question)</label>
                <input type="text" id="marks" value="" name="marks" placeholder="eg:-3">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="date">Test Start(Date)</label>
                <input type="date" id="date" name="date" value="">
            </div>
            <div class="inp-group">
                <label for="time">Test Start(Time)</label>
                <input type="time" id="time" name="time" value="">
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="reset" id="clear" value="Reset">
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