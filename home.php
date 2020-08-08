<?php 
	
include('functions.php');

		


?>

<!DOCTYPE html>

<html>

<head>
	
<title>Home</title>
	
<link rel="stylesheet" type="text/css" href="style.css">
	
<style>
	
.header {
		
background: #003366;
	
}
	
button[name=register_btn] {
		
background: #003366;
	
}
	
</style>

</head>

<body  style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
	
<div class="header">
		
<h2>Admin - Home Page</h2>

</div>
	
<div class="content">
		
<!-- notification message -->
		
<?php if (isset($_SESSION['success'])) : ?>
			
<div class="error success" >
				
<h3>
					
<?php 
						
echo $_SESSION['success']; 
						
unset($_SESSION['success']);
					
?>
				
</h3>
			
</div>
		
<?php endif ?>

		
<!-- logged in user information -->
		
<div class="profile_info">
			
<img src="user_profile.png"  >

			
<div>
				
<?php  if (isset($_SESSION['user'])) : ?>
					
<strong>
<?php echo $_SESSION['user']['username']; ?>
</strong>

					
<small>
						
<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						
<br>
									
&nbsp; <a href="add_newbook.php"> ADD NEW BOOKS</a> <br>

&nbsp; <a href="add_oldbook.php"> ADD OLD BOOKS</a> <br>
&nbsp; <a href="remove_newbooks.php"> REMOVE NEW BOOKS</a> <br>
&nbsp; <a href="remove_oldbooks.php"> REMOVE OLD BOOKS</a> <br>		
<a href="logout.php" style="color: red;">logout</a>
	<br>	</small>

				
<?php endif ?>
			
</div>
		
</div>



	
</div>
		

</body>

</html>