<?php include("functions_comments.php")?>
<?php include("header_includes.php");?>

    <div id="wrapper">

        <!-- Navigation -->
       
      
       <?php include("navigation_includes.php");?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                            
                        </h1>
                        <div class="table-responsive">  
                     
                       <?php
	                  
						if(isset($_GET['source']))
						{
							$source = $_GET['source'];
						}
						else{
							$source ='';
						}	  
							  
                        switch($source)
						{
								
							case 'edit_post':
								include("edit_post.php");
								break;
							case 'add_post':
								include("add_post.php");
								break;
							case 'view_all_post':	
								include("view_all_comments.php");
								break;
							default:
								include("view_all_comments.php");
								break;
									
						}
							  
							  ?>
                     
                     
                     </div>
                     
                     
					
                       
                 
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>

