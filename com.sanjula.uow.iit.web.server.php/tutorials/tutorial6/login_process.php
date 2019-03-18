<?php
    session_start();
    include("db.php");
    $pagename="Your Login Results";
    //Create and populate a variable called $pagename
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
    //Call in stylesheet
    echo "<title>".$pagename."</title>";
    //display name of the page as window title
    echo "<body>";
    include("headfile.html"); //include header layout file
    echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
    //Capture the 2 inputs entered in the form (email and password) using the $_POST superglobal variable
    //Assign these values to 2 new local variables $email and $password
    //Display the content of these 2 variables to ensure that the values have been posted properly
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];

    echo "<p>Entered email: ".$email."</p>";
    echo "<p>Entered password: ".$password."</p>";

    //if both mandatory email and password fields in the form are not empty
    if(!(empty($email) || empty($password))) {
        //SQL query to retrieve the record from the users table for which the email matches $email (entered by user)
        //execute the SQL query & fetch results of the execution of the SQL query and store them in $arrayu
        $SQL = "SELECT * FROM Users WHERE userEmail='".$email."';";
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        $arrayu = mysqli_fetch_array($exeSQL);

        //if email retrieved from the database (in arrayu) does not match $email
        if($arrayu['userEmail'] != $email){
            //display error message "Email not recognised, login again"
            echo "<b>Login failed!</b>";
            echo "The email you entered was not recognised";
            echo "<p>Go back to <a href='login.php'>login</a></p>"
        }
        //else
        else{
            //if password retrieved from the database (in arrayu) does not match $password
            if($arrayu['userPassword'] != $password){
                //display error message "Password not recognised, login again"
                echo "<b>Login failed!</b>";
                echo "The password you entered is not valid";
                echo "<p>Go back to <a href='login.php'>login</a></p>";
            }
            //else
            else{
                //display login success message and store user id, user type, name into 4 session variables i.e.
                //create $_SESSION['userid'], $_SESSION['usertype'], $_SESSION['fname'], $_SESSION['sname'],
                //Greet the user by displaying their name using $_SESSION['fname'] and $_SESSION['sname']
                //Welcome them as a customer by using $_SESSION['usertype ']
                echo "<b>Login success!</b>";

                $_SESSION['userId'] = $arrayu['userId'];
                $_SESSION['usertype'] = $arrayu['usertype'];
                $_SESSION['fname'] = $arrayu['fname'];
                $_SESSION['sname'] = $arrayu['sname'];

                echo "Hello, ".$_SESSION['fname']." ".$_SESSION['sname'];
                $greet = "You have successfully logged in as a homteq ";
                if($_SESSION['usertype'] == "C"){
                    echo "'".$greet."' Customer";
                } else if($_SESSION['usertype'] == "A"){
                    echo "'".$greet."' Admin";
                }
                //Continue shopping for Home Tech
                //View your Smart Basket
                echo "<p>Continue shopping for <a href='index.php'>Home Tech</a></p>";
                echo "<p>View your <a href='basket.php'>Smart Basket</a></p>";
        }
    }
    //else
    else
    {
        //Display "Both email and password fields need to be filled in " message and link to login page
        echo "<b>Login failed!</b>";
        echo "<p>Your login form is incomplete<br>";
        echo "Make sure you provide all the required details</p>";
        echo "<p>Go back to <a href='login.php'>login</a></p>";
    }

    include("footfile.html");
    //include head layout
    echo "</body>";
?>