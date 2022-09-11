<?php 
    require_once '../controllers/database.php';

    $connect = new Imp();
    $db = $connect->connection('blogsystem','','root','localhost');

    $connect->show('blog', $db);
    foreach($connect->rows as $row) {
        $blog_id = $row[0];
    } 

    $connect->show('user', $db);
    foreach($connect->rows as $row) {
        $user_id = $row[0];
        echo $user_id;
    } 



    $title = $_POST['title'];
    $date = $_POST['date_post'];
    $second_author = $_POST['second_author'];
    $reviewer = $_POST['reviewer'];
    $content = $_POST['content'];


    $connect->data = [
        'title' => $title,
        'date_post' => $date,
        'author' => $user_id,
        'blog_id' => $blog_id,
        'second_author' => $second_author,
        'reviewer' => $reviewer,
        'content' => $content,
    ];

    $connect->add('post');

     header("location:../../index.php");