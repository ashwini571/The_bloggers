 <?php include("includes/db.php")?>

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
				
				
				if(isset($_GET['pid']))
					
				{
					$post_get_id =$_GET['pid'];
					$post_get_author =$_GET['author'];
					
				}
				
				$query = "SELECT * FROM posts WHERE post_author='{$post_get_author}'";
				$selecting_posts = mysqli_query($connection,$query);
				
				
         while($row = mysqli_fetch_assoc($selecting_posts))
		{
			$posts_id= $row['post_id'];
			$posts_title= $row['post_title'];
			$posts_author= $row['post_author'];
			$posts_date= $row['post_date'];
			$posts_image= $row['post_image'];
			$posts_content= $row['post_content'];
			
			
			
			
			?>
			
		
			    
                 <div class="card margin">

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?pid=<?php echo $posts_id;?>"><?php echo $posts_title;?></a>
                </h2>
                <p class="lead">
                    All Posts by <?php echo $posts_author;?>
                    </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $posts_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $posts_image;?>" alt="">
                <hr>
                <p><?php echo $posts_content;?></p>
                
         
        <hr>
   
             
               
                </div>
                   <?php	}?>
		
                <hr>

              

            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            <?php include("includes/sidebar.php");?>
            
            </div>
		</div> 
      <!--Row>  
       
       
       
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
	 
    <!-- /.container -->

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>
</html>
       
       
       
       
     