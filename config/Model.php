<?php 

namespace App\Core;
class Model{
 protected \PDO $db;
 protected string  $tableName;
  public function __construct()
  {
      
      try {
          $this->db = new \PDO('mysql:host=localhost:8889;dbname=gestion_atelier_php_ism_2022',
          'root',
          'root');
      } catch (\Exception $ex) {
          die("Erreur de connexion a la Base de donnee");
      }
      
  }

  public function findAll()
  {
      $sql = "SELECT * FROM $this->tableName " ;
      $query = $this->db->query($sql);
      return $query->fetchAll(\PDO::FETCH_CLASS, get_called_class());
  }

  public function findById(int $id)
  {
      $sql = "SELECT * FROM $this->tableName  WHERE id = :id";
      $query = $this->db->prepare($sql);
      $query->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
      $query->execute(["id" => $id]);
      return $query->fetch();
  }

  public function remove(int $id):int
  {
      $sql = "DELETE FROM  $this->tableName  WHERE id = :id";
      $query = $this->db->prepare($sql);
      $query->execute(["id" => (int)$id]);
      return  $query->rowCount();
  }

    
}