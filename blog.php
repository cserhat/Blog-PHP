

<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["email"]))  
 {  
  include 'view/front/header.php';
      echo '<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=*, initial-scale=1.0">
          <title>Formulaire</title>
      </head>
      <body>
          <h1>Add New Blog</h1>
          <form action="view/back/blog.php" method="POST">
      
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Subtitle</label>
          <input type="text" class="form-control" placeholder="subtitle" name="subtitle">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control" placeholder="description" name="description">
        </div>
        <br>
        <div class="form-group">
          <input type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="logo" name="logo">
        </div>
        <br>
        <div class="form-group">
          <label for="exampleInputPassword1">Administrator</label>
          <input type="text" class="form-control" placeholder="administrator" name="administrator">
        </div>
          <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </body>
      </html>
      ';  
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>  