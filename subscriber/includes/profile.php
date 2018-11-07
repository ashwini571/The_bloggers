<?php include("header_includes.php");?>
<?php include("../../includes/db.php");?>
    <div id="wrapper">

        <!-- Navigation -->
       
       <?php include("navigation_includes.php");?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                             
                        </h1>
                        <?php


	 

if(isset($_POST['edit_profile']))
{
	
	$user_id=$_SESSION['userid'];
 $firstname=$_POST['fname'];
	 $lastname=$_POST['lname'];
	
	 $email=$_POST['email'];
	$password= $_POST['password'];
//	 $post_image=$_FILES['image']['name'];
//	$post_img_tmp = $_FILES['image']['tmp_name'];
		
	 $username=$_POST['username'];
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
	$query = "UPDATE users SET ";
	$query.= "user_firstname='$firstname', ";
	$query.= "user_lastname='$lastname', ";
	
	$query.= "user_email='$email', ";
	$query.= "username='$username', ";
	$query.= "user_password='$hashed_password'	 ";
	$query.="WHERE user_id='$user_id'";
//	$query.= "post_image='$post_image' ";

	

	
	
	
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
		<input type="text" class="form-control" value="<?php echo $_SESSION['fname']?>" name="fname">
	</div>
	
	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control" value="<?php echo $_SESSION['lname']?>" name="lname">
	</div>
	<div class="form-group">
	<label for="post_categories">User Role</label>
	<select class="form-control" name="user_role" value="<?php echo$_SESSION['role']?>" id="user_role">
     
      <option value="Subscriber">Subscriber</option>
         
                
		</select>
	</div>
	
	
	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']?>" >
	</div>
	
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email']?>">
	</div>
	
	<div class="form-group">
		<label for="post_tags">Password</label>
		<input type="password" class="form-control" name="password" value="<?php echo $_SESSION['original_password'];?>">
	</div>
	

		<div class="form-group">
			<input type="submit" name="edit_profile" value="Edit Profile" class="btn btn-primary">
		</div>
</form>


      
                     </div>
                     
         
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>

