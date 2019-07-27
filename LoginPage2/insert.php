<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$linky = mysqli_connect("localhost", "root", "", "wishlist");
 
// Check connection
if($linky === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Item = mysqli_real_escape_string($linky, $_REQUEST['Item']);
$Link = mysqli_real_escape_string($linky, $_REQUEST['Link']);

 
// Attempt insert query execution
$sql = "INSERT INTO wishlist (Item, Link) VALUES ('$Item', '$Link')";
if(mysqli_query($linky, $sql)){
    echo '<script language="javascript">';
	echo 'alert("added to wishlist")';
	echo '</script>';
	header( "Location: homepage.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($linky);
}
 
// Close connection
mysqli_close($linky);
?>