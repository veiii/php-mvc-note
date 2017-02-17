<?php

include 'model/model.php';

class ArticlesModel extends Model{

    public function getAll() {
        $query="SELECT a.id, a.title, a.date_add, a.autor FROM articles AS a ";
        $select=$this->pdo->query($query);
        foreach ($select as $row) {
            $data[]=$row;
        }
        $select->closeCursor();

        return @$data;
    }
    public function getOne($id) {
        $query="SELECT a.id, a.title, a.date_add, a.autor,  a.content FROM articles AS a WHERE a.id=".$id;
        $select=$this->pdo->query($query);
        foreach ($select as $row) {
            $data[]=$row;
        }
        $select->closeCursor();

        return $data;
    }
    public function insert($data) {
		//xss protect 
		$data['title']=htmlspecialchars($data['title']);
		$data['content']=htmlspecialchars($data['content']);
		$data['autor']=htmlspecialchars($data['autor']);
		
        $ins=$this->pdo->prepare('INSERT INTO articles (title, content, date_add, autor) VALUES (
            :title, :content, :date_add, :autor)');
        $ins->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $ins->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $ins->bindValue(':date_add', $data['date_add'], PDO::PARAM_STR);
        $ins->bindValue(':autor', $data['autor'], PDO::PARAM_STR);
        $ins->execute();
    }
    public function delete($id) {
        $del=$this->pdo->prepare('DELETE FROM articles WHERE id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }
}
?>
