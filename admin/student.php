<div class="breadcrum">
    <p>Dashboard/<span>Student</span></p>
</div>
<div class="sub-container">
    <div class="add-title-btn">
        <div class="heading">
            <h3 class="page-title">Students Registered List</h3>
        </div>
        <?php
        session_start();
        if ($_SESSION['admin_role'] == 1) {
        ?>
            <button id="add-student">
                <span class="icon">+</span>
                <span>Add Student</span>
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
            <table id="user-table">
                <!-- displaying all user -->
            </table>
        </div>
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
<div class="modal-container AddStudentModal">
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
                <input type="password" name="confirm-password" id="confirmpassword" placeholder="eg:-xyzstudent"
                    required>
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

<!-- -----------Student Info Model------------- -->
<div class="modal-container StudentInfoModel">
    <div class="modal-content">
        <div class="modal-header flex justify-between">
            <div>
                <h2 id="student-name" class="mb-2">AkbarAli Khorajiya</h2>
                <p class="text-sm text-muted" style="display: none;" id="student-id"></p>
            </div>
            <div class="close">
                <svg width="16" height="16" viewBox="0 0 25.00 25.00" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                    fill="#d01616" stroke="#d01616">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>Close</title>
                        <g id="Page-1" stroke-width="0.00025" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                            <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                                transform="translate(-469.000000, -1041.000000)" fill="#d01616">
                                <path
                                    d="M487.148,1053.48 L492.813,1047.82 C494.376,1046.26 494.376,1043.72 492.813,1042.16 C491.248,1040.59 488.712,1040.59 487.148,1042.16 L481.484,1047.82 L475.82,1042.16 C474.257,1040.59 471.721,1040.59 470.156,1042.16 C468.593,1043.72 468.593,1046.26 470.156,1047.82 L475.82,1053.48 L470.156,1059.15 C468.593,1060.71 468.593,1063.25 470.156,1064.81 C471.721,1066.38 474.257,1066.38 475.82,1064.81 L481.484,1059.15 L487.148,1064.81 C488.712,1066.38 491.248,1066.38 492.813,1064.81 C494.376,1063.25 494.376,1060.71 492.813,1059.15 L487.148,1053.48"
                                    id="cross" sketch:type="MSShapeGroup"> </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="modal-body">
            <div id="test-list-container" class="space-y-4">
                <h3 class="text-lg font-semibold">Test Attempts</h3>
                <div id="test-list" class="space-y-4">
                    <!-- ---------------- -->
                    <!-- ------------------ -->
                </div>
            </div>
            <div id="test-detail-container" class="space-y-4 hide">
                <button id="back-to-tests" class="btn btn-ghost btn-sm mb-4">
                    <svg class="icon mr-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    Back to Test List
                </button>

                <div class="tabs">
                    <div class="tabs-list">
                        <button class="tabs-trigger active" data-tab="summary">Test Summary</button>
                        <button class="tabs-trigger" data-tab="feedback">Provide Feedback</button>
                    </div>
                    <div class="tabs-content active" id="tab-summary">
                        <!-- Test summary will be inserted here by JavaScript -->
                        <div class="space-y-6">
                            <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr));gap: 30px;">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-sm ">Test Name</h3>
                                    </div>
                                    <div class="card-content">
                                        <p class="text-2xl font-medium test-name">Math Midterm</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-sm font-medium">Date Taken</h3>
                                    </div>
                                    <div class="card-content">
                                        <p class="text-2xl font-medium test-date">10/15/2023</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-sm font-medium">Score</h3>
                                    </div>
                                    <div class="card-content space-y-2">
                                        <p class="text-2xl font-medium mb-2 test-percentage">80%</p>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 80%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 mt-15">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold">Performance Summary</h3>
                                </div>

                                <div class="card">
                                    <div class="card-content">
                                        <div class="flex items-center gap-2 gap-4">
                                            <div style="flex:1">
                                                <h4 class="font-medium mb-2">Correct Answers</h4>
                                                <div class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-circle-check-big h-5 w-5 text-green-500">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                        <path d="m9 11 3 3L22 4"></path>
                                                    </svg>
                                                    <span class="text-xl font-bold totalCorrect">4</span>
                                                    <span class="text-muted totalQues">out of 5</span>
                                                </div>
                                            </div>
                                            <div style="flex:1">
                                                <h4 class="font-medium mb-2">Incorrect Answers</h4>
                                                <div class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-circle-x h-5 w-5 text-red-500">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="m15 9-6 6"></path>
                                                        <path d="m9 9 6 6"></path>
                                                    </svg>
                                                    <span class="text-xl font-bold totalInCorrect">1</span>
                                                    <span class="text-muted totalQues">out of 5</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-base">Teacher Feedback</h3>
                                    </div>
                                    <div class="card-content" id="feedback-list">
                                        <!-- ------ rendering feedback list -------- -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ------------------------------------- -->
                    </div>
                    <div class="tabs-content" id="tab-feedback">
                        <form id="feedback-form" class="space-y-6" action="javascript:void(0)">

                            <div class="form-group">
                                <label class="form-label" for="comments">Feedback Comments</label>
                                <textarea id="feedback-desc" class="form-control" rows="8" name="feedback-desc"
                                    placeholder="Provide detailed feedback on the student's performance..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" id="submit-feedback">Submit
                                Feedback</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php include 'js/student.js'; ?>
</script>