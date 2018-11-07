<?php include("db.php")?>


<?php session_start();?>
<?php
	
	if(isset($_POST['login']))
	{
		$email= $_POST['email'];
		$password= $_POST['password'];
		
		$email= mysqli_real_escape_string($connection,$email);
		
		$password= mysqli_real_escape_string($connection,$password);

		$query = "SELECT * FROM users WHERE user_email='$email'";
		$result = mysqli_query($connection,$query);
		if(!$result)
		{
			die("Query failed".mysqli_error($connection));
		}
		
				
         while($row = mysqli_fetch_assoc($result))
		{
			$db_user_id= $row['user_id'];
			$db_user_email= $row['user_email'];
			$db_user_password= $row['user_password'];
			$db_user_role= $row['user_role'];
			$db_user_firstname= $row['user_firstname'];
			$db_user_lastname= $row['user_lastname'];
			
		}
		
		if($email===$db_user_email && $password===$db_user_password &&$db_user_role==='Admin' )
		{
			header("location: ../admin/index.php");
			$_SESSION['fname']=$db_user_firstname;
			$_SESSION['lname']=$db_user_lastname;
	     	$_SESSION['role']=$db_user_role;
			     	$_SESSION['email']=$db_user_email;
			     	$_SESSION['password']=$db_user_password;
			$_SESSION['username']=$db_username;
			
		}
		else {
			header("location: ../index.php");
		}
		

	}

	
	?>