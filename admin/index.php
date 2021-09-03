<?php
session_start();
if(isset($_SESSION['admin'])){
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="header">    
                Legal Shastra Admin
            </div>
            <div class="spacer">
            </div>
            <!-- // make two text fields in html -->
            <form class="login-form" action="index.php" method="post">
                <input type="text" name="username" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <div class="spacer">

                </div>
                <div class="button-host">
                    <button class="btn" type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php	
include('database/db_connect.php');
if(isset($_POST['login'])){
		$user_id = $_POST['username'];
		$user_pass = md5($_POST['password']);
		$sql = "select * from admin where username = ? and password = ?";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo '<script>alert("Something went Wrong")</script>';
		}

		else{
			mysqli_stmt_bind_param($stmt, "ss", $user_id, $user_pass);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_store_result($stmt);
			$row =  mysqli_stmt_num_rows($stmt);
			
			if($row == 1){
				session_start();
				$_SESSION['admin'] = $user_id;
                echo '<script>alert("Login Successfully")</script>';
				 echo"<script>window.open('dashboard.php','_self')</script>";
				}
				else{
					echo '<script>alert("Invalid username or password")</script>';
                    echo"<script>window.open('index.php','_self')</script>";
				}
			

		}
	}

?>
</html>
