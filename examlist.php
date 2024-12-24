<?php
    include_once 'include/database.php';
    date_default_timezone_set('Asia/Kolkata');
    $today_test_query = "SELECT * FROM test WHERE test_start_date = CURDATE() AND test_start_time > CURTIME()";
    $today_test_result = mysqli_query($link, $today_test_query);
    $upcoming_test_query = "SELECT * FROM test WHERE test_start_date > CURDATE()";
    $upcoming_test_result = mysqli_query($link, $upcoming_test_query);
    $ongoing_test_query = "SELECT *, ADDTIME(test_start_time, SEC_TO_TIME(duration * 60)) AS test_end_time FROM test WHERE test_start_date = CURDATE() AND test_start_time < CURTIME() AND ADDTIME(test_start_time, SEC_TO_TIME(duration * 60)) > CURTIME()";
    $ongoing_test_result = mysqli_query($link, $ongoing_test_query);

    function getRemainingTime($end_time)
    {
        $end_time = new DateTime($end_time);
        $current_time = new DateTime();
        $remaining_time = $current_time->diff($end_time);
        return $remaining_time->format('%Hh %Im %Ss');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test List</title>
    <style type="text/css">
        <?php 
            include 'css/examlist.css'; 
        ?>
    </style>
    <script type="text/javascript">
        <?php include_once 'js/jquery-3.7.1.min.js'; ?>
    </script>
</head>
<body>
    <?php include_once 'include/loader.php';?>
    <?php include_once 'include/header.php'; ?>
    <section>
        <div class="list-container">
            <div id="ongoing-test" class="panel">
                <div class="title">
                    <h1>Ongoing Tests</h1>
                </div>
                <table class="test-list">
                    <tr class="head">
                        <td>Test Name</td>
                        <td>Remaining Time</td>
                        <td>Class</td>
                    </tr>
                   <?php
                        if(mysqli_num_rows($ongoing_test_result) == 0)
                        {
                            echo "<tr class='body'>
                                    <td colspan='3' style='text-decoration:none;color:black'>No tests are ongoing</td>
                                </tr>";
                        }
                        while($row = mysqli_fetch_assoc($ongoing_test_result))
                        {
                            $remaining_time = getRemainingTime($row['test_end_time']);
                            echo "<tr class='body'>
                                    <td id='".$row['id']."' class='test-name'>".$row['test_name']."</td>
                                    <td>".$remaining_time."</td>
                                    <td>
                                        <span>".$row['created_for']."</span>
                                    </td>
                                </tr>";
                        }
                   ?>
                </table>
            </div>
            <div id="Today-test" class="panel">
                <div class="title">
                    <h1>Today's Tests</h1>
                </div>
                <table class="test-list">
                    <tr class="head">
                        <td>Test Name</td>
                        <td>Start Time</td>
                        <td>Class</td>
                    </tr>
                    <?php
                        if(mysqli_num_rows($today_test_result) == 0)
                        {
                            echo "<tr class='body'>
                                    <td colspan='3'>No tests scheduled for today</td>
                                </tr>";
                        }
                        while($row = mysqli_fetch_assoc($today_test_result))
                        {
                            echo "<tr class='body'>
                                    <td>".$row['test_name']."</td>
                                    <td>".date("h:i",strtotime($row['test_start_time']))."</td>
                                    <td>
                                        <span>".$row['created_for']."</span>
                                    </td>
                                </tr>";
                        }
                   ?>
                </table>
            </div>
            <div id="upcoming-test" class="panel">
                <div class="title">
                    <h1>Upcoming Tests</h1>
                </div>
                <table class="test-list">
                    <tr class="head">
                        <td>Test Name</td>
                        <td>Date</td>
                        <td>Class</td>
                    </tr>
                    <?php
                        if(mysqli_num_rows($upcoming_test_result) == 0)
                        {
                            echo "<tr class='body'>
                                    <td colspan='3'>No tests are scheduled</td>
                                </tr>";
                        }
                        while($row = mysqli_fetch_assoc($upcoming_test_result))
                        {
                            echo "<tr class='body'>
                                    <td>".$row['test_name']."</td>
                                    <td>".$row['test_start_date']."</td>
                                    <td>
                                        <span>".$row['created_for']."</span>
                                    </td>
                                </tr>";
                        }
                   ?>
                </table>
            </div>
        </div>
    </section>
</body>
<script>
    $(".test-name").on('click', (e)=> {
        location.href = "exam_main.php?id="+e.target.id;
    });
</script>
</html>