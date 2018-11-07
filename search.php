<?php include("includes/db.php")?>
<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>
   
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/mycss.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 
</head>
<body>
    <!-- Navigation -->
   
 <?php include("includes/navigation.php");?>
       
<div class="container center">
 
	<p style="font-size: 50px">The  <span class="tag">Bloggers</span></p>
	   
</div>

		

  
   <!-- Page Content -->
    <div class="container">
    
     
       
         <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 ">
               
                        <?php
          if(isset($_POST['submit']))
		  {
			  $search = $_POST['search'];
			  $query =" SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
			  
			  $search_query = mysqli_query($connection,$query);
			  if(!$search_query)
			  {
				  die("Query FAILED!!".mysqli_error($connection));
			  }
			  
			  $count = mysqli_num_rows($search_query);
			  if($count==0)
			  {
				  echo "<h1>Sorry! No results found</h1>";
			  }
			  else{
				  
				   



			 while($row = mysqli_fetch_assoc($search_query))
			{
				$posts_title= $row['post_title'];
				$posts_author= $row['post_author'];
				$posts_date= $row['post_date'];
				$posts_image= $row['post_image'];
				$posts_content= $row['post_content'];

				?>






					
					 <div class="card margin">

					<!-- First Blog Post -->
					<h2>
						<a href="#"><?php echo $posts_title;?></a>
					</h2>
					<p class="lead">
						by <a href="index.php"><?php echo $posts_author;?>
						</a>
					</p>
					<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $posts_date;?></p>
					<hr>
					<img class="img-responsive" src="images/<?php echo $posts_image;?>" alt="">
					<hr>
					<p><?php echo $posts_content;?></p>
					<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>




		<?php	}


				  

			  }
			  
			  
			  
		  }
 
   
            	?>
               
				
				
				
               
               
               
               
               
               
               
               
               
               
               
               
				   
               
               
               
               
            
                <hr>

              

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            <?php include("includes/sidebar.php");?>
            
            </div>

        </div>
	</div>
        <!-- row -->
        
        <?php include("includes/footer.php");?>

        <hr>
