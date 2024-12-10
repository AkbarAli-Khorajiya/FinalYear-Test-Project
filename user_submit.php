<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        <?php include_once 'css/user_submit.css'; ?>
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper main">
            <span class="test-name">PHP TEST RESULT</span>
            <span class="user-name">User Name: Alice Jhonson</span>
            <div class="score-wrapper">
                <span class="title">Overall Score</span>
                <span class="score">75/100 (75.0%)</span>
            </div>
            <div class="range">
                <div class="range-fill" style="width: 75%;"></div>
                <div class="range-unfill"></div>
            </div>
        </div>
        <div class="tiles-container">
            <div class="tiles small">
                    <span class="title">Right Answers</span>
                    <span class="score" >38</span>
            </div>
            <div class="tiles small">
                    <span class="title">Wrong Answers</span>
                    <span class="score" >7</span>
            </div>
            <div class="tiles small">
                    <span class="title">Answered Questions</span>
                    <span class="score">45</span>
            </div>
            <div class="tiles small">
                    <span class="title">Unanswered Questions</span>
                    <span class="score">5</span>
            </div>
            <div class="tiles large">
                    <span class="title">Total Questions</span>
                    <span class="score">50</span>
            </div>
        </div>
        <div class="wrapper rate">
            <div class="heading">
                Performance Breakdown
            </div>
            <div class="score-wrapper">
                <span class="title">Accuracy Rate</span>
                <span class="score">84.4%</span>
            </div>
            <div class="range">
                <div class="range-fill" style="width: 84.4%;"></div>
                <div class="range-unfill"></div>
            </div>
            <div class="score-wrapper">
                <span class="title">Completion Rate</span>
                <span class="score">90%</span>
            </div>
            <div class="range">
                <div class="range-fill" style="width: 90%;"></div>
                <div class="range-unfill"></div>
            </div>
        </div>
    </div>
</body>
</html>