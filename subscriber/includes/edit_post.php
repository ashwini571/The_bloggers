<?php


if(isset($_GET['pid']))
{

	$post_get_id=$_GET['pid'];
$query1="SELECT * FROM  posts WHERE post_id = $post_get_id ";


	$select_post_by_id=mysqli_query($connection,$query1);	
if(!$select_post_by_id)
{
	die('Query FAILED'. mysqli_error($connection));
}
}


$row=mysqli_fetch_assoc($select_post_by_id);
     
	 $post_id=$row['post_id'];
	 $post_author=$row['post_author'];
	 $post_title=$row['post_title'];
	 $post_category=$row['post_category_id'];
	 $post_status=$row['post_status'];
	 $post_image=$row['post_image'];
	 $post_content = $row['post_content'];
	 $post_tags=$row['post_tags'];
	 $post_comment=$row['post_comment_count'];
	 $post_date=$row['post_date'];
 
	 

if(isset($_POST['edit_post']))
{
	
	
	 $post_author=$_POST['author'];
	 $post_title=$_POST['title'];
	 $post_category_id=$_POST['post_category'];
	 $post_status=$_POST['post_status'];
	
	 $post_image=$_FILES['image']['name'];
	$post_img_tmp = $_FILES['image']['tmp_name'];
		
	 $post_tags=$_POST['post_tags'];
     $post_content=$_POST['post_content'];
	 
	
	
	move_uploaded_file($post_img_tmp,"../../images/$post_image");
	
	
	
	if(empty($post_image))

	{
		$query = "SELECT * FROM posts WHERE post_id = $post_get_id";
		
		$select_image = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($select_image);
		$post_image = $row['post_image'];		
		
	}
	$query = "UPDATE posts SET ";
	$query.= "post_title='$post_title', ";
	$query.= "post_category_id='$post_category_id', ";
	$query.= "post_author='$post_author', ";
	$query.= "post_date= now(), ";
	$query.= "post_status='$post_status', ";
	$query.= "post_tags='$post_tags', ";
	$query.= "post_content='$post_content', ";
	$query.= "post_image='$post_image' ";
	$query.= "WHERE post_id =$post_get_id";	
	

	
	
	
	$edit_post=mysqli_query($connection,$query);
	
	if(!$edit_post){
		die("Query FAILED!!".mysqli_error($connection));
}
else{
		echo "Post Updated" .":" . "<a href='../../post.php?pid={$post_get_id}'>View Post</a>";	
	}
}



?>





<form action="" method ="post" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" value="<?php echo $post_title?>" class="form-control" name="title">
	</div>
	
	<div class="form-group">
	<label for="post_categories">Post Categories</label>
	
		<select name="post_category" id="post_category" class="form-control" >
		
	
		<?php
	
							
	   $query = "SELECT * FROM categories";
       $result = mysqli_query($connection,$query);
       
			   
if(!$result)
{
die('Query FAILED'. mysqli_error($connection));
}
			   
	    while($row = mysqli_fetch_assoc($result)){
			$cat_title= $row['cat_title'];
			$cat_id = $row['cat_id'];
			
			echo "<option value='{$cat_id}' >$cat_title</option>";
		}
			   
  			   
			   
	
	
	?>
		</select>
	</div>
	
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" value="<?php echo $post_author?>" class="form-control" name="author">
	</div>
	
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" id="" class="form-control">
		<option   value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
		<?php
			
			if($post_status=='Published')
			{
				echo "<option value='Draft'>Draft</option>";
			}
			else{
				echo "<option value='Published'>Publish</option>";
			}
		
		?>
	</select>
	</div>
	<div class="form-group">
	<label for="post_tags">Post images</label>
	
		<div><img width='100' src="../../images/<?php echo $post_image?>" alt="image"></div>
		<input type="file" name="image" value="../../images/<?php echo $post_image?>">
	</div>
	
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" value="<?php echo $post_tags?>" class="form-control" name="post_tags">
	</div>
	
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content"  cols="30" rows="10" id="edit_post" class="form-control">
			<?php echo "$post_content";?>
		</textarea>
		
		<script>
		 ClassicEditor
        .create( document.querySelector( '#edit_post' ) )
        .catch( error => {
            console.error( error );
        } );
		</script>
		
		</div>
		<div class="form-group">
			<input type="submit" name="edit_post" value="Update Post" class="btn btn-primary">
		</div>
</form>