<?php include("includes/db.php")?>


<?php session_start();?>
<?php
	
	if(isset($_POST['login']))
	{
		$email= $_POST['email'];
		$password= $_POST['password'];
				$email= mysqli_real_escape_string($connection,$email);
		
		$password= mysqli_real_escape_string($connection,$password);		
		//Blowfish password encryption 
			
			
			$salt_query="SELECT randSalt FROM users";
		$select_salt_query= mysqli_query($connection,$salt_query);
			
			
			
			if(!$select_salt_query)
		{
			die("Query failed".mysqli_error($connection));
		}
			
		$r=mysqli_fetch_assoc($select_salt_query);
		$salt = $r['randSalt'];	
			
		
		$hashed_password = crypt($password,$salt);
		


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
				$db_username= $row['username'];
			
		}
		
		if($email===$db_user_email && $hashed_password===$db_user_password &&$db_user_role==='Admin' )
		{
			header("location: admin/index.php");	
			$_SESSION['fname']=$db_user_firstname;
	     	$_SESSION['role']=$db_user_role;
			$_SESSION['lname']=$db_user_lastname;
			$_SESSION['username']=$db_username;
			$_SESSION['email']=$db_user_email;
			$_SESSION['password']=$db_user_password;
			
			$_SESSION['original_password']=$password;
			$_SESSION['userid']=$db_user_id;
		}
		else if($email===$db_user_email && $hashed_password===$db_user_password &&$db_user_role==='Subscriber')
		{
				header("location:subscriber/index.php");	
			$_SESSION['fname']=$db_user_firstname;
	     	$_SESSION['role']=$db_user_role;
			$_SESSION['lname']=$db_user_lastname;
			$_SESSION['username']=$db_username;
			$_SESSION['email']=$db_user_email;
			$_SESSION['password']=$db_user_password;
			$_SESSION['original_password']=$password;
			$_SESSION['userid']=$db_user_id;
		}
	else{
					
			 echo "<h2> Invalid Credentials</h2>";
			}
				

	}
?>










	
	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="css/login_css.css" rel="stylesheet">
	
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<body>

<div class="container">

	<form class="signIn" action="" method="post">
		<h3>Welcome</br>Back !</h3>


		<input type="email" placeholder="Insert E-mail" autocomplete='off' name="email" reqired />
		<input type="password" placeholder="Insert Password" name="password" reqired />
		<button class="form-btn sx back" type="button">Back</button>
		<button class="form-btn dx" type="submit" name="login">Log In</button>
	</form>
		<form class="signUp" method="post" action="">
		

		<h3>Create Your Account</h3>
	
		</p>
		
		<input type="text" placeholder="First Name" reqired name="firstname" />
		<input type="text" placeholder="Last Name" reqired  name="lastname"/>
		<input class="w100" type="email" placeholder="Insert E-mail" reqired autocomplete='off' name="newemail" />
		<input type="password" placeholder="Insert Password" reqired name="newpassword" />
		<input type="text" placeholder="Username" reqired name="newusername" />
		<button class="form-btn sx log-in" type="button">Log In</button>
		<button class="form-btn dx" type="submit" name="signup">Sign Up</button>
	</form>
</div>
<?php

if(isset($_POST['signup']))
{
		$new_email= $_POST['newemail'];
		$new_password= $_POST['newpassword'];
		$new_firstname= $_POST['firstname'];
		$new_lastname= $_POST['lastname'];
		$new_username= $_POST['newusername'];
		
		if(!empty($new_email) && !empty($new_firstname) && !empty($new_lastname) && !empty($new_password) && !empty($new_username))
		{
		
			$new_firstname= mysqli_real_escape_string($connection,$new_firstname);
		$new_lastname=  mysqli_real_escape_string($connection,$new_lastname);
			$new_username=  mysqli_real_escape_string($connection,$new_username);
		$new_email= mysqli_real_escape_string($connection,$new_email);
		
		$new_password= mysqli_real_escape_string($connection,$new_password);
			
			
		//Blowfish password encryption 
			
			
			$salt_query="SELECT randSalt FROM users";
		$select_salt_query= mysqli_query($connection,$salt_query);
			
			
			
			if(!$select_salt_query)
		{
			die("Query failed".mysqli_error($connection));
		}
			
		$r=mysqli_fetch_assoc($select_salt_query);
		$salt = $r['randSalt'];	
			
		
		$hashed_password = crypt($new_password,$salt);
			
			//Entry of userfields

		$query = "INSERT INTO users(user_firstname,user_lastname,user_role,user_email,username,user_password,date)";
	$query.="VALUES('$new_firstname','$new_lastname','Subscriber','$new_email','$new_username' ,'$hashed_password',now())";
		$result = mysqli_query($connection,$query);
		if(!$result)
		{
			die("Query failed".mysqli_error($connection));
		}
	     
	}
	
	else{
		echo "<script>alert('Fields should not be empty!')</script>";
	}

	
	
	
}

?>

<!--Javascript code for sliding animation-->
<script>
	$(".log-in").click(function(){
    $(".signIn").addClass("active-dx");
    $(".signUp").addClass("inactive-sx");
    $(".signUp").removeClass("active-sx");
    $(".signIn").removeClass("inactive-dx");
});

$(".back").click(function(){
    $(".signUp").addClass("active-sx");
    $(".signIn").addClass("inactive-dx");
    $(".signIn").removeClass("active-dx");
    $(".signUp").removeClass("inactive-sx");
});</script>

</body>
</html>