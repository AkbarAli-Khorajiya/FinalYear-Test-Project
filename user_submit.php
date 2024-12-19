<?php
    session_start();
    if(isset($_GET)){
        $arr = json_decode($_GET['res_data']);
        $unanswered_que = $arr->not_answer+$arr->nvisit_answer;
        try {
            $overall_score = round(($arr->right_answer / $arr->total_que)*100, 2);
            $accuracy_rate = round(($arr->right_answer / $arr->answer) * 100,2);
            $completion_rate = round(($arr->answer / $arr->total_que) * 100,2);
        } catch (Throwable $th) {
           if($th->getMessage()== 'Division by zero'){
                $overall_score = 0;
                $accuracy_rate = 0;
                $completion_rate = 0;
           }
        }
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
                <div class="range-fill" id="overall-score" style=<?php echo "width:".$overall_score."%";?>></div>
                <div class="range-unfill"></div>
            </div>
        </div>
        <div class="tiles-container">
            <div class="tiles small">
                <div class="icon" style="color:#22c55e">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
                </div>
                <div class="detail">
                    <span class="title">Right Answers</span>
                    <span class="score" ><?php echo $arr->right_answer?></span>
                </div>
            </div>
            <div class="tiles small">
                <div class="icon" style="color:#ef4444;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-5 h-5 text-red-500"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>
                </div>
                <div class="detail">
                    <span class="title">Wrong Answers</span>
                    <span class="score" ><?php echo $arr->wrong_answer;?></span>
                </div>
            </div>
            <div class="tiles small">
                <div class="icon" style="color:#3b82f6;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert w-5 h-5 text-blue-500"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="12"></line><line x1="12" x2="12.01" y1="16" y2="16"></line></svg>    
                </div>
                <div class="detail">
                    <span class="title">Answered Questions</span>
                    <span class="score"> <?php echo $arr->answer ?> </span>
                </div>
            </div>
            <div class="tiles small">
                <div class="icon" style="color:#eab308">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-help w-5 h-5 text-yellow-500"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><path d="M12 17h.01"></path></svg>
                </div>
                <div class="detail">
                    <span class="title">Unanswered Questions</span>
                    <span class="score"> <?php echo $unanswered_que;?> </span>
                </div>
            </div>
            <div class="tiles large">
                <div class="detail">
                    <span class="title">Total Questions</span>
                    <span class="score"> <?php echo $arr->total_que ?> </span>
                </div>
            </div>
            <div class="tiles small">
                <div class="icon" style="color:#eab308">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-5 h-5 text-yellow-500"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle cx="12" cy="8" r="6"></circle></svg>
                </div>
                <div class="detail">
                    <span class="title">Obtain Marks</span>
                    <span class="score"> <?php echo $arr->obtain_marks ?> </span>
                </div>
            </div>
            <div class="tiles small">
                <div class="icon" style="color:#3b82f6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target w-5 h-5 text-blue-500"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                </div>
                <div class="detail">
                    <span class="title">Total Marks</span>
                    <span class="score"> <?php echo $arr->total_marks;?> </span>
                </div>
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
                <div class="range-fill" id="accuracy-rate" style=<?php echo "width:".$accuracy_rate."%";?>></div>
                <div class="range-unfill"></div>
            </div>
            <div class="score-wrapper">
                <span class="title">Completion Rate</span>
                <span class="score"> <?php echo $completion_rate."%";?> </span>
            </div>
            <div class="range">
                <div class="range-fill" id="completion-rate" style=<?php echo "width:".$completion_rate."%";?>></div>
                <div class="range-unfill"></div>
            </div>
        </div>
    </div>

    <script>
        <?php 
            include_once 'js/jquery-3.7.1.min.js';
            include 'js/user_submit.js';
        ?>
    </script>
</body>
</html>