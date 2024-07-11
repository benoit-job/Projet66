<?php 
try{
    $bdd = new pdo('mysql:host=localhost;dbname=projet66', 'root','');
}
catch(Exception $e)
{
    die('Erreur: '.$e->getMessage() );
}
?>