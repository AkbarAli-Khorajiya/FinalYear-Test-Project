<?php
    session_start();
    if(!isset($_SESSION['stdLogin']) && empty($_SESSION['stdLogin']))
    {
        header('location:index');
    }
    else{
        include_once 'include/database.php';
        date_default_timezone_set('Asia/Kolkata');
        $averagScoreDataQuery = "SELECT * FROM user_submit WHERE user_id=".$_SESSION['userId'];
        $averagScoreDataResult = mysqli_query($link,$averagScoreDataQuery);
        $sumOfObtainMarks = $sumOfTotalMarks = 0;
        while($row = mysqli_fetch_assoc($averagScoreDataResult)){
            $sumOfObtainMarks += intval($row['mark_obtain']);
            $sumOfTotalMarks += intval($row['total_marks']);
        }
        $averageScorePercantage = ($sumOfObtainMarks/$sumOfTotalMarks) * 100;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Progress Panel</title>
    <style type="text/css">
        <?php 
            include 'css/progress.css'; 
        ?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <?php include_once 'include/loader.php';?>
    <?php include_once 'include/header.php'; ?>
    <div class="min-h-screen p-4 md:p-8"> 
        <main class="grid gap-6 md:grid-cols-2">
            <!-- Overall Progress Card -->
            <div class="card  col-span-full">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <?php echo $_SESSION['userName'][0] ." ". $_SESSION['userName'][1]?>
                    </h2>
                    <div class="card-description">Average Score Percentage</div>
                </div>
                <div class="card-content">
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 85%"></div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600"><?php echo round($averageScorePercantage,2).'% Average Score'?></p>
                </div>
            </div>

            <!-- Completed Tests Card -->
            
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        Completed Tests
                    </h2>
                </div>
                <div class="card-content">
                    <ul class="space-y-4">
                        <!-- <li class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">Mathematics 101</p>
                                <p class="text-sm text-gray-500">2025-02-10</p>
                            </div>
                            <span class="badge">85%</span>
                        </li> -->
                        <?php
                            $completedTestQuery = "SELECT usub.*,t.test_name AS 'test_name' FROM user_submit usub,test t WHERE usub.test_id = t.id and usub.user_id =".$_SESSION['userId']." ORDER BY usub.attempted_at DESC";
                            $completedTestResult = mysqli_query($link,$completedTestQuery);
                            while($row = mysqli_fetch_assoc($completedTestResult))
                            { 
                                $percantage = (intval($row['mark_obtain']) / intval($row['total_marks'])) * 100;
                        ?>
                        <li class="flex items-center justify-between">
                            <div>
                                <p class="font-medium"><?php echo $row["test_name"];?></p>
                                <p class="text-sm text-gray-500"><?php echo date("d-m-Y",strtotime($row["attempted_at"]));?></p>
                            </div>
                            <span class="badge"><?php echo $percantage."%"?></span>
                        </li>
                       <?php
                            }
                       ?>
                    </ul>
                </div>
            </div>

            <!-- Teacher Feedback Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Teacher Feedback
                    </h2>
                </div>
                <div class="card-content">
                    <ul class="space-y-4">
                        <!-- <li class="flex items-start space-x-4">
                            <div class="avatar">
                                <div class="avatar-fallback">DS</div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium leading-none">Dr. Smith</p>
                                <p class="text-sm text-muted">Mathematics</p>
                                <p class="text-sm text-gray-600">Excellent progress in algebra. Work on geometry concepts.</p>
                                <p class="text-xs text-gray-500">2025-02-18</p>
                            </div>
                        </li> -->
                        <?php
                            $feedbackQuery = "SELECT f.message, f.created_at, ad.name AS admin_name, t.test_name FROM feedback f JOIN user_submit usub ON f.user_submit_id = usub.id JOIN test t ON usub.test_id = t.id JOIN admin ad ON t.created_by_admin = ad.id WHERE usub.user_id =".$_SESSION["userId"];
                            $feedbackResult = mysqli_query($link,$feedbackQuery);
                            while($row = mysqli_fetch_assoc($feedbackResult)){
                            $strName =  explode(' ',$row['admin_name']);    
                        ?>
                        <li class="flex items-start space-x-4">
                            <div class="avatar">
                                <div class="avatar-fallback"><?php echo strtoupper(substr($strName[0],0,1).substr($strName[1],0,1));?></div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium leading-none"><?php echo strtoupper($row["admin_name"]);?></p>
                                <p class="text-sm text-muted"><?php echo $row["test_name"];?></p>
                                <p class="text-sm text-gray-600"><?php echo $row["message"];?></p>
                                <p class="text-xs text-gray-500"><?php echo date("d-m-Y",strtotime($row["created_at"]));?></p>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
