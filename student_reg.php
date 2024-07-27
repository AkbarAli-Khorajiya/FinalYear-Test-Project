<?php include 'include/reg_valid.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        <?php include 'css/student_reg.css'?>
    </style>
</head>
<body>
    <header>
        <span onclick="window.location.href = 'index.php';">Exam25</span>
        <img src="image/3.png" alt="">
    </header>
    <div class="container">
    <div class="title">Student Registration</div>
    <div class="content">
      <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="uname" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone_number" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" name="password2" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="M" id="dot-1">
          <input type="radio" name="gender" value="F" id="dot-2">
          <input type="radio" name="gender" value="Prefer not to say" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
            </div>
        </div>
        <div class="user-details">
            <div class="input-box">
                <span class="details">Collage</span>
                <input type="text" name="college" placeholder="Enter your Collage name" required>
            </div>
            <div class="input-box">
                <span class="details">Course</span>
                <input type="text" name="course" value="BCA" readonly>
            </div>
            <div class="input-box">
                <span class="details">Semester</span>
                <input type="text" name="semester" placeholder="Enter your semester" required>
            </div>
            <div class="input-box">
                <span class="details">Roll No</span>
                <input type="text" name="rollno" placeholder="Enter your roll number" required>
            </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
</html>