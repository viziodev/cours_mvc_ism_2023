<?php 
namespace App\Models;

use App\Core\Model;

class Personne extends Model{
//Attributs
private int $id;
private string $nomComplet;
private string $login;
private string $password;
private string $type;

public function __construct()
{
  parent::__construct();
  $this->tableName="personne";
}



public function insert(){
$sql = "INSERT INTO $this->tableName VALUES (NULL, :nomComplet,:logins,:passwords,:type);";
$query = $this->db->prepare($sql);
$query->execute(["nomComplet" => $this->nomComplet,
"logins"=>$this->login,
"passwords"=>$this->password,
"type"=>$this->type,
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
 * Get the value of nomComplet
 */ 
public function getNomComplet()
{
return $this->nomComplet;
}

/**
 * Set the value of nomComplet
 *
 * @return  self
 */ 
public function setNomComplet($nomComplet)
{
$this->nomComplet = $nomComplet;

return $this;
}

/**
 * Get the value of login
 */ 
public function getLogin()
{
return $this->login;
}

/**
 * Set the value of login
 *
 * @return  self
 */ 
public function setLogin($login)
{
$this->login = $login;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of type
 */ 
public function getType()
{
return $this->type;
}

/**
 * Set the value of type
 *
 * @return  self
 */ 
public function setType($type)
{
$this->type = $type;

return $this;
}
}