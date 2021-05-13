<?php
$servername="localhost";
$username="root";
$password="";
$db="users";

$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
//     echo "connection successfuly established!<br>";
// }
// else{
    die("sorry we can't connect to database:".mysqli_connect_errer());
}
?>