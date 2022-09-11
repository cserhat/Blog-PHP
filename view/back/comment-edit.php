
<?php
    require_once '../controllers/database.php';

    $connect = new Imp();
    $db = $connect->connection('blogsystem','','root','localhost');
    $id = $_GET['id'];
    $blog = $_GET['blog'];
    $content = $_POST['content'];
    $mail = $_POST['mail'];
    $author = $_POST['author'];

    $connect->data = [
            'id' => $id,
            'email' => $mail,
            'content' => $content,
            'author' => $author
    ];

    $connect->update('comment',$id);

    header("location:../../detail.php?id=$blog");