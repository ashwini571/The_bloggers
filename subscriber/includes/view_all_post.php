
<!-- Query to update to publish or draft or delete through checkboxes -->

<?php
if(isset($_POST['checkBoxArray']))
{
  foreach($_POST['checkBoxArray'] as $postId)
  {
	  $bulk_options=$_POST['bulk_option'];
		  switch($bulk_options){
			  case 'Published':
				  $query="UPDATE posts SET post_status='{$bulk_options}' WHERE post_id=$postId";
				  $update_to_publish=mysqli_query($connection,$query);
				  if(!$update_to_publish)
				  {
					  die("Query Failed".mysqli_error($connection));
				  }
				  break;	
				
				  case 'Draft':
				  $query="UPDATE posts SET post_status='{$bulk_options}' WHERE post_id=$postId";
				  $update_to_draft=mysqli_query($connection,$query);
				  if(!$update_to_draft)
				  {
					  die("Query Failed".mysqli_error($connection));
				  }

				  	  case 'Delete':
				  $query="DELETE FROM posts  WHERE post_id=$postId";
				  $delete_query=mysqli_query($connection,$query);
				  if(!$delete_query)
				  {
					  die("Query Failed".mysqli_error($connection));
				  }
				  break;
		  }
  }
	
	
}


?>
                        			


		   <form action="" method="post">  
				<table class="table table-striped table-bordered ">
				<div id="BulkOption" class="col-xs-4">
				<select name="bulk_option" id="" class="form-control">
					<option value="default">Select-Option</option>
					<option value="Published">Publish</option>
					<option value="Draft">Draft</option>
					<option value="Delete">Delete</option>
				</select>
			</div>
			<div class="col-xs-4">
				<input type="submit" name="submit" class="btn btn-success" value="Apply">
				<a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
			</div>
			<thead>
			<th><input type="checkbox" id="selectAllBoxes"></th>
				<th>Id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Category</th>
				<th>Status</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Comments</th>
				<th>Date</th>
				<th>Publish</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Views</th>
			</thead>
			<tbody>
			<?php showAllposts();?>
			</tbody>
		</table>
</form>