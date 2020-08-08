<?php include('buymain.php') ?>

<!DOCTYPE html>

<html>

<head>
		
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
		
<h2>ENTER THE FOLLOWING DETAILS</h2>
	
</div>
	
	
<form method="POST" action="buy.php" enctype="multipart/form-data">

		
<?php echo display_error(); ?>

	
<div class="input-group">

<?php
$con = mysqli_connect('localhost', 'root', '', 'bookstoredb');
$num= mt_rand();
$sel_query  = "SELECT *  FROM  cust_order WHERE recipt_no='$num'"; // query to select value 
$result =  mysqli_query($con,$sel_query) or die(mysqli_error($con));
while( mysqli_num_rows($result) != 0 ) {                      // loops till an unique value is found 
    $num = mt_rand();
    $result = mysqli_query($con,$sel_query) or die(mysqli_error($con));
}
?>
<input type="hidden" name="receipt_no" value="<?php echo $num; ?>">
	
<label>RECEIPT NUMBER: "<?php echo $num;?>"</label>
</div>
	
<div class="input-group">
			
<label>NAME</label>
			
<input type="text" name="name" value="<?php echo $name; ?>">
		
</div>
		
<div class="input-group">
			
<label>ADDRESS</label>
			
<input type="text" name="address" value="<?php echo $address; ?>">
		
</div>
		
<div class="input-group">
			
<label>PHONE NUMBER</label>
			
<input type="text" name="phone_no" value="<?php echo $phone_no; ?>">
	
</div>
		
<div class="input-group">
			
<label>E-MAIL ID</label>
			
<input type="text" name="emailid" value="<?php echo $emailid; ?>">
</div>

<div class="input-group">
					
<?php
$total_price = 0;
foreach ($_SESSION["shopping_cart"] as $product)
{
if(is_numeric($product["price"]) && is_numeric($product["quantity"]))
{
$total_price += ($product["price"]*$product["quantity"]);
}
}
?>
<label>PRICE:RS "<?php echo $total_price; ?>"</label>

</div>
		
<div class="input-group">
			
<button type="submit" class="btn" name="buy">BUY</button>
		
</div>
	
</form>

</body>

</html>