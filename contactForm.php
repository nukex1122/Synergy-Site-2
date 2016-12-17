<?php

function Connect()
{
  // change here with new db host, user, pass and db name
 $dbhost = "192.185.129.7";
 $dbuser = "sddtulhr_synergy";
 $dbpass = "hackathon";
 $dbname = "sddtulhr_synergy";

 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

 return $conn;
}


$conn    = Connect();
$name    = $conn->real_escape_string($_POST['u_name']);
$email   = $conn->real_escape_string($_POST['u_email']);
$message = $conn->real_escape_string($_POST['u_message']);
// change here with new table name
$query   = "INSERT into contact (name,email,message) VALUES('" . $name . "','" . $email . "','" . $message . "')";
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);

}
// change here with new host location
header('Location: http://synergy.sddtu.org/index.html#contactSuccess');
$conn->close();

?>
