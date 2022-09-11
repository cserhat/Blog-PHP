
<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "blogsystem";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>Rempliser tous les cases</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM user WHERE email = :email AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>     $_POST["password"],
                     )  
                );  
                $count = $statement->rowCount(); 
                $rows = $statement->fetchAll();
                if($count > 0)  
                {  
                     $_SESSION["email"] = $_POST["email"];
                     foreach($rows as $row) {
                         $user_id = $row['id']; 
 
                     }
                     header("location:dashboard.php?id=$user_id");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 include 'view/front/header.php'
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3>Login</h3><br />  
                <form method="post">  
                     <label>Email</label>  
                     <input type="text" name="email" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />
                     <a href="sign-up.php" blank> <button type="button" class="btn btn-info">Register</button>  </a>
                </form>  
                
              
           </div>  
           <br />  
      </body>  
 </html>  