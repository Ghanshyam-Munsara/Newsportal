<?php

include "config.php";

if($_SESSION["user_role"] == '0'){
    header("location: {$hostname}/admin/post.php");
}

$userid = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id =  {$userid} ";
if(mysqli_query($conn,$sql)){

    header("Location: {$hostname}/admin/users.php");
}else{
    echo "<p stle= 'color:red; margin: 10px:0;'> Can\'t Delete User Record</p>";
}

mysqli_close($conn);

?>