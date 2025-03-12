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
                <input type="date" id="date" class="date" name="date" value="">
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
<div class="breadcrum">
    <p>Dashboard/<span>Test</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Created Test List</h3>
        </div>
        <?php
        session_start();
        if ($_SESSION['admin_role'] != 1) {
        ?>
            <button id="add-btn">
                <span class="icon">+</span>
                <span>Add Test</span>
            </button>
        <?php
        }
        session_commit();
        ?>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
        </div>
        <div class="table-container">
            <table cellspacing="10px" id="test-table">

                <!-- ///// created test list ///// -->

            </table>
        </div>
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
                <input type="date" id="date" class="date" name="date" value="">
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