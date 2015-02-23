<?php

require __DIR__. '/sql.php';

class Table{

  public $name;

  public function __construct($name){
      Connection('library');
      $this->name = $name;
  }
  public function Add($article){         //Добавляет запись в бд, возвращает добавленную запись с id
      record_toDB($article);
      $query = "SELECT * FROM $this->name ORDER BY id DESC";
      return get_record($query);
  }
  public function getAll($type){
      //$type = 'news';
      $query = "SELECT * FROM $this->name WHERE a_type='$type' ORDER BY pub_date DESC";
      return sql_Query($query);
  }

  public function getArticle($id){
      $query = "SELECT * FROM $this->name WHERE id='$id' ";
      return get_record($query);
  }

  public function Update($article){
      return update_record($article);
  }
  public function getLast(){
      $query = "SELECT * FROM $this->name ORDER BY id DESC";
      return get_record($query);
  }
  public function Delete($id){
      $query = "DELETE FROM $this->name WHERE id='$id' ";
      return mysql_query($query);
  }
  public function Close(){
      Disconnection();
  }
}
