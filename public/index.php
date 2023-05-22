<?php

use App\Models\Personne;
use App\Models\ArticleConfection;
use App\Models\CategorieConfection;
require_once(__DIR__ . '/../vendor/autoload.php');

//$categorie=new CategorieConfection();
//;
$personne=new Personne();
$personne->setNomComplet("Bbw")
        ->setLogin("bbw")
        ->setPassword("bbw")
        ->setType("RS");
echo"<pre>";
var_dump($personne->insert());
echo"</pre>";