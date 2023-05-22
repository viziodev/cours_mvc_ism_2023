<?php 
namespace App\Models;

use App\Core\Model;

class CategorieConfection extends Model{
    //Attributs
    private int $id;
    private string $libelle;
    
    
    public function __construct()
    {
      parent::__construct();
      $this->tableName="categorie_confection";
    }
    
    public function insert(){
        $sql = "INSERT INTO  $this->tableName= VALUES (NULL, :libelle);";
        $query = $this->db->prepare($sql);
        $query->execute(["libelle" => (string)$this->libelle]);
        return $this->findById((int)$this->db->lastInsertId());
     }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle):self
    {
        $this->libelle = $libelle;

        return $this;
    }
}