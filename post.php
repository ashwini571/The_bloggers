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
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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

					
				$view_query = "UPDATE posts SET post_views= post_views + 1 WHERE post_id = $post_get_id";
				$send_query= mysqli_query($connection,$view_query);
				if(!$send_query)
				{
					die("Query Failed".mysqli_error($connection));
				}
					
					
					
				
					
				
				
				$query = "SELECT * FROM posts WHERE post_id=$post_get_id";
				$selecting_posts = mysqli_query($connection,$query);
				
				
         while($row = mysqli_fetch_assoc($selecting_posts))
		{
			$posts_id= $row['post_id'];
			$posts_title= $row['post_title'];
			$posts_author= $row['post_author'];
			$posts_date= $row['post_date'];
			$posts_image= $row['post_image'];
			$posts_content= $row['post_content'];
			$post_views =$row['post_views']
			
			
			
			?>
			
		
			   
                 <div class="card margin">

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?pid=<?php echo $posts_id;?>"><?php echo $posts_title;?></a>
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
                
                
                
                
			<hr>
		
   <i class="glyphicon glyphicon-eye-open"> <?php echo $post_views;?><span style="opacity: .60"> Views </span></i>
           <hr>
          <?php	}}?>     
               
         <!--Inserting comments-->      
               
              <?php
			
			if(isset($_POST['create_comment']))
			   {
				   $post_get_id =$_GET['pid'];
				  include("admin/includes/functions_comments.php");
				   
				   insert_comment($post_get_id);
			  
	
			   }
			?>
     
                
                 <!-- Comments Form -->
        <div class="well">



            <h4>Leave a Comment:</h4>
            <form action="" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author*</label>
                    <input type="text" name="comment_author" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Author">Email*</label>
                    <input type="email" name="comment_email" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment*</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>
               
               
               
               
                               
                 <?php 


            $query = "SELECT * FROM comments WHERE comment_post_id = {$post_get_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                
                ?>
                
                
                           <!-- Comment -->
                <div class="media">
                     
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;   ?>
                            <small><?php echo $comment_date;   ?></small>
                        </h4>
                        
                        <?php echo $comment_content;?>
 
                    </div>
                </div>
                <?php }?>
                </div>
			
			
				
			
	
	
               
               
               
               
               
               
               
            
                <hr>

              

            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            <?php include("includes/sidebar.php");?>
            
            </div>
		</div> 
	</div>
      <!--Row>  
   
       
       
        <!-- Footer -->
 
      <?php include("includes/footer.php")?>
       
       
     