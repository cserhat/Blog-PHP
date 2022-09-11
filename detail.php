<html>
    <head>
        <style>
            body{margin-top:20px;}

.content-item {
    padding:30px 0;
	background-color:#FFFFFF;
}

.content-item.grey {
	background-color:#F0F0F0;
	padding:50px 0;
	height:100%;
}

.content-item h2 {
	font-weight:700;
	font-size:35px;
	line-height:45px;
	text-transform:uppercase;
	margin:20px 0;
}

.content-item h3 {
	font-weight:400;
	font-size:20px;
	color:#555555;
	margin:10px 0 15px;
	padding:0;
}

.content-headline {
	height:1px;
	text-align:center;
	margin:20px 0 70px;
}

.content-headline h2 {
	background-color:#FFFFFF;
	display:inline-block;
	margin:-20px auto 0;
	padding:0 20px;
}

.grey .content-headline h2 {
	background-color:#F0F0F0;
}

.content-headline h3 {
	font-size:14px;
	color:#AAAAAA;
	display:block;
}


#comments {
    box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
	background-color:#FFFFFF;
}

#comments form {
	margin-bottom:30px;
}

#comments .btn {
	margin-top:7px;
}

#comments form fieldset {
	clear:both;
}

#comments form textarea {
	height:100px;
}

#comments .media {
	border-top:1px dashed #DDDDDD;
	padding:20px 0;
	margin:0;
}

#comments .media > .pull-left {
    margin-right:20px;
}

#comments .media img {
	max-width:100px;
}

#comments .media h4 {
	margin:0 0 10px;
}

#comments .media h4 span {
	font-size:14px;
	float:right;
	color:#999999;
}

#comments .media p {
	margin-bottom:15px;
	text-align:justify;
}

#comments .media-detail {
	margin:0;
}

#comments .media-detail li {
	color:#AAAAAA;
	font-size:12px;
	padding-right: 10px;
	font-weight:600;
}

#comments .media-detail a:hover {
	text-decoration:underline;
}

#comments .media-detail li:last-child {
	padding-right:0;
}

#comments .media-detail li i {
	color:#666666;
	font-size:15px;
	margin-right:10px;
}
        </style>
    </head>
</html>

<?php

require_once 'view/controllers/database.php';


$connect = new Imp();
$db = $connect->connection('blogsystem','','root','localhost');

?>
<div class="container">
 <?php
            $id = $_GET['id'];
            $connect = new Imp();
            $db = $connect->connection('blogsystem','','root','localhost');
            $connect->show_detail('post', $db, $id);
            $idvarible = $connect->rows;
            foreach($idvarible as $valeur) {
                $valeur_id = $valeur['id'];
            }
            if($id == $valeur_id){

            foreach($connect->rows as $row) {?>
            <p ><h1 class="font-weight-bolder"><?=$row['title']?></h1></p>
                <p class="card-text"><?=$row['content']?></p>
                <p class="card-text"><?=$row['date_post']?></p>
            <?php
            }} else
            {
                header("location:index.php");
            }
            ?>

<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["email"]))  
 {  
    require_once 'view/front/header.php';
      echo '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <section class="content-item" id="comments">
          <div class="container">   
              <div class="row">
                  <div class="col-sm-8">   
                      <form action="view/back/comment.php?id='.$id.'" method="POST">
                          <h3 class="pull-left">New Comment</h3>
                          <button type="submit" class="btn btn-normal">Submit</button>
                          <fieldset>
                              <div class="row">
                                  <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                      <textarea class="form-control" name="content" id="message" placeholder="Your message" required=""></textarea>
                                  </div>
                                  <br>
                                  <div class="form-group  col-xs-12 col-sm-9 col-lg-10">
                                  <input type="mail" class="form-control" placeholder="E-Mail" name="mail">
                                   </div>     
                                   <div class="form-group  col-xs-12 col-sm-9 col-lg-10">
                                  <input type="text" class="form-control" placeholder="Author" name="author">
                                   </div>           
                              </div>  	
                          </fieldset>
                      </form>';   
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>  

                
                <h3><?php             
                    $count = new Imp();
                    $db = $count->connection('blogsystem','','root','localhost');
                    $count->count('comment', $db, $id);
                    echo  $count->count; ?> Comments</h3>
                

                    <?php
            
            $connect_comment = new Imp();
            $db = $connect_comment->connection('blogsystem','','root','localhost');
            $connect_comment->show_comment('comment', $db, $id);



            foreach($connect_comment->rows as $comment) {?>


<?php  
 //login_success.php  
  
 if(isset($_SESSION["email"]))  
 {  
      echo '   <div class="media">
      <a class="pull-left" href="#"><img class="media-object" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
        
  <div class="media-body">
      <h4 class="media-heading">'.$comment['author'].'</h4>
      <p>'.$comment['content'].'</p>
      <a href="comment-edit.php?id='.$comment['id'].'&blog='.$id.'"><button type="button" class="btn btn-success">Edit</button>
      <a href="view/back/delete.php?id='.$comment['id'].'&blog='.$id.'"><button type="button" class="btn btn-danger">Delete</button></a>
      </div></div>
      ';  

 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>  
                         

            <?php

            }?>        
           
                <!-- COMMENT 1 - END -->
                
            </div>
        </div>
    </div>
</section>
</div>