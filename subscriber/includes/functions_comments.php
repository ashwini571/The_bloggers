	   <!--  avoiding header error -->
      <?php ob_start();?>
        <!--  connection to database-->
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
	     <?php

 function secure_it($data){
	$data=trim($data);
	$data=stripslashes($data);           
	                                         //this will prevent from cross site scripting
	$data=htmlspecialchars($data);
	return $data;
	
}
 
	
	?>
                   	     
                   	     
                   	     

 
 

<?php

function show_All_comments(){
	global $connection;
	$query="SELECT * FROM  comments ";
  $query .= "ORDER BY comment_date DESC ";

	$result=mysqli_query($connection,$query);	
if(!$result)
{
	die('Query FAILED'. mysqli_error($connection));
}

	
while($row=mysqli_fetch_assoc($result))
 {
	 
	 $comment_post_id=$row['comment_post_id'];
	 $comment_id=$row['comment_id'];
	 $comment_author=$row['comment_author'];
	 $comment_content=$row['comment_content'];
	 
	 
	 
	 $comment_email=$row['comment_email'];
	 
	 
	 
	 $comment_status=$row['comment_status'];
	 
	 $comment_date=$row['comment_date'];
	
	 
	 echo "<tr>";
	 echo "<td>$comment_id</td>";
	
	  echo		"<td>$comment_author</td>";
		echo	"<td>$comment_content</td>";
	 echo	"<td>$comment_email</td>";
			
			
		echo	"<td>$comment_status</td>";
	 
	  $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
       $result1 = mysqli_query($connection,$query);
   
	    while($row1= mysqli_fetch_assoc($result1)){
			$post_title= $row1['post_title'];
			$post_id = $row1['post_id'];
			if(!$post_title)
		 echo "<td>''</td>";
			else
				echo "<td><a href='../../post.php?pid=$post_id'>$post_title</a></td>";
		}
	 

		echo 	"<td>$comment_date</td>";
	  echo "<td><a href='comments.php?approve=$comment_id'  type='submit'>Approve</a></td>";
	  echo "<td><a href='comments.php?unapprove=$comment_id'  type='submit' >Unapprove</a></td>";
	  echo "<td><a onClick=\"javascript:return confirm('Are you sure you want to delete ?')\" href='comments.php?delete=$comment_id'	 type='submit'>Delete</a></td>";
	       
	 echo "</tr>";	
	  
	
 }
	
	
		if(isset($_GET['approve']))
	{
		$comment_get_Id = $_GET['approve'];
		
		$query = "UPDATE comments SET comment_status='Approved' WHERE comment_id=$comment_get_Id ";
			
		$approve_query = mysqli_query($connection,$query);
//			header("Location:comments.php");
		if(!$approve_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
		
	
}
	
	
	
		if(isset($_GET['unapprove']))
	{
		$comment_get_Id = $_GET['unapprove'];
		
		$query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$comment_get_Id ";
			
		$unapprove_query = mysqli_query($connection,$query);
			header("Location:comments.php");
		if(!$unapprove_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
		
	
}

	
	//Php for deleting comments
	
	if(isset($_GET['delete']))
	{
		$comment_get_Id = $_GET['delete'];
		
		$query = "DELETE FROM comments WHERE comment_id=$comment_get_Id ";
			
		$delete_query = mysqli_query($connection,$query);
			header("Location:comments.php");
		if(!$delete_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
		
	
}
	
}
?>



                    	     