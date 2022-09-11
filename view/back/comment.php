<?php
    require_once '../controllers/database.php';

    $connect = new Imp();
    $db = $connect->connection('blogsystem','','root','localhost');



    $id = $_GET['id'];
    $content = $_POST['content'];
    $mail = $_POST['mail'];
    $date = date('d-m-y h:i:s');
    $author = $_POST['author'];

    $connect->data = [
        'post_id' => $id,
        'date_comment' => $date,
        'email' => $mail,
        'content' => $content,
        'author' => $author,
    ];

    $connect->add_comment('comment');

    header("location:../../detail.php?id=$id");