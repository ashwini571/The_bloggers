<?php


if(isset($_GET['uid']))
{

	$user_get_id=$_GET['uid'];
$query1="SELECT * FROM  users WHERE user_id = $user_get_id ";


	$select_user_by_id=mysqli_query($connection,$query1);	
if(!$select_user_by_id)
{
	die('Query FAILED'. mysqli_error($connection));
}
}

$row=mysqli_fetch_assoc($select_user_by_id);
 
	 $user_id=$row['user_id'];
	 $username=$row['username'];
	 $user_password=$row['user_password'];
	 $user_firstname=$row['user_firstname'];
	 
	 $user_lastname=$row['user_lastname'];
	 $user_image=$row['user_image'];
	 $user_email=$row['user_email'];
	 $user_role=$row['user_role'];
	 $date=$row['date'];
	 
 
	 

if(isset($_POST['edit_user']))
{
	
	
 $firstname=$_POST['fname'];
	 $lastname=$_POST['lname'];
	 $userrole=$_POST['user_role'];
	 $email=$_POST['email'];
	
//	 $post_image=$_FILES['image']['name'];
//	$post_img_tmp = $_FILES['image']['tmp_name'];
		
	 $username=$_POST['username'];
     $password=$_POST['password'];
	
//	move_uploaded_file($post_img_tmp,"../../images/$post_image");
//	
//	
	
//	if(empty($post_image))
//
//	{
//		$query = "SELECT * FROM posts WHERE post_id = $post_get_id";
//		
//		$select_image = mysqli_quey($connection,$query);
//		$row = mysqli_fetch_assoc($select_image);
//		$post_image = $row['post_image'];	
//		
//
//		
//	}
	
	
	
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
			
	$query = "UPDATE users SET ";
	$query.= "user_firstname='$firstname', ";
	$query.= "user_lastname='$lastname', ";
	$query.= "user_role='$userrole', ";
	
	$query.= "user_email='$email', ";
	$query.= "username='$username', ";
	$query.= "user_password='$hashed_password'	 ";
//	$query.= "post_image='$post_image' ";
	$query.= "WHERE user_id =$user_get_id";	
	

	
	
	
	$edit_user=mysqli_query($connection,$query);
	
	if(!$edit_user){
		die("Query FAILED!!".mysqli_error($connection));
}
	else{
		echo "<h3 style='color:Blue;'>Profile Updated Successfully!!</h3>";
	}
	
}





?>
<form action="" method = "post" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="fname">Firstname</label>
		<input type="text" class="form-control" value="<?php echo $user_firstname?>" name="fname">
	</div>
	
	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control" value="<?php echo $user_lastname?>" name="lname">
	</div>
	<div class="form-group">
	<label for="post_categories">User Role</label>
	<select class="form-control" name="user_role" value="<?php echo $user_role?>" id="user_role">
     
      <option value="<?php echo $user_role?>"><?php echo $user_role?></option>
           <?php
		if($user_role=='Admin')
			echo "<option value='admin'>Subscriber</option>";
		else
			echo "  <option value='subscriber'>Admin</option>";
		
		
		
		?>
            
                
		</select>
	</div>
	
	
	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $username?>" >
	</div>
	
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="text" class="form-control" name="email" value="<?php echo $user_email?>">
	</div>
	
	<div class="form-group">
		<label for="post_tags">Password</label>
		<input type="password" class="form-control" name="password" value="<?php echo $password?>">
	</div>
	

		<div class="form-group">
			<input type="submit" name="edit_user" value="Edit User" class="btn btn-primary	">
		</div>
</form>





