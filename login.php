<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
<div>
<!-- Navigation -->
<div class="topnav">
<a  class="active" href="mainpage.php">HOME</a>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
echo "<div class='cart_div'>
<a class='active' href='cart.php'><img src='cart-icon.png' /> Cart<span>$cart_count</span></a>
</div>";
}
?>
</div>

	<div class="header">
		<h2>ADMIN LOGIN</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
	</form>


</body>
</html>