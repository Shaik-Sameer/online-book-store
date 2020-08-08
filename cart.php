<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["isbn"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['isbn'] === $_POST["isbn"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<link rel='stylesheet' href='style2.css' type='text/css' media='all' />
</head>
<body style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
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
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
<div style="width:700px; margin:50 auto;">

   
	
<table class="table">
<tbody>
<tr>
<td></td>
<td>BOOK TITLE</td>
<td>AUTHOR</td>
<td>PUBLISHER</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image_loc"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["book_title"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='isbn' value="<?php echo $product["isbn"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>

<td><?php echo $product["author"]; ?><br />
<td><?php echo $product["publisher"]; ?><br />
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='isbn' value="<?php echo $product["isbn"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "RS-".$product["price"]; ?></td>
<td><?php echo "RS-".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="7" align="right">
<strong>TOTAL: <?php echo "RS-".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>	
<form action='buy.php' method='post'>
 <div class='product_wrapper'>
<button type='submit' class='buy' >Buy Now</button>
</div>	
</form>  
<?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
</div>
</body>
</html>