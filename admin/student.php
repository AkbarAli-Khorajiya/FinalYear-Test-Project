<div class="breadcrum">
    <p>Dashboard/<span>Student</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Students Registered List</h3>
        </div>
        <button id="add-student">
            <span class="icon">+</span>
            <span>Add Student</span>
        </button>
    </div>
    <div class="data-display">
        <div class="search">
            <input type="text" placeholder="&#x1F50D; search" name="search" class="search" id="search">
        </div>
        <table id="user-table">
           <!-- displaying all user -->
        </table>
        <div class="pagination">
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
<!-- ---------Add student modal--------------  -->
<div class="modal-container">
    <form class="form" id="std-add-form" action="javascript:void(0)">
        <div class="head">
            <h3>Add Student</h3>
            <div class="close">x</div>
        </div>
        <div class="msg">
            <p class="success"></p>
            <p class="error"></p>
        </div>
        <div class="col-3">
            <div class="inp-group">
                <label for="firstname" class="">Surname</label>
                <input type="text" name="surName" id="firstname" placeholder="eg:-xyz" required>
            </div>
            <div class="inp-group">
                <label for="middlename" class="">Firstname</label>
                <input type="text" name="firstName" id="middlename" placeholder="eg:-xyz" required>
            </div>
            <div class="inp-group">
                <label for="name" class="">Lastname</label>
                <input type="text" name="lastName" id="name" placeholder="eg:-xyz" required>
            </div>
        </div>
        <div class="col">

            <div class="inp-group">
                <label for="email" class="">Email</label>
                <input type="text" name="email" id="email" placeholder="eg:-xyz@gmail.com" required>
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="password" class="">Password</label>
                <input type="password" name="password" id="password" placeholder="eg:-xyzstudent" required>
            </div>
            <div class="inp-group">
                <label for="confirmpassword" class="">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirmpassword" placeholder="eg:-xyzstudent" required>
            </div>
        </div>
        <div class="col-2">
            <div class="inp-group">
                <label for="gender" class="">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
            </div>
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
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
        </div>
        <div class="bottom">
            <input type="reset" name="clear" id="clear" value="Reset">
            <input type="submit" name="submit" id="save" value="Save">
        </div>
    </form>
</div>
<script>
    <?php include 'js/student.js'; ?>
</script>