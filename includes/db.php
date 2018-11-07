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