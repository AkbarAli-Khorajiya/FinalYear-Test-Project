<?php   
    session_start();
    include 'include/database.php';
    // $_SESSION['option'][$_POST['id']]= $_POST['option'];
    if(isset($_SESSION['exam_status']) && $_SESSION['exam_status']==1)
    {
        if(isset($_POST['confirm']) && $_POST['confirm']==1)
        {
            $reg_id = $_SESSION['s_id'];
            $arr = $_SESSION['option'];
            foreach($arr as $qid => $ans )
            {
                $query = "INSERT INTO `user_submit` (`user_id`, `que_id`, `answer`) VALUES ('$reg_id','$qid','$ans')";
                $result = mysqli_query($link,$query) or die('Query not Executed');
                if($result)
                {
                    echo "<script>window.location.href = 'exam25_home.php';</script>";
                    unset($_SESSION['student_login']);
                    unset($_SESSION['s_id']);
                    unset($_SESSION['option']);
                    unset($_SESSION['exam_status']);
                }
            }
        }
    }
    else
    {
        echo "<style> body{display:none;} </style>";
    }
    mysqli_close($link);
?>
        <style>
            <?php include 'css/user_submit.css';?>
        </style>

            <span>Exam summary</span>
            <table border="1px">
                <thead>
                    <tr>
                        <th>No. of Questions</th> <th>Answered</th> <th>Not Answered</th> <th>Not Visited</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            if(isset($_POST['answer_track_data']))
                            {
                                $arr = $_POST['answer_track_data'];
                              echo "<td> ".$arr['total_que']." </td> <td> ".$arr['answer']." </td> <td> ".$arr['not_answer']." </td> <td> ".$arr['nvisit_answer']." </td>";       
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
            <div class="confirm_box">
                <?php 
                    if(isset($_POST['redirect']) && $_POST['redirect']=='Submit')
                    {
                ?>
                    <p>
                    Are you sure you want to submit for final marking?
                    <br>
                    No changes will be allowed after submission.
                    </p>
                    <button onclick="load(1)">Yes</button><button onclick="load(0)">No</button>
                <?php
                    }
                    else if(isset($_POST['redirect']) && $_POST['redirect']=='time_over')
                    {
                ?>   
                    <p>Are you sure you want to submit for final marking?</p>
                    <button onclick="load(1)">Submit</button>
                <?php
                    }
                ?> 
            </div>
    <script>
        function load(value)
        {
            if(value == 1)
            {
                jQuery('#secondary_section').load('user_submit.php',{confirm:value});
            }
            else if (value == 0)
            {
                var section1 = document.getElementById("primary_section");
                var section2 = document.getElementById("secondary_section");
                section2.removeAttribute("style");
                section1.style.display = 'flex';
                section2.style.display = 'none';
            }
        }
    </script>
