 <?php
  require_once 'view/controllers/database.php';

    $connect_comment = new Imp();
    $db = $connect_comment->connection('blogsystem','','root','localhost');
    $id = $_GET['id'];
    $blog = $_GET['blog'];
    $connect_comment->show_comment_edit('comment', $db, $id);
    $idvarible = $connect_comment->rows;
    foreach($idvarible as $valeur) {
        $valeur_id = $valeur['id'];
        $post_id = $valeur['post_id'];
    }
    if($id == $valeur_id && $blog ==  $post_id ){


    foreach($connect_comment->rows as $comment) { 
        require_once 'view/front/header.php';?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<section class="content-item" id="comments">
    <div class="container">   
    	<div class="row">
            <div class="col-sm-8">   
                <form action="view/back/comment-edit.php?id=<?php echo $id?>&blog=<?php echo $blog?>" method="POST">
                	<h3 class="pull-left">Update my comment</h3>
                	<button type="submit" class="btn btn-normal">Submit</button>
                    <fieldset>
                        <div class="row">
                            <h5>content:</h5>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" name="content" id="message" value="<?=$comment['content']?>" required> </textarea>
                            </div>
                            <br>
                            <h5>mail:</h5>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                            <input type="mail" class="form-control" value="<?=$comment['email']?>" name="mail" >
                             </div> 
                             <h5>author:</h5>    
                             <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                            <input type="text" class="form-control" value="<?=$comment['author']?>" name="author">
                             </div>           
                        </div>  	
        </fieldset>
</form>
<?php  
}
}else
{
    header("location:detail.php?id=$blog");
}
?>
