
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login using POST</title>
</head>
<body>
<?php	
	$name = $_POST["username"];
	if(empty($name)){
		echo "Name is empty";
	} else if($name == "Jane"){
		echo "Login Successful";
	} else{
		echo "Your username is: ";
        echo $_POST["username"];
        echo "<br>";
		echo "Your password is: ";
        echo $_POST["password"];
		echo "<br>";
	}
?>
</body>
</html>



