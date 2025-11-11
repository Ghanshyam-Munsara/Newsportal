<?php
include "config.php";

if(isset($_POST['save'])){

    session_start();
    $Referer = $_SERVER['HTTP_REFERER'];

    if(!isset($_POST['cat']) || empty($_POST['cat'])){
        $_SESSION['error-cat'] = "The category name field is required";
        header("location: $Referer");
    }
    

    $category = mysqli_real_escape_string($conn,$_POST['cat']);
    $date = date("d M, Y");
    $author = $_SESSION['user_id'];
    
    $sql = "INSERT INTO post(title,description,category,post_date,author,post_img) VALUES ('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}');";
    $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category} ";
    
    if(mysqli_multi_query($conn,$sql)){
        header("location: {$hostname}/admin/post.php");
    }else{
        echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
}else{
    die('Something went wrong!');
}


?>
