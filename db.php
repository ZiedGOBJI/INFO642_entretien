<?php

// Tables à créer
//
// brewery(idbrewery, name, #country)
// beer(idbeer, name, degree, #idbrewery)
//

// Modifier la dbname (votre login), login et mot de passe

$db = new PDO("pgsql:host=localhost;dbname=m3104","ldama","hop");

// Modifier le schéma (le schéma est obligatoire)

$db->query("SET search_path TO beer;");

function db() { global $db; return $db; }



