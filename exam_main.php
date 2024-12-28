<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <style>
        <?php include 'css/exam_main.css' ?>
    </style>
    <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
<header>
        <div id="clock">00 : 00 : 00</div>
    </header>
    <section>
        <div class="que-container">
            <div class="que-wrapper">
                <!-- Question 1 of 3 -->
            </div>
            <hr>
            <div class="img">

            </div>
            <div class="que" id="question">
                 <!-- Question will be displayed here -->
            </div>
            <div class="opt-container">
                <div class="opt">
                    <input type="radio" name="option" id="option_a">
                    <label for="option_a" id="option_a_label">
                        <!-- Option A will be displayed here -->
                    </label>
                </div>
                <div class="opt">
                    <input type="radio" name="option" id="option_b">
                    <label for="option_b" id="option_b_label">
                        <!-- Option B will be displayed here -->
                    </label>
                </div>
                <div class="opt">
                    <input type="radio" name="option" id="option_c">
                    <label for="option_c" id="option_c_label">
                        <!-- Option C will be displayed here -->
                    </label>
                </div>
                <div class="opt">
                    <input type="radio" name="option" id="option_d">
                    <label for="option_d" id="option_d_label">
                        <!-- Option D will be displayed here -->
                    </label>
                </div>
            </div>
            <div class="btn-container">
                <input type="button" id="btnBack" class="btn" value="Back">
                <input type="button" id="btnNext" class="btn" value="Next">
                <input type="submit" id="btnSubmit" class="btn" value="Submit">
            </div>
        </div>
        <div class="navigation-container">
            <div class="container">
                <div class="navigation-wrapper">
                    Question Navigation
                </div>
                <hr>
                <div class="count-wrapper">
                    <div class="counter"> <span id="ans" style="color:#009e60;">0</span> Answered</div>
                    <div class="counter"><span id="nAns" style="color:#e60026">0</span> Not Answered</div>
                    <div class="counter"> <span id="nVisit" style="color:#6264a8;">0</span> Not Visited</div>
                </div>
                <hr>
                <div class="que-navigation-wrapper">
                    All Questions
                </div>
                <div class="que-navigation-btn-container" id="queNavigationBtn"> 
                    <!-- All question buttons will be displayed here -->
                </div>
            </div>
        </div>
    </section>
</body>
<script src="js/testing.js"></script>
</html>