<?php
    session_start();
    // if(!isset($_SESSION['student_login']))
    // {
    //     header('location:student_login.php');
    // }
    // else
    // {
    $link = mysqli_connect('localhost','root','','exam_test');
    //get question id from DB
    $que_get_query = 'select id from question where test_id = 60';
    $que_get_result = mysqli_query($link,$que_get_query);
    $i=0;
    while($row = mysqli_fetch_assoc($que_get_result))
    {
        $id_arr[$i]= $row['id'];
        $i++;
    }
    $count = count($id_arr);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'css/exam_main.css' ?>
    </style>
</head>
<body>
    <header>
        <span><span>Exam</span>Zone</span>
        <span id="clock">00 : 00 : 00</span>
        <span id="u_id">Reg_id-</span>
    </header>
    <section id="primary_section">
        <div class="panel">
            <div id="container">
                    <!-- Question will display Here -->
            </div>
            <div id="container2">
                <div class="alert">
                    <ul id="count">
                        <li><span><input type="text" id="nvisit" value="<?php echo $count;?>" readonly> Not Visited</span></li>
                        <li><span><input type="text" id="ans" value="0" style="background-color: #009E60;" readonly> Answered</span></li>
                        <li><span><input type="text" id="nans" value="0" style="background-color: #E60026;" readonly> Not Answered</span></li>
                    </ul>
                    <ul id="list">
                
                    </ul>
                </div>
            </div>
            <div id="get_value"></div>
        </div>
    </section>
    <section id="secondary_section">

    </section>
</body>
<script>
    <?php include_once 'js/jquery-3.7.1.min.js';?>
    var id_arr = JSON.parse('<?= json_encode($id_arr);?>'); //string array
    id_arr = id_arr.map(Number);                           // Converted into number array
    var max = id_arr.length;
    console.log(id_arr);
    <?php include 'js/exam_main.js'?>
</script>
</html>