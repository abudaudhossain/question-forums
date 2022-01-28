<?php
$id = $_GET['id'];
require 'connect.php';
$sql = "DELETE FROM `questions` WHERE id = $id";

if($conn -> query($sql)){
    header("Location:myQuestion.php?msg=success");
 }
