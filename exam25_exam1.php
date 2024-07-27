<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam25</title>
    <style>
        <?php include'css/exam25_exam1.css' ?>
    </style>
</head>
<body>
    <div class="container">
        <form action="student_login.php" method="get">
            <ul>
                <li> <label>Select exam you would like to appear</label> </li>
                <li>  
                    <select id="firstMenu" name="firstMenu">
                        <option value="Select">--select--</option>
                        <option value="BCA SEM-3">BCA SEM-3</option>
                        <option value="BCA SEM-4">BCA SEM-4</option>
                    </select>
                </li>
                <li> <label>Paper</label> </li>
                <li>  
                    <select id="secondMenu" name="secondMenu">
                        <option>--select--</option>
                    </select>
                </li>
                <li> <input type="submit" value="START EXAM" name="submit"></li>
            </ul>
        </form>
    </div>
    <div class="box">
        <img src="image/4.png">
    </div>
    <script>
        <?php include 'js/exam25_exam1.js' ?>
    </script>
</body>
</html>