<?php

if(isset($_POST['create_post']))
{
	
	
	 $post_author=$_POST['author'];
	 $post_title=$_POST['title'];
	 $post_category_id=$_POST['post_category'];
	 $post_status=$_POST['post_status'];
	
	 $post_image=$_FILES['image']['name'];
	$post_img_tmp = $_FILES['image']['tmp_name'];
		
	 $post_tags=$_POST['post_tags'];
     $post_content=$_POST['post_content'];
	 
	 $post_date=date('d-m-y');
	
	
	move_uploaded_file($post_img_tmp,"../../images/$post_image");
	
	
	$query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
	$query.="VALUES('$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";
	
	$create_post_query = mysqli_query($connection,$query);
		$the_post_id = mysqli_insert_id($connection);//Used to fetch the last inserted id in the table
	if(!$create_post_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
	
	
	else{
		echo "<h3>Post Created</h3>"."<a href='../../post.php?pid={$the_post_id}''>View Post</a>" ;	
	}
	
	
}



?>









<form action="" method = "post" enctype="multipart/form-data" >
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
	<label for="post_categories">Post Categories</label>
	<select class="form-control" name="post_category" id="post_category">
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
		<input type="text" class="form-control" name="author">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" id="" class="form-control">
			<option value="Draft">Select-Option</option>
			<option value="Published">Publish</option>
			<option value="Draft">Draft</option>
			 	
		</select>
	</div>
	
	
	
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div>
	
	<div class="form-group">
		<label for="post_tags"><Pos></Pos>t Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>
	
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="body" cols="30" rows="10" class="form-control">
			
		</textarea>
		<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>><!-- for ck editor-->
		
		</div>
		<div class="form-group">
			<input type="submit" name="create_post" value="Publish Post" class="btn btn-primary	">
		</div>
</form>