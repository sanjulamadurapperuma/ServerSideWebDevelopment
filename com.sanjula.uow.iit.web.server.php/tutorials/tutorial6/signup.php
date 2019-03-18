<?php

    session_start();

    $pagename="Sign Up";
    //Create and populate a variable called $pagename
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
    //Call in stylesheet
    echo "<title>".$pagename."</title>";
    //display name of the page as window title
    echo "<body>";
    include("headfile.html"); //include header layout file
    echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

    echo "<style>table, td{border: 0px solid;}</style>";
    echo "<form action='signup_process.php' method='post'>";
    echo "<table>";
    echo "<tr><td>*First Name</td>";
    echo "<td><input type=text name='signup_fname'/></td></tr>";
    echo "<tr><td>*Last Name</td>";
    echo "<td><input type=text name='signup_lname'/></td></tr>";
    echo "<tr><td>*Address</td>";
    echo "<td><input type=text name='signup_address'/></td></tr>";
    echo "<tr><td style='border: 0px solid;'>*Postcode</td>";
    echo "<td><input type=text name='signup_postcode'/></td></tr>";
    echo "<tr><td >*Tel No</td>";
    echo "<td><input type=text name='signup_telno'/></td></tr>";
    echo "<tr><td>*Email Address</td>";
    echo "<td><input type=text name='signup_email'/></td></tr>";
    echo "<tr><td>*Password</td>";
    echo "<td><input type=password name='signup_password'/></td></tr>";
    echo "<tr><td>*Confirm Password</td>";
    echo "<td><input type=password name='signup_confirm_pwd'/></td></tr>";
    echo "<tr><td><input type=submit value='Sign Up'/></td>";
    echo "<td><input type=reset value='Clear Form'/></td></tr>";
    echo "</table>";
	
    echo "</form>";

    include("footfile.html");
    //include head layout
    echo "</body>";
?>