   <nav class="navbar navbar-inverse navbar-fixed-top nav-primary">
  <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
     	<span class="icon-bar"></span>
     	<span class="icon-bar"></span>
     	<span class="icon-bar"></span>
     </button>
      <a class="navbar-brand" href="index.php">WebSiteName</a>
    </div>
    <div class=" collapse navbar-collapse" id="mynav">
    <ul class="nav navbar-nav">	
      <li class="active"><a href="index.php">Home</a></li>
         
     
            <?php if(isset($_SESSION['role'])):?>
          <?php if($_SESSION['role']=='Subscriber'){
	
         echo   "<li><a href='includes/logout.php'>Log Out</a></li>";
      echo "<li><a href='admin/index.php'>Profile</a></li>";
       
     }   
		else{
			   echo   "<li><a href='includes/logout.php'>Log Out</a></li>";
      echo "<li><a href='admin/index.php'>Admin</a></li>";
		}
      ?>
         
    <?php else:?>
          
           <li><a href="#login" >Login</a></li>
      <li><a href="user_login.php">Sign up</a></li>
      <li><a href="admin/index.php">Admin</a></li>
       <?php endif;?>
      <li class="dropdown">
       
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
        <span class="caret"></span></a>
    
        <ul class="dropdown-menu">
         <?php
	   $query = "SELECT * FROM categories";
       $result = mysqli_query($connection,$query);

	    while($row = mysqli_fetch_assoc($result)){
			$cat_title= $row['cat_title'];
			echo "<li><a href='#'>$cat_title</a></li>";
		}
	
       
         ?>
        </ul>
      </li>
     
    </ul>
   
    </div>
  </div>
</nav>