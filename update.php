<?php
include 'load.php';

$id = trim($_POST['id']);
$naziv = trim($_POST['naziv']);
$zanr = trim($_POST['zanr']);
$ocena = trim($_POST['ocena']);
$link = trim($_POST['link']);
$reziser = trim($_POST['reziser']);


$film = new Film();
$film->film_id = $id;
$film->naziv_filma = $naziv;
$film->reziser = $reziser;
$film->ocena = $ocena;
$film->link_imdb = $link;
$film->zanr = $zanr;

if($db->izmeniFilm($film)){
  header("Location: obrada.php?poruka=Uspesno ste izmenili film");
}else{
  header("Location: obrada.php?poruka=Neuspesno ste izmenili film");
}

?>
