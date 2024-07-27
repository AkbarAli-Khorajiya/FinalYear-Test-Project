<?php
  include 'database.php';
?>  
<?php
// define variables and set to empty values
$name = $username = $email = $phone = $password = $confirm_password = $gender = $college = $course = $semester = $roll_no = "";
$name_err = $username_err = $email_err = $phone_err = $password_err = $confirm_password_err = $gender_err = $college_err = $course_err = $semester_err = $roll_no_err = "";

// process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  // validate name
  if (empty($_POST["name"])) {
    $name_err = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_err = "Only letters and white space allowed";
    }
  }

  // validate username
  if (empty($_POST["uname"])) {
    $username_err = "Username is required";
  } else {
    $username = test_input($_POST["uname"]);
    // check if username is between 3 and 20 characters
    if (strlen($username) < 3 || strlen($username) > 20) {
      $username_err = "Username must be between 3 and 20 characters";
    }
  }

  // validate email
  if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format";
    }
  }

  // validate phone number
  if (empty($_POST["phone_number"])) {
    $phone_err = "Phone number is required";
  } else {
    $phone = test_input($_POST["phone_number"]);
    // check if phone number is valid
    if (!preg_match("/^[0-9]{10}$/",$phone)) {
      $phone_err = "Invalid phone number";
    }
  }

  // validate password
  if (empty($_POST["password"])) {
    $password_err = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if password is between 8 and 20 characters
    if (strlen($password) < 8 || strlen($password) > 20) {
      $password_err = "Password must be between 8 and 20 characters";
    }
  }

  // validate confirm password
  if (empty($_POST["password2"])) {
    $confirm_password_err = "Confirm password is required";
  } else {
    $confirm_password = test_input($_POST["password2"]);
    // check if confirm password matches password
    if ($confirm_password != $password) {
      $confirm_password_err = "Passwords do not match";
    }
  }

  // validate gender
  if (empty($_POST["gender"])) {
    $gender_err = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  // validate college
  if (empty($_POST["college"])) {
    $college_err = "College is required";
  } else {
    $college = test_input($_POST["college"]);
  }

  // validate course
  if (empty($_POST["course"])) {
    $course_err = "Course is required";
  } else {
    $course = test_input($_POST["course"]);
  }

  // validate semester
  if (empty($_POST["semester"])) {
    $semester_err = "Semester is required";
  } else {
    $semester = test_input($_POST["semester"]);
    // check if semester is a valid number
    if (!is_numeric($semester)) {
      $semester_err = "Invalid semester";
    }
  }

  // validate roll number
  if (empty($_POST["rollno"])) {
    $roll_no_err = "Roll number is required";
  } else {
    $roll_no = test_input($_POST["rollno"]);
    // check if roll number is a valid number
    if (!is_numeric($roll_no)) {
      $roll_no_err = "Invalid roll number";
    }
  }

  // if there are no errors, insert data into database
  if ($name_err == "" && $username_err == "" && $email_err == "" && $phone_err == "" && $password_err == "" && $confirm_password_err == "" && $gender_err == "" && $college_err == "" && $course_err == "" && $semester_err == "" && $roll_no_err == "") 
  {

      $query = "insert into student_reg (f_name,u_name,email,phone_number,password,gender,collage,course,semester,roll_no) values ('$name','$username','$email','$phone','$password','$gender','$college','$course','$semester',$roll_no)";
      $result = mysqli_query($link,$query) or die ('Query not executed');
      if($result)
      {
        header('location:exam25_home.php');
      } 
      else
      {
        echo "<sctipt> alert('Registration Not Successfull')</script>";
      }
      mysqli_close($link);
  }
  else
  {
      echo '<script>alert("';
      echo  $name_err.$username_err.$email_err.$phone_err.$password_err.$confirm_password_err.$gender_err.$college_err.$course_err.$semester_err.$roll_no_err;
      echo  '")</script>';
  }
}

// function to sanitize data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>