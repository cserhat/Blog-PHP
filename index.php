<?php

require_once 'view/controllers/database.php';
require_once 'view/front/header.php';

$connect = new Imp();
$db = $connect->connection('blogsystem','','root','localhost');
$connect->show('post', $db);

?>
<html>
<body>
<div class="container">

<?php foreach($connect->rows as $row) {

?>
<div class="row">

    <div class="card" style="width: 100em;">
        <div class="card-body">
    <h3 class="card-title"><?=$row['title']?></h3>
    <p class="card-text"><?=$row['content']?></p>
    <?php
            $id = $row['author'];
            $connect_user = new Imp();
            $db = $connect_user->connection('blogsystem','','root','localhost');
            $connect_user->show_detail('user', $db, $id);
            foreach($connect_user->rows as $user) {
                $rule = $user['role']; 
                $firstname =$user['firstname']; 
                $lastname = $user['lastname'];
            }
    ?>

    <p class="card-text"><?=$row['date_post']?> - <?php echo $firstname?> <?php echo $lastname?> - <?php echo $rule?> </p>
    <a href="detail.php?id=<?=$row['id']?>" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    </div>

    
    
<?php

}?>
</div>



        
    </body>
</html>
