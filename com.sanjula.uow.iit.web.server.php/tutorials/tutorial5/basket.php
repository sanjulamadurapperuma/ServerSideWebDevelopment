<?php
	session_start();
	

    include("db.php");
    $pagename="Smart Basket";
    //Create and populate a variable called $pagename
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
    //Call in stylesheet
    echo "<title>".$pagename."</title>";
    //display name of the page as window title
    echo "<body>";
    include("headfile.html"); //include header layout file
    echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

    //if the value of the product id to be deleted (which was posted through the hidden field) is set
        //capture the posted product id and assign it to a local variable $delprodid
        //unset the cell of the session for this posted product id variable
        //display a "1 item removed from the basket" message
    $delprodid = 0;
    if (isset($_POST["del_prodid"])) {
        $delprodid = $_POST["del_prodid"];
        unset($_SESSION['basket'][$delprodid]);
        echo "1 item removed from the basket";
    }

	if(isset($_POST["h_prodid"])){
        $newprodid = $_POST["h_prodid"];
        $reququantity = $_POST["p_quantity"];

		echo "<p>Id of selected product: ".$newprodid;
		echo "<p>Quantity of selected product: ".$reququantity;
		//create a new cell in the basket session array. Index this cell with the new product id.
		//Inside the cell store the required product quantity
		$_SESSION['basket'][$newprodid]=$reququantity;
		//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
		echo "<p>1 item added to the basket";
	} else{
		echo "Current basket unchanged";
	}
	
	//Create a HTML table with a header to display the content of the shopping basket
	//i.e. the product name, the price, the selected quantity and the subtotal
	echo "<table style=border: 1px;><tr>";
	echo "<th>Product Name</th>";
	echo "<th>Price</th>";
	echo "<th>Selected Quantity</th>";
	echo "<th>Subtotal</th>";
    echo "<th></th>";
	
    $total = 0.00;
	
	//if the session array $_SESSION['basket'] is set
	if(isset($_SESSION['basket'])){
    	//loop through the basket session array for each data item inside the session using a foreach loop
    	//to split the session array between the index and the content of the cell
    	foreach($_SESSION['basket'] as $index => $value)
    	//for each iteration of the loop
    	//store the id in a local variable $index & store the required quantity into a local variable $value
    	{
        	//SQL query to retrieve from Product table details of selected product for which id matches $index
        	//execute query and create array of records $arrayp
        	//create a new HTML table row
        	//display product name using array of records $arrayp
        	//display product price using the array of records $arrayp
        	//display selected quantity of product retrieved from the cell of session array and now in $value
        	//calculate subtotal, store it in a local variable $subtotal and display it
        	//increase total by adding the subtotal to the current total
        	 $SQL="SELECT prodName, prodPrice, prodQuantity FROM Product WHERE prodId = '".$index."';";
        	 $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
             
        	 while ($arrayp=mysqli_fetch_array($exeSQL)) { 
        		 echo "<tr style='border: 1px'>"; 
        		 echo "<td style='border: 1px'>".$arrayp['prodName']."</td>";
        		 echo "<td>£".$arrayp['prodPrice']."</td>";
        		 echo "<td>".$value."</td>";
        		 $subtotal = $arrayp['prodPrice'] * $value;
        		 echo "<td>£".number_format((float)$subtotal, 2, '.', '')."</td>";
                 $total += $subtotal;

                 echo "<td><form action=basket.php method=post>";
                    echo "<input type=submit value='Remove'/>";
                    echo "<input type=hidden name=del_prodid value=".$value.">";
                 echo "</form></td>";
        		 echo "</tr>";
        	}
	   }
        // Display total
        echo "<tr><th colspan=3>Total</th>";
        echo "<th>£".number_format((float)$total, 2, '.', '')."</th>";
    } else {
	   //Display empty basket message
        echo "<p>Empty Basket</p>";
        echo "<tr><th colspan=3>Total</th>";
        echo "<th>£".number_format((float)$total, 2, '.', '')."</th>";
	}
	echo "<th></th>";
	echo "</tr></table>";

    echo "<p><a href='clearbasket.php'>CLEAR BASKET</a></p>";

    echo "<p>New homteq customers: <a href='signup.php'>Sign up</a></p>";
    echo "<p>Returning homteq customers: <a href='login.php'>Login</a></p>";
	
    include("footfile.html");
    //include head layout
    echo "</body>";
?>