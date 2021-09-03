<?php
include('database/db_connect.php');
$id = $_REQUEST['id'];
$sql = "SELECT * from comment where blog_id = ? order by id desc";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
$insert = mysqli_stmt_execute($stmt);


        if($insert){
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_array($result)){
        echo  "<div class='panel panel-default'><div class='panel-heading'>By <b>".$row['comment_email']."</b> on <i>".$row['datetime']."</i></div><div class='panel-body'>".$row['comment']."</div></div>";
            }
        
        }    

?>