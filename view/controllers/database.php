<?php 

interface database
{
    public function connection($db_name, $db_pass, $db_user, $host);
    public function show($table, $db);
    public function delete($table, $id);
}

class Imp implements database
{

    private $db = NULL;
    public $rows = NULL;
    public $id = NULL;
    public $data = NULL;
    public $count = NULL;

    public function connection($db_name, $pass, $user, $host)
    {
       $this->db = new PDO('mysql:host='.$host.';dbname='.$db_name.'', $user, $pass);
    }
    
    public function add($table)
    {
        $sql = "INSERT INTO $table (title, date_post, author, blog_id, second_author,reviewer,content) VALUES (:title, :date_post, :author,:blog_id, :second_author,:reviewer,:content)";
        $this->db->prepare($sql)->execute($this->data);
    }
    public function add_user($table)
    {
        $sql = "INSERT INTO $table (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email,:password)";
        $this->db->prepare($sql)->execute($this->data);
    }
    public function add_blog($table)
    {
        $sql = "INSERT INTO $table (title, subtitle, description,logo, administrator) VALUES (:title, :subtitle, :description,:logo,:administrator)";
        $this->db->prepare($sql)->execute($this->data);
    }
    public function add_comment($table)
    {
        $sql = "INSERT INTO $table (post_id, date_comment, author,email, content) VALUES (:post_id, :date_comment, :author,:email,:content)";
        $this->db->prepare($sql)->execute($this->data);
    }
    
    public function show($table,$db)
    {
        $sql = $this->db->query('SELECT * FROM '.$table.' ');
        $this->rows = $sql->fetchAll();
    }

    public function session_show($table,$db,$email)
    {
        $sql = $this->db->query('SELECT * FROM '.$table.' WHERE `email` = '.$email.' ');
        $this->rows = $sql->fetchAll();
    }

    public function show_detail($table, $db, $id)
    {
        $sql = $this->db->query('SELECT * FROM '.$table.' WHERE `id` = '.$id.' ');
        $this->rows = $sql->fetchAll();
    }
    public function show_comment($table, $db, $id)
    {
        $sql = $this->db->query('SELECT * FROM '.$table.' WHERE `post_id` = '.$id.' ');
        $this->rows = $sql->fetchAll();
    }
    public function show_comment_edit($table, $db, $id)
    {
        $sql = $this->db->query('SELECT * FROM '.$table.' WHERE `id` = '.$id.' ');
        $this->rows = $sql->fetchAll();
    }
    public function delete($table, $id)
    {
        $this->db->prepare("DELETE FROM $table WHERE id=$id")->execute();
    }
    public function count($table,$db, $id)
    {
        $count = $this->db->query('SELECT * FROM '.$table.' WHERE `post_id` = '.$id.' ');
        $count->execute();
        $this->count = $count->rowCount();
    }

    public function update($table,$id)
    {
        $sql = "UPDATE $table SET email=:email, author=:author, content=:content WHERE `id`=:id";
        $this->db->prepare($sql)->execute($this->data);
    }

}

//$maclasse = new Imp();
//$db = $maclasse->connection('blog','','root','localhost');
//$maclasse->show('blogger', $db);
//foreach($maclasse->rows as $row) {
//    printf("$row[0] $row[1] $row[2] $row[3] $row[4]");} 

