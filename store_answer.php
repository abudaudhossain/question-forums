<?php
$comment = $_POST['comment'];
$user_id = $_POST['user_id'];
$post_id = $_POST['post_id'];

echo $comment." ".$user_id." ".$post_id;

require 'connect.php';

$sql = "INSERT INTO `answer`(`user_id`, `questions_id`, `answer`)  VALUES ('$user_id','$post_id','$comment')";




if($conn -> query($sql)){
   header("Location: details.php?id=$post_id&msg=success");

}