
<?php include("functions_categories.php")?>
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
                            Categories
                            
                        </h1>
                   
                     <div class="row">
                       	<div class="col-sm-12">
                      	  
                 
                      	  <!--Php code for submitting new categories-->
                      	  
                      	  <?php add_category()?>
                      	  
                      	  
                      	  
                       
                       		<form action="" method="post">
                       			  <div class="form-group">
                       		<label for="category">Add Category</label>
                       			<input type="text" name="add_category" class=form-control>
								</div>
                      			<div class="form-group">
                       			<input class="btn btn-primary" type="submit" name="submit" value="Add category">
                       		     </div>
                       		     
                       	
                       		     
                       		</form>
                       		
                       	  </div>
                       	</div>
                       	
                       	
                       	
                       	
                       	
                       	
                       	
                       	
                       	<div class="row">
                       		<div class="col-sm-12 table-responsive">
                       		
                       		
                 <!--Php code for fetching categories-->      		
                       		
           
<?php			
					

	
  ?>     
         
              
                       			<table class="table table-striped" >
                       				<thead class="">
                       					<tr>
                       						<th>Id</th>
                       						<th>Category Title</th>
                       					</tr>
                       					</thead>
                       					
                       					<tbody>
                       				<tr>
                       					
           			                    <?php fetch_categories()?><!--Php code for fetching categories-->                  					
										
                       				</tr>
                       					</tbody>
                       					
                       					
                       				
                       				
                       			</table>
                       		</div>
                       	</div>
                       	
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

