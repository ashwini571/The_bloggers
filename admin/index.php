 <?php include("includes/header.php");?>
    <div id="wrapper">
<!-- For online user-->
      <?php
		
		$session = session_id();
		$time = time();
		$time_out_in_sec = 20;
		$time_out = $time -$time_out_in_sec;
		
		$query = "SELECT * FROM users_online WHERE session='$session'";
		$send_query = mysqli_query($connection,$query);
		$count=mysqli_num_rows($send_query);
		
		
		
		if($count==NULL)
		{
			mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
			
		}
		else{
			mysqli_query($connection,"UPDATE users_online SET time='$time' WHERE session='$session'");
		}
		
		$users_online_query= mysqli_query($connection,"SELECT * FROM users_online WHERE time>'$time_out'");
		$count_users=mysqli_num_rows($users_online_query);
		
		
		?>
       
       
       
       
       
       
       
       
        <!-- Navigation -->
        <?php include("navigation.php")?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['fname'];?></small>
                        </h1>
                               
                <!-- Dashboard Widgets-->
                
<div class="row">
    <div class="col-lg-3 col-md-6"><!-- For both mobile and desktop-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
						$query="SELECT * FROM posts";
						$result=mysqli_query($connection,$query);
						$post_counts=mysqli_num_rows($result);
						
						echo "<div class='huge'>$post_counts</div>";
						
						?>
							
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="includes/posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    
                    
                    <?php
						$query="SELECT * FROM comments";
						$result=mysqli_query($connection,$query);
						$comment_counts=mysqli_num_rows($result);
						
						echo "<div class='huge'>$comment_counts</div>";
						
						?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="includes/comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                     
                    <?php
						$query="SELECT * FROM users";
						$result=mysqli_query($connection,$query);
						$user_counts=mysqli_num_rows($result);
						
						echo "<div class='huge'>$user_counts</div>";
						
						?>
                 
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="includes/users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
                        <?php
						$query="SELECT * FROM categories";
						$result=mysqli_query($connection,$query);
						$category_counts=mysqli_num_rows($result);
						
						echo "<div class='huge'>$category_counts</div>";
						
						?>
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="includes/categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
              <div class="row">
               	
             <?php
				  
				$query="SELECT * FROM posts WHERE post_status='Draft'";
						$result=mysqli_query($connection,$query);
						$draft_post_counts=mysqli_num_rows($result);
						  
				  
               	$query="SELECT * FROM users WHERE user_role='Subscriber'";
						$result=mysqli_query($connection,$query);
						$Subscriber_counts=mysqli_num_rows($result);
               	
               	$query="SELECT * FROM users WHERE user_role='Admin'";
						$result=mysqli_query($connection,$query);
						$Admin_counts=mysqli_num_rows($result);
               	
               	
               	
               	
               	?>
               	
               	 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
			<?php
			
			$element_text=['Posts','Draft Posts','Subscribers','Admins'];
			$element_count=[$post_counts,$draft_post_counts,$Subscriber_counts,$Admin_counts];
			
			for($i=0 ; $i<4 ; $i++){
				echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
				}
			
			
			
			?>
		
			
			
         
        
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
              
              <div id="columnchart_material" style="width: auto; height: 500px;"></div>
               </div>         
                           
           <!--row of charts-->                   
                                 
                                    
                                       
                                          
                                             
                                                
                                                   
                                                      
                                                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("includes/footer.php")?>