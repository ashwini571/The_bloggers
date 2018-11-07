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

function showAllposts(){
	global $connection;
	$query="SELECT * FROM  posts WHERE post_author='';
	
  $query .= "ORDER BY post_id DESC ";


	$result=mysqli_query($connection,$query);	
if(!$result)
{
	die('Query FAILED'. mysqli_error($connection));
}

	
while($row=mysqli_fetch_assoc($result))
 {
	 $post_id=$row['post_id'];
	 $post_author=$row['post_author'];
	 $post_title=$row['post_title'];
	 
	 
	 
	 $post_category=$row['post_category_id'];
	 
	 
	 
	 $post_status=$row['post_status'];
	 $post_image=$row['post_image'];
	 $post_tags=$row['post_tags'];
	 $post_comment=$row['post_comment_count'];
	 $post_date=$row['post_date'];
	 $post_views = $row['post_views'];
	 
	 echo "<tr>";
	 ?>
	 
	 <td><input type='checkbox' id='' class='checkBoxes' name='checkBoxArray[]' value="<?php echo $post_id?>"></td>
	 
	 <?php
	 echo "<td>$post_id</td>";
	
	  echo		"<td>$post_author</td>";
		echo	"<td><a href='../../post.php?pid=$post_id'>$post_title</a></td>";
			
			
			
			
		 
		 $query = "SELECT * FROM categories WHERE cat_id = {$post_category}";
       $result1 = mysqli_query($connection,$query);
   
	    while($row1= mysqli_fetch_assoc($result1)){
			$cat_title= $row1['cat_title'];
			$cat_id = $row1['cat_id']; 
		    echo "<td>$cat_title</td>";
		}
	
		echo	"<td>$post_status</td>";
		echo 	"<td><img src='../../images/$post_image' class='img-responsive' alt='image'  width='100'></td>";
		echo 	"<td>$post_tags</td>";
		echo	"<td>$post_comment</td>";
		echo 	"<td>$post_date</td>";
	    echo    "<td><a href='posts.php?publish=$post_id' type='submit'>Publish</a></td>";
	     
	        echo "<td><a href='posts.php?source=edit_post&pid={$post_id}' type='submit' class='btn btn-default'>Edit</a></td>";
	 echo    "<td><a onClick=\"javascript:return confirm('Are you sure you want to delete ?')\" href='posts.php?deletepost=$post_id' type='submit' class='btn btn-danger'>Delete</a></td>";
	 echo "<td> $post_views</td>";
	 echo "</tr>";
	  
	
 }//Here on line 63 we are passing two parameter using ampersand operator  
	if(isset($_GET['deletepost']))
	{
		$post_Id = $_GET['deletepost'];
		
		$query = "DELETE FROM posts ";
		
		$query .="WHERE post_id =$post_Id";	
		$delete_query = mysqli_query($connection,$query);
			header("Location:posts.php");
		if(!$delete_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
		
	
}
	
	
	
		if(isset($_GET['publish']))
	{
		$post_get_Id = $_GET['publish'];
		
		$query = "UPDATE posts SET post_status='Published' WHERE post_id=$post_get_Id ";
			
		$publish_query = mysqli_query($connection,$query);
			header("Location:posts.php");
		if(!$publish_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
		
	
}
	

	
	
	
}
?>
                    	     