<?php
session_start();
$link = mysqli_connect('localhost','root','','exam_test');
    $html = "";
    $id = $_POST['id'];
    $query = 'select *from question where id ='.$id;
    $result = mysqli_query($link,$query) or die('Query not Executed');
    while($row = mysqli_fetch_assoc($result))
    {
        $que_id = $row['id'];
        $question = $row['question'];
        $option_query = 'select *from options where que_id ='.$que_id;
        $option_result = mysqli_query($link,$option_query) or die('Query not Executed');
        while($option = mysqli_fetch_assoc($option_result))
        {
            $option_a = $option['options'];
            $option_b = $option['options'];
            $option_c = $option['options'];
            $option_d = $option['options'];
        }

    }
    mysqli_close($link);
 $html .='<div class="que_container">
 <div class="que-dis">
     <span lang="en">'.$que_id.'.'.$question.'</span>
 </div>
 <div class="option-dis">
     <span class="option">
         <input type="radio" id="option_a" name="option" value="'.$option_a.'"> 
         <label for="option_a"> A. '.$option_a.'</label>
     </span> 
     <span class="option">
         <input type="radio" id="option_b" name="option" value="'.$option_b.'">
         <label for="option_b">B. '.$option_b.'</label>
     </span>
     <span class="option"> 
         <input type="radio" id="option_c" name="option" value="'.$option_c.'">
         <label for="option_c">C. '.$option_c.'</label>
     </span> 
     <span class="option"> 
         <input type="radio" id="option_d" name="option" value="'.$option_d.'">
         <label for="option_d">D. '.$option_d.'</label>
     </span>
 </div>
</div>
<div class="button">
 <span>
     <input type="button" id="back" value="Back" onclick="go(this)">
     <input type="button" id="next" value="Next" onclick="go(this)" onfocus="valid()">
 </span>
 <span><input type="submit" value="Submit" name="submit" onclick="redirect(this.value)"></span>
</div>
<script>option_check();</script>';
    echo $html;
?>    