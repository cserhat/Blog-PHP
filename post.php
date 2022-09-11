
<?php  

 //login_success.php  
 session_start();  
 if(isset($_SESSION["email"]))  
 {  
  include 'view/front/header.php';    
  echo '
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=*, initial-scale=1.0">
          <title>Formulaire</title>
      </head>
      <body>
      <h1>Add New Post</h1>
      <form action="view/back/post.php" method="POST">
      
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Author</label>
          <input type="text" class="form-control" placeholder="Author" name="author">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Author</label>
          <input type="text" class="form-control" placeholder="Second Author" name="second_author">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Author</label>
          <input type="text" class="form-control" placeholder="Reviewer" name="reviewer">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Content</label>
          <input type="text" class="form-control" placeholder="Content" name="content">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Date</label>
          <input type="date" class="form-control" placeholder="Content" name="date_post">
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