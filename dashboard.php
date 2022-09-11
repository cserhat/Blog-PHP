<?php  
 //login_success.php  
 require_once 'view/controllers/database.php';
 $id = $_GET['id'];
 $connect_user = new Imp();
 $db = $connect_user->connection('blogsystem','','root','localhost');
 $connect_user->show_detail('user', $db, $id);
 foreach($connect_user->rows as $user) {
     $role = $user['role']; 
     $mail =$user['email']; 
     $lastname =$user['lastname'];
     $firstname =$user['firstname'];
     
 }
 session_start();  
 if(isset($_SESSION["email"]) )  
 {
    $_SESSION['role'] = 'Administrator';
    if($_SESSION['email'] == $mail)
 {  
      require_once 'view/front/header.php';
      echo '<h3>Vous etes connecte, Bonjour - '.$_SESSION["email"].'</h3>';  
      echo '<h3>'.$role.'</h3>'; 
      echo '<h3> '.$lastname.'</h3>'; 
      echo '<h3> '.$firstname.'</h3>'; 
      echo '<br /><br /><a href="view/back/logout.php">Logout</a>';  
 }  
 else
 {
    header("location:dashboard.php?id=$id");  
 }
}
 else  
 {  
    header("location:dashboard.php?id=$id");    
 }  
 ?>  