<?php include("functions_users.php")?>
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
                            Users
                            
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
								
							case 'edit_user':
								include("edit_user.php");
								break;
							case 'add_user':
								include("add_user.php");
								break;
							case 'view_all_user':	
								include("view_all_user.php");
								break;
							default:
								include("view_all_user.php");
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

