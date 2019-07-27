<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>prettyUp!</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
body{
	background: -webkit-linear-gradient(#70205B, #923479); 
    background: -o-linear-gradient(#70205B, #923479); 
    background: -moz-linear-gradient(#70205B, #923479); 
    background: linear-gradient(#70205B, #923479); 
    background-color: #70205B;
}
</style>


</head>
<body>
<h1> 
    <iframe src="https://ntmaker.gfto.ru/newneontexten/?image_height=300&image_width=1350&image_font_shadow_width=30&image_font_size=100&image_background_color=1F1F1F&image_text_color=D819FF&image_font_shadow_color=F723E9&image_url=&image_text=PrettyUp!&image_font_family=Nickainley&" frameborder='no' scrolling='no' width="1350" height="300"></iframe>
</h1>



	<div id="main-wrapper">
	<style>
	
	</style>
	<center><h2>Login Form</h2></center>
		<form action="index.php" method="post">
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from user where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>