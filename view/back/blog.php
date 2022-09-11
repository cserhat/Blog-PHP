<?php 
    require_once '../controllers/database.php';

    $connect = new Imp();
    $db = $connect->connection('blogsystem','','root','localhost');

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $logo = $_POST['logo'];
    $administrator = $_POST['administrator'];

    $connect->data = [
        'title' => $title,
        'subtitle' => $subtitle,
        'description' => $description,
        'logo' => $logo,
        'administrator' => $administrator,
    ];

    $connect->add_blog('blog');

    header("location: ../../index.php");