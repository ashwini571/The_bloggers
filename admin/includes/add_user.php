<?php

if(isset($_POST['add_user']))
{
	
	
	 $firstname=$_POST['fname'];
	 $lastname=$_POST['lname'];
	 $userrole=$_POST['user_role'];
	 $email=$_POST['email'];
	
//	 $post_image=$_FILES['image']['name'];
//	$post_img_tmp = $_FILES['image']['tmp_name'];
		
	 $username=$_POST['username'];
     $password=$_POST['password'];
	 
//	 $post_date=date('d-m-y');
	
	
//	move_uploaded_file($post_img_tmp,"../../images/$post_image");
//	
	
	$query = "INSERT INTO users(user_firstname,user_lastname,user_role,user_email,username,user_password,date)";
	$query.="VALUES('$firstname','$lastname','$userrole','$email','$username ' ,'$password',now())";
	
	$create_post_query = mysqli_query($connection,$query);
		
	if(!$create_post_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
	else
		echo "User created" .":" . "<a href='users.php'>View Users</a>";
	
	
	
	
	
}



?>









<form action="" method = "post" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="fname">Firstname</label>
		<input type="text" class="form-control" name="fname">
	</div>
	
	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control" name="lname">
	</div>
	<div class="form-group">
	<label for="post_categories">User Role</label>
	<select class="form-control" name="user_role" id="user_role">
      <option value="subscriber">Select-option</option>
            <option value="admin">Admin</option>
                  <option value="subscriber">Subscriber</option>
		</select>
	</div>
	
	
	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" class="form-control" name="username" >
	</div>
	
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="text" class="form-control" name="email">
	</div>
	
	<div class="form-group">
		<label for="post_tags">Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	

		<div class="form-group">
			<input type="submit" name="add_user" value="Add User" class="btn btn-primary	">
		</div>
</form>