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
  <title>Test Result</title>
  <script src="js/jquery-3.7.1.min.js"></script>
  <style>
    <?php include_once 'css/user_submit.css'; ?>
  </style>
</head>
<body>
<?php include_once 'include/loader.php';?>
  <div class="main-card card">
    <div class="card-content space-y-4">
      <div>
        <h1>PHP TEST RESULT</h1>
        <div class="flex justify-between items-center mt-1">
          <span class="text-sm font-medium">Overall Score</span>
          <span class="text-sm font-medium"><?php echo $overall_score."/100(".$overall_score."%)"?></span>
        </div>
        <div class="progress">
          <div class="progress-bar" style=<?php echo "width:".$overall_score."%";?>></div>
        </div>
      </div>

      <div class="grid grid-cols-2">
        <div class="card border shadow-none">
          <div class="card-content p-4 flex items-center">
            <div class="icon-container bg-green-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium">Right Answers</p>
              <p class="text-3xl"><?php echo $arr->right_answer?></p>
            </div>
          </div>
        </div>

        <div class="card border shadow-none">
          <div class="card-content p-4 flex items-center">
            <div class="icon-container bg-red-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-500">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium">Wrong Answers</p>
              <p class="text-3xl"><?php echo $arr->wrong_answer;?></p>
            </div>
          </div>
        </div>

        <div class="card border shadow-none">
          <div class="card-content p-4 flex items-center">
            <div class="icon-container bg-blue-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium">Answered Questions</p>
              <p class="text-3xl"><?php echo $arr->answer ?></p>
            </div>
          </div>
        </div>

        <div class="card border shadow-none">
          <div class="card-content p-4 flex items-center">
            <div class="icon-container bg-yellow-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium">Unanswered Questions</p>
              <p class="text-3xl"><?php echo $unanswered_que;?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="card border shadow-none">
        <div class="card-content p-4 flex justify-between items-center">
          <p class="text-sm font-medium">Total Questions</p>
          <p class="text-3xl"><?php echo $arr->total_que ?></p>
        </div>
      </div>

      <div class="grid grid-cols-2">
        <div class="card border shadow-none">
          <div class="card-content p-4 flex items-center">
            <div class="icon-container bg-yellow-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-500">
                <circle cx="12" cy="8" r="7"></circle>
                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium">Obtain Marks</p>
              <p class="text-3xl"><?php echo $arr->obtain_marks ?></p>
            </div>
          </div>
        </div>

        <div class="card border shadow-none">
          <div class="card-content p-4 flex items-center">
            <div class="icon-container bg-blue-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="12" r="6"></circle>
                <circle cx="12" cy="12" r="2"></circle>
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium">Total Marks</p>
              <p class="text-3xl"><?php echo $arr->total_marks ?></p>
            </div>
          </div>
        </div>
      </div>

      <div>
        <h2>Performance Breakdown</h2>
        <div class="space-y-3">
          <div>
            <div class="flex justify-between mb-1">
              <span class="text-sm">Accuracy Rate</span>
              <span class="text-sm font-medium"><?php echo $accuracy_rate."%";?></span>
            </div>
            <div class="progress">
              <div class="progress-bar" style=<?php echo "width:".$accuracy_rate."%";?>></div>
            </div>
          </div>

          <div>
            <div class="flex justify-between mb-1">
              <span class="text-sm">Completion Rate</span>
              <span class="text-sm font-medium"><?php echo $completion_rate."%";?></span>
            </div>
            <div class="progress">
              <div class="progress-bar" style=<?php echo "width:".$completion_rate."%";?>></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script>
        <?php 
            include 'js/user_submit.js';
        ?>
    </script>
</body>
</html>