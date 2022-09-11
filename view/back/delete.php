<?php

require_once '../controllers/database.php';

$connect = new Imp();
$db = $connect->connection('blogsystem','','root','localhost');

$id = $_GET['id'];
$blog_id = $_GET['blog'];
$connect->delete('comment', $id);

header("location:../../detail.php?id=$blog_id");