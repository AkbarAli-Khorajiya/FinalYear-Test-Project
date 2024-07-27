<?php
    include 'include/database.php';
    if(isset($_POST['reg_id']))
    {
        $del_query = 'delete from student_reg where reg_id='.$_POST['reg_id'];
        $result = mysqli_query($link,$del_query);
    }
    $query = 'select *from student_reg';
    $result = mysqli_query($link,$query);
?>
<div class="student-title">
    <span>STUDENT DETAILS</span>
</div>
<div class="student-container">
    <div class="student-display">
        <table>
            <thead>
                <tr>
                    <th>Reg_id</th><th>First Name</th><th>Username</th><th>Email</th><th>Phone_number</th><th>Gender</th><th>Collage</th><th>Course</th><th>Semester</th><th colspan="2" align="center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>
                <tr>
                    <td><?php echo $row['reg_id']?></td>
                    <td> <?php echo $row['f_name']?> </td>
                    <td><?php echo $row['u_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone_number']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['collage']?></td>
                    <td><?php echo $row['course']?></td>
                    <td><?php echo $row['semester']?></td>
                    <td><button class="edit" onclick="">Edit</button></td>
                    <td><button class="delete" onclick="stud_del(<?php echo $row['reg_id'];?>)">Delete</button></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php mysqli_close($link);?>
<script>
    <?php include 'js/student.js';?>
</script>