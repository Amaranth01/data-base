<?php

require __DIR__ . '/classes/BddSingleton.php';

$bdd = new BddSingleton();
$bdd->setUsername('root')->setPassword("")->setBddName("bdd_cours")->setServer('localhost');

$connexion = $bdd->bddConnect();

var_dump($connexion);
var_dump($bdd->bddConnect());