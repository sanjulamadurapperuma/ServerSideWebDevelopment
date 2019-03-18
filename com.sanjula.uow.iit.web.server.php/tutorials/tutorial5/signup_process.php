<?php

    session_start();

    include("db.php");

    $pagename="Your Sign Up Results";
    //Create and populate a variable called $pagename
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
    //Call in stylesheet
    echo "<title>".$pagename."</title>";
    //display name of the page as window title
    echo "<body>";
    include("headfile.html"); //include header layout file
    echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

    //Capture the 7 inputs entered in the the 7 fields of the form using the $_POST superglobal variable
    //Store these details into a set of 7 new local variables
    $firstName = $_POST['signup_fname'];
    $lastName = $_POST['signup_lname'];
    $address = $_POST['signup_address'];
    $postcode = $_POST['signup_postcode'];
    $telno = $_POST['signup_telno'];
    $email = $_POST['signup_email'];
    $password = $_POST['signup_password'];
	$confirm_password = $_POST['signup_confirm_pwd'];
	
	//if the mandatory fields are not empty
	if(!(empty($firstName) || empty($lastName) || empty($address) || empty($postcode) 
		|| empty($telno) || empty($email) || empty($password) || empty($confirm_password))){
		//if the 2 entered passwords do not match
		if($password != $confirm_password){
			//Display error passwords not matching message
			//Display a link back to register page
            echo "<b>Signup failed!</b>";
			echo "<p>The 2 passwords are not matching</p>";
            echo "<p>Make sure you enter them correctly</p><br/>";
			echo "<p>Go back to <a href='signup.php'>sign up</a></p>";
		} else{
			//define regular expression
			//if email matches the regular expression 
			if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)){
				//Write SQL query to insert a new user into users table and execute SQL query
                //The SQL code for inserting a new record is
                //INSERT INTO table_name (field1, field2, field3) VALUES (value1, value2, value3)
                //Execute the INSERT INTO SQL query
                $SQL = "INSERT INTO  Users (userFName, userSName, userAddress, userPostCode, userTelNo, 
                userEmail, userPassword) VALUES ('".$firstName."', '".$lastName."', '".$address.
                "', '".$postcode."', '".$telno."', '".$email."', '".$password."')";
                $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
				
				//Return the SQL execution error number using the error detector (hint: use mysql_errno)
				//If the error detector returns the number 0, everything is fine
				
				$errno = mysqli_errno($conn);
				
				if($errno == 0){
					//Display registration confirmation message
					//Display a link to login page
                    echo "<b>Signup successful!</b>";
					echo "<p>To continue, please <a href='login.php'>login</a></p>";
				} else{
					//Display generic error message
					//if error detector returned number 1062 i.e. unique constraint on the email is breached
					//(meaning that the user entered an email which already existed)
					echo "Error description: ".mysqli_error($conn);
					if($errno == 1062){
                        echo "<b>Signup failed!</b>";
                        echo "<p>Email already in use</p>";
						echo "You may already be registered or try another email address";
                        echo "<p>Go back to <a href='signup.php'>sign up</a></p>";
					}
                    if($errno == 1064){
                        echo "<b>Signup failed!</b>";
                        echo "Invalid characters entered in the form";
                        echo "Make sure you avoid the following characters: apostrophes like ['] and backslashes like [\]";
                        echo "<p>Go back to <a href='signup.php'>sign up</a></p>";
                    }
				}
			} else{
                echo "<b>Signup failed!</b>";
                echo "<p>Email not valid</p>";
                echo "<p>Make sure you enter a correct email address</p>";
                echo "<p>Go back to <a href='signup.php'>sign up</a></p>";
            }
		}
		
	} else {
        echo "<b>Signup failed!</b>";
		echo "<p>Your signup form is incomplete and all mandatory fields need to be filled in</p>";
        echo "<p>Make sure you provide all the required details</p><br/>";
		echo "<p>Go back to <a href='signup.php'>sign up</a></p>";
	}

    include("footfile.html");
    //include head layout
    echo "</body>";
?>