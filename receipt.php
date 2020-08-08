<?php 
	session_start();
?>
<html>
<head>
<style>
#invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 100mm;
  background: #FFF;
  }
  
#invoice-POS ::selection {background: #f31544; color: #FFF;}
#invoice-POS ::moz-selection {background: #f31544; color: #FFF;}
#invoice-POS h1{
  font-size: 1.9em;
  color: #222;
}
#invoice-POS h2{font-size: 1.3em;}
#invoice-POS h3{
  font-size: 1.6em;
  font-weight: 300;
  line-height: 2.4em;
}
#invoice-POS p{
  font-size: 1.1em;
  color: #666;
  line-height: 1.6em;
}
 
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#invoice-POS #top{min-height: 100px;}
#invoice-POS #mid{min-height: 80px;} 
#invoice-POS #bot{ min-height: 50px;}

#invoice-POS #top .logo{	
	height: 60px;
	width: 60px;
	background: url('IMG_1584976001886.jpg') no-repeat;
	background-size: 60px 60px;
}
#invoice-POS .clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url('user_profile.png') no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info{
  display: block;
  margin-left: 0;
}
#invoice-POS .title{
  float: right;
}
#invoice-POS .title p{text-align: right;} 
#invoice-POS table{
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle{
  padding: 5px;
  font-size: .9em;
  background: #eee;
}
#invoice-POS .service{border-bottom: 1px solid #EEE;}
#invoice-POS .item{width: 35%;}
#invoice-POS .itemtext{font-size: .9em;}

#invoice-POS #legalcopy{
  margin-top: 5mm;
}

</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
<div class="topnav">
<a  class="active" href="cart.php">BACK</a>
</div>
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>ONLINE BOOK STORE</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
<div id="mid">
      <div class="info">
        <h2>Contact Info</h2>
        <p> 
            Address :  CBIT, Gandepat Hyderabad</br>
            Email : sameer111@gmail.com</br>
            Phone : 8008169286</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    <?php 
$receipt_no = $_SESSION["receipt_no"];?>
    <p>RECEIPT NUMBER : <?php echo $receipt_no;?></p>
<div id="bot">
<div id="table">
  <table>
							<tr class="tabletitle">
								<td class="item"><h2>BOOK TITLE</h2></td>
								<td class="item"><h2>QUANTITY</h2></td>
								<td class="item"><h2>Sub Total</h2></td>
							</tr>
							<?php
							$total_price = 0;		
							foreach ($_SESSION["shopping_cart"] as $product){
							?>
							<tr class="service">
								<td class="tableitem"><p class="itemtext"><?php echo $product["book_title"]; ?></p></td>
								<td class="tableitem"><p class="itemtext"><?php echo $product["quantity"]; ?></p></td>
								<td class="tableitem"><p class="itemtext"><?php echo "$".$product["price"]*$product["quantity"]; ?></p></td>
							</tr>
							<?php
							$total_price += ($product["price"]*$product["quantity"]);
							}
							?>
							<tr class="tabletitle">
<td></td>
<td class="Rate"><h2>TOTAL:</h2></td>
<td class="payment"><h2><?php echo "$".$total_price; ?></h2></td>
</tr>
</table>
</div><!--End Table-->					
<div id="legalcopy">
<p class="legal"><strong>THANKS FOR PURCHASE!</strong> Your books will be delivered with in 2 to 3 days. </p>
</div>
</div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</body>
</html>