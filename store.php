<?php
$title = $_POST['title'];
$description = $_POST['description'];
$user_id = 1;
//  echo $description;
require 'connect.php';

$sql = "INSERT INTO `questions`(`title`, `description`, `user_id`) VALUES ('$title','$description',$user_id)";




if($conn -> query($sql)){
   header("Location: index.php?msg=success");
}
