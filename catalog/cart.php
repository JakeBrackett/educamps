
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" /> 
<title>eduCamps</title>
<link href="img/transparentcaplogo.png" type="image/gif" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="Catalog.css">
<link rel="stylesheet" type="text/css" href="../css/default_layout.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    
    <div id="header">
    </div>

<div id="id01" class="modal">
  
</div>

<script src = "../scripts/navBar1.js"></script>

<?php

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    //echo "Connected successfully (".$db->host_info.")";
?>
    
		
  
<div id="mainbox">
	<h1> Order Your Items</h1>
		<script>console.log("after clothing")</script>
<?php	
    $sql = "SELECT * FROM items";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    	//$count = 0;
	while($row = $result->fetch_assoc()) {
	    $description = $row["description"];
	    $price = $row["price"];
	    $img = $row["imgsrc"];
	    $id = $row["itemid"];
	    $imghtml = <<<HTML
			<img src="$img" class="catalogimg" align="middle style="width:310px;height:350px;">    
HTML;
	    
	   
	  
	?>
	 
		<div class="containerbox1">
		     
		<?php echo $imghtml ?>
			<div class="description">
				<hr>
			   	<p class="des"> <?php echo $description; ?> </p> 
			</div>

			<div>
			<br> 
				<div class="addtocart"> 
				<p class="price"> <?php echo  $price; ?>  </p>
				<span>Qty</span></span><input type="number" class="quan" min="1" max="12" >
				</div>
				
				<br>
				
			</div>
		</div>
	
<?php
	     
	}
  }
  ?>
    
		<div id="cart">
			<div id="des_cart">
				<p> Item <hr> </p>
				
			</div>

			<div id="price_cart">
				<p> Price <hr> </p>
			</div>

			<div id="quantity_cart">
				<p> Quantity <hr> </p>
			</div>

			<div id="subtotal_cart">
				<p> Subtotal <hr> </p> 
			</div>
			
		</div>
		
		<script >
		     var rowArry = [];
		     var TOTAL;
			function cart()
        	{
        		document.getElementById("cart").innerHTML = "<div id=\"des_cart\">\
				<p> Item <hr> </p>\
				\
			</div>\
\
			<div id=\"price_cart\">\
				<p> Price <hr> </p>\
			</div>\
\
			<div id=\"quantity_cart\">\
				<p> Quantity <hr> </p>\
			</div>\
\
			<div id=\"subtotal_cart\">\
				<p> Subtotal <hr> </p> \
			</div>";
        		var itemPrice = [];
        		//var Qty = document.getElementById("quantity1").value;
        		var itemDescription = [];
        		$('.des').each(function(){
        			itemDescription.push(this.innerHTML);	
        		});
        		$('.price').each(function(){
        			itemPrice.push(this.innerHTML);	
        		});
        		var itemQty = [];
        		$('.quan').each(function(){
        			var val = this.value
        			if(val == "")
        				itemQty.push(0);
        			else
        				itemQty.push(val);
        			//itemQty.push(this.value);	
        		});
        		
        		console.log("before item description cart")
        		console.log(itemDescription);
        		console.log(itemPrice);
        		console.log(itemQty)
        		
        		
        		//var v = document.getElementById("quantity1").value;
        		var total = 0;
        		
        		for(var i=0; i<itemQty.length;i++){
        		  
	    			  if(itemQty[i] == 0){
	    			  	console.log("continue");
	    				continue;
	    			  }
	    			  var para = document.createElement("P");
	    			  var para1 = document.createElement("P");
	        		  var para2 = document.createElement("P");
	        		  var para3 = document.createElement("P");
	        		  var para4 = document.createElement("P");
	        		  para.innerHTML = itemDescription[i];
	    			  para1.innerHTML = itemPrice[i];
	    			  para2.innerHTML = itemQty[i];
	    			  var row = {"description": itemDescription[i],
	    			    "price": itemPrice[i],
	    			    "quantity" : itemQty[i]
	    			  };
	    			  rowArry.push(row);
	    			  //var total;
	    			  var price = $.trim(itemPrice[i]);
	    			  var intPrice = parseFloat(price);
	    			  var itemTot = (intPrice*itemQty[i]).toFixed(2)
	    			  para3.innerHTML = itemTot;
	    			  total += parseFloat(itemTot);
	    			  console.log(total);
	    			  //para4.innerHTML = total.toFixed();
	    			  
	    			  //console.log(itemDescription[i]);
	    			  //console.log(itemPrice[i]);
	    			  //console.log(itemQty[i]);
	    			  //console.log("Item Qty for " +i+" is "+itemQty[i]);
	    			  //console.log(i);
	    			  document.getElementById("price_cart").appendChild(para1);
	                 document.getElementById("des_cart").appendChild(para);
				  document.getElementById("quantity_cart").appendChild(para2);
				  document.getElementById("subtotal_cart").appendChild(para3);
				  
				  console.log("appended")
        			}	
			//var named total
			//set an element's innerhtml to total
			 total.toFixed(2);
    			 document.getElementById("total").innerHTML = total.toFixed(2);
    		}
 function checkout() {
 	console.log("hi test");
 	   $.ajax({ type: "POST",
             url: "checkout.php",
             data: rowArry
             });
             
             
 }
 
 function promo() {
             var Promo = document.getElementById("promo").value;
             var tot = document.getElementById("total").innerHTML;
        	   tot = parseInt("t")
             if(Promo == "EDUCAMPER"){
             
             document.getElementById("total").innerHTML =  tot*.85;
             
             }
             else {
             	alert("Promo code entered is wrong");
             }
             
             }
</script>
</div>
<div id="checkout_outterbox">
	<span id="promocode">Enter promo code: </span> <input type="text" name="Promo" id="promo"/> 
  	<button onclick= "promo()" style="width: 10%; display:block; float: left; margin-top: 10px;"> Submit </button>
 	<button onclick="cart()" style="width: 20%; display: block; float: right; margin-top: 10px;">Update Cart</button>
 	<span class="total"> Total: </span>
 	<span id="total"> Total: </span>
	<div id="checkout">
		<button> <a href="checkout.html" style="text-decoration:none; color:white">  Proceed to Checkout </a></button>
	</div>
</div>
 


   
   <?php
   $db->close(); 
   ?>
   
 
    <footer>
<p class="backtotop"> <a href="#header">Back to Top</a> </p>
<p>
<a href="../index.php">Home</a>
·
<a href="../schedule.php">Schedule</a>
·
<a href="../newaccount.html">Registration</a>
·
<a href="../activities.html"> Activities </a>
·
<a href="../forum.html"> Forum </a>
·
<a href="cart.php">Catalog</a>
·
<a href="../visualization.html">Visualization</a>
</p>

<p>eduCamps 2017 -- Team ?</p>


 </footer>
</body>
</html>