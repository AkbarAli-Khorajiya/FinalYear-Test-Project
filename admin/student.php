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
            <input type="text" placeholder=" &#x1F50D;search" name="search" class="search" id="search">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Reg_id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="de-activate">De-Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>De-Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="activate">Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="de-activate">De-Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>De-Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="activate">Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="de-activate">De-Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>De-Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="activate">Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="de-activate">De-Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>De-Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="activate">Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="de-activate">De-Activate</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AkbarAli</td>
                    <td>akb@gmail.com</td>
                    <td>De-Active</td>
                    <td>Male</td>
                    <td>Third-Year</td>
                    <td>
                        <button class="activate">Activate</button>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="pagination">
            <div class="total-list">
                1 snds sd 2 sd
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
    <?php include 'js/student.js'; ?>
</script>