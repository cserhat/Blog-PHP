<?php 
    require_once '../controllers/database.php';

    $connect = new Imp();
    $db = $connect->connection('blogsystem','','root','localhost');


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connect->data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
    ];

    print_r ($connect->data);
    $connect->add_user('user');

    header("location: ../../login.php");