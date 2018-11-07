		   <!--  connection to database-->
		  <?php ob_start();?>
			 <?php

	$connection = mysqli_connect("localhost","root","","blog");

	if($connection)
		echo "<div class='alert alert-success alert-dismissible fade in'>
	  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	  <strong>We are connected</strong>
	</div>";
	else
			echo "<div class='alert alert-danger alert-dismissible fade in'>
	  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	  <strong>Error connecting!!</strong>
	</div>";

		?>




	 <!--Functions for Posts-->

	<?php

	function showAllusers(){
		global $connection;
		$query="SELECT * FROM  users ";
		
  $query .= "ORDER BY date DESC ";


		$result=mysqli_query($connection,$query);	
	if(!$result)
	{
		die('Query FAILED'. mysqli_error($connection));
	}


	while($row=mysqli_fetch_assoc($result))
	 {
		 $user_id=$row['user_id'];
		 $username=$row['username'];
		 $user_password=$row['user_password'];
		 $user_firstname=$row['user_firstname'];

		 $user_lastname=$row['user_lastname'];
		 $user_image=$row['user_image'];
		 $user_email=$row['user_email'];
		 $user_role=$row['user_role'];
		 $date=$row['date'];

		 echo "<tr>";
		 echo "<td>$user_id</td>";

		  echo		"<td>$username</td>";
			echo	"<td>$user_firstname</td>";
			echo	"<td>$user_lastname</td>";
			echo	"<td>$user_email</td>";
			echo 	"<td>$user_role</td>";
			echo    "<td>$date</td>";

				echo    "<td><a href='users.php?change_to_admin=$user_id' type='submit' >Admin</a></td>";
			echo    "<td><a href='users.php?change_to_sub=$user_id' type='submit' >Subscriber</a></td>";

			echo    "<td><a href='users.php?source=edit_user&uid=$user_id' type='submit'>Edit</a></td>";
		 echo    "<td><a href='users.php?deleteuser=$user_id' type='submit' class='btn btn-danger'>Delete</a></td>";
		 echo "</tr>";


	 }//Here on line 63 we are passing two parameter using ampersand operator  




			if(isset($_GET['change_to_admin']))
		{
			$user_get_Id = $_GET['change_to_admin'];

			$query = "UPDATE users SET user_role='Admin' WHERE user_id=$user_get_Id ";

			$admin_query = mysqli_query($connection,$query);
				header("Location:users.php");
			if(!$admin_query)	
			{
				die("Query FAILED!!".mysqli_error($connection));
			}


	}



			if(isset($_GET['change_to_sub']))
		{
			$user_get_Id = $_GET['change_to_sub'];

			$query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id=$user_get_Id ";

			$sub_query = mysqli_query($connection,$query);
					header("Location:users.php");
			if(!$sub_query)	
			{
				die("Query FAILED!!".mysqli_error($connection));
			}


	}
		if(isset($_GET['deleteuser']))

		{
			if(isset($_SESSION['user_role']))//This is to prevent anybody to delete pur data by using http request
	  {
			$post_Id = $_GET['deleteuser'];

			$query = "DELETE FROM users ";

			$query .="WHERE user_id =$user_id";	
			$delete_query = mysqli_query($connection,$query);
				header("Location:users.php");
			if(!$delete_query)	
			{
				die("Query FAILED!!".mysqli_error($connection));
			}

				}

	}

	}
	?>
