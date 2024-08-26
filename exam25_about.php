<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <style>
        <?php include 'css/exam25_about.css' ?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js'; ?>
    </script>
</head>
<body>
<header>
        <span> <a href="index.php">Exam25</a> </span>
        <nav>
            <a href="index.php">HOME</a>
            <a href="student_login.php">EXAM</a>
            <a href="#">EVENTS</a>
            <a href="exam25_about.php">ABOUT</a>
            <a href="#">CONTACT</a>
               <!-- user profile menu -->
            <?php 
                if(!isset($_SESSION['userId']) && empty($_SESSION['userId']))
                {
            ?>
                <a href="student_reg.php">REGISTER</a>
            <?php
                }
                else
                {
            ?>
            <img src="image/userprofile/user.png" class="img" alt="">
            <div class="user-menu">
                <span class="profile"> <img src="image/userprofile/profile.png"> My profile</span>
                <hr width="100%">
                <span class="user-data">
                    <span class="user-name"><?php echo $_SESSION['userName']; ?></span>
                    <span class="user-email"><?php echo $_SESSION['userMail']; ?></span>
                </span>
                <hr width="100%">
                <span class="logout"> <img src="image/userprofile/logout.png"> Log-out</span>
            </div>
            <?php
                }
            ?>
        </nav>
    </header>
    <section>
        <div class="box">
            <div class="content">
                <span>ABOUT US</span>
                <p>At Exam25, we believe that knowledge knows no boundaries. Whether you’re a curious student, a seasoned professional, or someone on a lifelong learning journey, we’re here to make your exam experience seamless, insightful, and enjoyable.Our Mission Our mission is simple: Empower learners globally. We’re committed to creating an ecosystem where exams become opportunities for growth, self-assessment, and achievement. We’re not just about grades; we’re about understanding, progress, and continuous improvement.</p>
                <a href="student_reg.php">Let's Start</a>
            </div>
            <div class="container">
                <img src="image/about.png" >
            </div>
        </div>
        <div class="box">
            <div class="text-container">
                <h1>Our Mission</h1>
                <p>Our mission is simple: <strong>Empower learners globally</strong>. We're committed to creating an ecosystem where exams become opportunities for growth, self-assessment, and achievement. We're not just about grades; we're about understanding, progress, and continuous improvement.</p>
                <h1>What Sets Us Apart?</h1>
                <ul>
                    <li>Powerful Dashboards: Track exam statistics, schedules, results, and reports with ease.</li>
                    <li>On-Screen Evaluation: Conduct digital evaluations seamlessly.</li>
                    <li>Real-Time Feedback: Instant insights during exams.</li>
                    <li>Customizable Templates: Create exams that fit your needs.</li>
                    <li>User-Friendly Navigation: Intuitive experience.</li>
                    <li>AI-Proctored Exams: Ensuring integrity.</li>
            </ul>
            <p>Ready to revolutionize your exam journey? Join us today! Explore challenging questions, track your progress, and embrace the joy of learning. Visit our official website: <a href="index.php">Exam25</a></p>
            </div>        
        </div>
    </section>
    <footer>

    </footer>
    <script>
        //------show profile menu-------//
        $("nav .img").click(()=>{
            $("nav .user-menu").css('display', 'flex');
        });
        // ------hide profile menu-------//
        let img = document.querySelector(".img");
        let menu = document.querySelector(".user-menu");
        img.addEventListener("click",()=>{
            menu.style.display = 'flex';
        });
        document.addEventListener("click",()=>{
            let imgClicked = img.contains(event.target);
            let menuClicked = menu.contains(event.target);
            if(!imgClicked && !menuClicked)
            {
                menu.style.display = "none";
            }
        });
    </script>
</body>
</html>