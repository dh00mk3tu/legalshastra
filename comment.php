<?php
include('database/db_connect.php');

if(empty($_POST['comment_email']) && empty($_POST['comment_content'])){
    $error_message =  'error';
    $data = $error_message;
     
}else{
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    $blog_id = $_POST['blog_id'];
    $query = "INSERT INTO comment (comment_email, comment, blog_id) values (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
          
        mysqli_stmt_bind_param($stmt, "sss", $comment_email, $comment_content, $blog_id);
            
        $insert = mysqli_stmt_execute($stmt);
        if($insert ){
            $success_message =  'success';
            $data =$success_message;
        }    

}


echo json_encode($data);


    



?>
