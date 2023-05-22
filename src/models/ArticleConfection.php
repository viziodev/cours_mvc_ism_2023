<?php 
namespace App\Models;

use App\Core\Model;

class ArticleConfection extends Model{
  //Attributs
  private int $id;
  private string $libelle;
  private int $prixAchat; 
  private int $qteStock;
  private int $categorieId;  
  
  public function __construct()
  {
    parent::__construct();
    $this->tableName="article_confection";
  }

  

  public function insert(){
    $sql = "INSERT INTO  $this->tableName VALUES (NULL, :libelle,:prix,:qte,:categoreId);";
    $query = $this->db->prepare($sql);
    $query->execute(["libelle" => $this->libelle,
                    "prix"=>$this->prixAchat,
                    "qte"=>$this->qteStock,
                    "categoreId"=>$this->categorieId,
                 ]);
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
  public function setLibelle($libelle)
  {
    $this->libelle = $libelle;

    return $this;
  }

  /**
   * Get the value of prixAchat
   */ 
  public function getPrixAchat()
  {
    return $this->prixAchat;
  }

  /**
   * Set the value of prixAchat
   *
   * @return  self
   */ 
  public function setPrixAchat($prixAchat)
  {
    $this->prixAchat = $prixAchat;

    return $this;
  }

  /**
   * Get the value of qteStock
   */ 
  public function getQteStock()
  {
    return $this->qteStock;
  }

  /**
   * Set the value of qteStock
   *
   * @return  self
   */ 
  public function setQteStock($qteStock)
  {
    $this->qteStock = $qteStock;

    return $this;
  }

  /**
   * Get the value of categorie
   */ 
  public function getCategorie():CategorieConfection
  {
    $article=$this->findById($this->id);
    $categorie=new CategorieConfection;
    return $categorie->findById($article->categorieId);
  }

  /**
   * Set the value of categorie
   *
   * @return  self
   */ 
  public function setCategorie(int $categorieId)
  {
    $this->categorieId =$categorieId ;
    return $this;
  }
}