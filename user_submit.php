<?php
    session_start();
    if(isset($_GET)){
        $arr = json_decode($_GET['res_data']);
        $unanswered_que = $arr->not_answer+$arr->nvisit_answer;
        $overall_score = round(($arr->right_answer / $arr->total_que)*100, 2);
        $accuracy_rate = round(($arr->right_answer / $arr->answer) * 100,2);
        $completion_rate = round(($arr->answer / $arr->total_que) * 100,2);
    }

?>
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
            <div class="score-wrapper">
                <span class="title">Overall Score</span>
                <span class="score"><?php echo $overall_score."/100(".$overall_score."%)"?></span>
            </div>
            <div class="range">
                <div class="range-fill" style=<?php echo "width:".$overall_score."%";?>></div>
                <div class="range-unfill"></div>
            </div>
        </div>
        <div class="tiles-container">
            <div class="tiles small">
                    <span class="title">Right Answers</span>
                    <span class="score" ><?php echo $arr->right_answer?></span>
            </div>
            <div class="tiles small">
                    <span class="title">Wrong Answers</span>
                    <span class="score" ><?php echo $arr->wrong_answer;?></span>
            </div>
            <div class="tiles small">
                    <span class="title">Answered Questions</span>
                    <span class="score"> <?php echo $arr->answer ?> </span>
            </div>
            <div class="tiles small">
                    <span class="title">Unanswered Questions</span>
                    <span class="score"> <?php echo $unanswered_que;?> </span>
            </div>
            <div class="tiles large">
                    <span class="title">Total Questions</span>
                    <span class="score"> <?php echo $arr->total_que ?> </span>
            </div>
        </div>
        <div class="wrapper rate">
            <div class="heading">
                Performance Breakdown
            </div>
            <div class="score-wrapper">
                <span class="title">Accuracy Rate</span>
                <span class="score"><?php echo $accuracy_rate."%";?></span>
            </div>
            <div class="range">
                <div class="range-fill" style=<?php echo "width:".$accuracy_rate."%";?>></div>
                <div class="range-unfill"></div>
            </div>
            <div class="score-wrapper">
                <span class="title">Completion Rate</span>
                <span class="score"> <?php echo $completion_rate."%";?> </span>
            </div>
            <div class="range">
                <div class="range-fill" style=<?php echo "width:".$completion_rate."%";?>></div>
                <div class="range-unfill"></div>
            </div>
        </div>
    </div>
</body>
</html>