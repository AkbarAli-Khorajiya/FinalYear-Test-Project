<!-- Test Alert -->
<div id="alert-container">
    <div class="alert slideright">
        <h3></h3>
        <a class="close-alert">&times;</a>
    </div>
</div>
<!-- -----------Update teacher pop-up---------- -->
<div class="edit-modal-container">
    <form class="form" action="javascript:void(0)" style="width: 360px !important;" id="test-update-form">
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
                <label for="upteacher-name">Name</label>
                <input type="text" id="upteacher-name" value="" name="upteacher-name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="upteacher-name">Email</label>
                <input type="text" id="upteacher-name" value="" name="upteacher-name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="clear" id="clear" value="Reset">
            <input type="submit" name="submit" id="save" value="Update">
        </div>
    </form>
</div>
<!-- ----------------------------- -->

<div class="breadcrum">
    <p>Dashboard/<span>Test</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Created Teacher List</h3>
        </div>
        <button id="add-teacher">
            <span class="icon">+</span>
            <span>Add Test</span>
        </button>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
        </div>
        <div class="table-container">
            <table cellspacing="10px" id="techer-table">

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
<!-- ---------Add Teacher modal--------------  -->
<div class="modal-container">
    <form class="form" action="javascript:void(0)" style="width: 360px !important;" id="teacher-submit-form">
        <div class="head">
            <h3>Add Teacher</h3>
            <div class="close">x</div>
        </div>
        <div class="msg">
            <!-- <p class="success">*name is required</p> -->
            <!-- <p class="error">*name is required</p> -->
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="teacher-name">Name</label>
                <input type="text" id="teacher-name" value="" name="teacher-name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="teacher-name">Email</label>
                <input type="text" id="teacher-name" value="" name="teacher-name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="teacher-name">Password</label>
                <input type="text" id="teacher-name" value="" name="teacher-name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="teacher-name">Confirm Password</label>
                <input type="text" id="teacher-name" value="" name="teacher-name" placeholder="eg:-xyz">
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="reset" id="clear" value="Reset">
            <input type="submit" name="submit" id="save" value="Save">
        </div>
    </form>
</div>
<script>
    <?php include 'js/teacher.js'; ?>
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