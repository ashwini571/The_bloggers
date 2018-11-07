    <!-- Blog Search well -->
               
      
               
               
               
                <div class="well" >
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text"  name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
						</form>
                    </div>
						</div> 
                    
             <!--login form-->       
                  <?php if(isset($_SESSION['role'])): ?>
                    
                    
			
                <?php else:?>
                
                 <div class="well" id="login" >
			<h4>Log In</h4>
			<form action="user_login.php" method="post">
			<div class="form-group" >
				<input type="text"  name="email" placeholder="E-mail" class="form-control" >
				
			</div>
<div class="form-group">
				<input type="password"  name="password" placeholder="Password" class="form-control">
				
			</div>
                  <input type="submit" value="Login" name="login" class="btn btn-primary">
<!--                   <span>Don't have an account ? <a href="">Sign up here</a></span>-->
                    </form>
                
                </div>
                <?php endif;?>


                <!-- Blog Categories well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
         <?php
								
	   $query = "SELECT * FROM categories";
       $result = mysqli_query($connection,$query);

	    while($row = mysqli_fetch_assoc($result)){
			$cat_id= $row['cat_id'];
			$cat_title= $row['cat_title'];
			echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
		}
	
       
         ?>
                            </ul>
                        </div>
                        <!-- col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- col-lg-6(sidebar) -->
                    </div>
                    <!-- row of sidebar-->
                </div>

                <!-- Side Widget well -->
                <div class="well">
                    <h4>Side Widget well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
