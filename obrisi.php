<?php
include 'load.php';

$id = trim($_GET['id']);

$film = new Film();
$film->film_id = $id;


if($db->obrisiFilm($film)){
  header("Location: obrada.php?poruka=Uspesno ste obrisali film");
}else{
  header("Location: obrada.php?poruka=Neuspesno ste obrisali film");
}

?>
