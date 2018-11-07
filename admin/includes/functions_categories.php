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
                    	      <!--Php code for submitting new categories-->
                     	  
                     	    	  
 <?php 
	                  


 function add_category(){

	 global $connection;

	 if(isset($_POST['submit']))
	 {
		 $cat_title = $_POST['add_category'];

		 if($cat_title == "" || empty($cat_title))
		 {
			 echo "* This field should not be empty ";
		 }
		 else{

			 $query = "INSERT INTO categories(cat_title)";
			 $query.= "VALUE('{$cat_title}')";

			 $add_category = mysqli_query($connection,$query);
			 if(!$add_category)
			 {
				 die("Query Failed".mysqli_error($connection));
			 }

	 }


 }

} 


function fetch_categories(){
	
	
	    global $connection; 
							
	   $query = "SELECT * FROM categories";
       $result = mysqli_query($connection,$query);
   
	    while($row = mysqli_fetch_assoc($result)){
			$cat_title= $row['cat_title'];
			$cat_id = $row['cat_id'];
		    echo "<tr>
			
			<td >$cat_id</td>
			<td>$cat_title</td>
		   
           
			
		    <td> <a href='categories.php?editid=$cat_id' class='btn btn-default' >Edit</a></td>  
			 <td><a onClick=\"javascript:return confirm('Are you sure you want to delete ?')\" href='categories.php?delete=$cat_id' type='submit' class='btn btn-danger'>Delete</a></td>
				
			</tr>";  
			//Delete code at line 88
			

	
}//While loop ends
			
    
	echo "<form method='post' action='' ><div class='form-group'><input type='text' name='edit' class='form-control'></div><div class='form-group'><input type='submit' name='Edit' value='Edit Category' class='btn btn-primary disabled'></div></form>";
	
        

}


function secure_it($data){
	$data=trim($data);
	$data=stripslashes($data);           
	                                         //this will prevent from cross site scripting
	$data=htmlspecialchars($data);
	return $data;
	
}





  ?>
                    	  
  <!--Code for deleting categories-->                  	  
   <?php

	 if(isset($_GET['delete']))
	{
		$Id = $_GET['delete'];
		
		$query = "DELETE FROM categories ";
		
		$query .="WHERE cat_id =$Id";	
		$delete_query = mysqli_query($connection,$query);
			header("Location: categories.php");
		if(!$delete_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
	
}
   if(isset($_GET['editid']))
{
	$edit_id = $_GET['editid'];
}

if(isset($_POST['Edit'])){
	
	$update = $_POST['edit'];
	
	$query = "UPDATE categories SET ";
	$query.="cat_title='$update' ";
     $query.="WHERE cat_id = $edit_id";
	$update_query =mysqli_query($connection,$query);
	
	if(!$update_query)	
		{
		    die("Query FAILED!!".mysqli_error($connection));
		}
		  else{
			  echo"Record Updated";
		  }

}




?>


 
	                  	                      	                      	  
                    	                      	                      	   	                      	  



















?>
                      	                      	 
                      	                      	                      	 
                      	                      	                      	                      	 
                      	                      	                      	                      	                      	 
                      	                      	                      	                      	                      	                      	 
                      	                      	                      	                      	                      	                      	                      	 
                      	                      	                      	                      	                      	                      	                      	                      	 
                      	                      	                      	                      	                      	                      	                      	                      	                      	                      	  