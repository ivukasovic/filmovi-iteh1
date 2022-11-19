<?php
include 'load.php';

$naziv = trim($_POST['naziv']);
$zanr = trim($_POST['zanr']);
$ocena = trim($_POST['ocena']);
$link = trim($_POST['link']);
$reziser = trim($_POST['reziser']);


$film = new Film();
$film->naziv_filma = $naziv;
$film->reziser = $reziser;
$film->ocena = $ocena;
$film->link_imdb = $link;
$film->zanr = $zanr;

if($db->unesiFilm($film)){
  header("Location: obrada.php?poruka=Uspesno ste uneli film");
}else{
  header("Location: obrada.php?poruka=Neuspesno ste uneli film");
}

?>
