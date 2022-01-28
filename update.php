<?php 
$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_POST['user_id'];
$id = $_POST['id'];
require 'connect.php';

echo $id.$user_id.$title.$description;

$sql = "UPDATE `questions` SET `title`='$title',`description`='$description',`user_id`='$user_id' WHERE id = $id";

if($conn -> query($sql)){
    header("Location: index.php?msg=success");
 }

?>