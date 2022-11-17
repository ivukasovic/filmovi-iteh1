<?php

class DBKomunikacija{
  public $mysqli;

  public function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

  public function vratiZanrove(){
    $upit = 'SELECT * FROM zanr';
    $rezultat = $this->mysqli->query($upit);
    $nizZanrova = [];

    while($rez = $rezultat->fetch_object()){
      $zanr = new Zanr();
      $zanr->zanr_id = $rez->zanr_id;
      $zanr->naziv_zanra = $rez->naziv_zanra;
      $nizZanrova[] = $zanr;
    }

    return $nizZanrova;
  }
  function pretraziFilmove($pretraga){
    $upit = 'SELECT * FROM filmovi f join zanr z on f.zanr_id = z.zanr_id';
    $rezultat = $this->mysqli->query($upit);
    $niz = [];

    while($rez = $rezultat->fetch_object()){
      if($pretraga =='SVI' || $pretraga == $rez->zanr_id){
        $zanr = new Zanr();
        $zanr->zanr_id = $rez->zanr_id;
        $zanr->naziv_zanra = $rez->naziv_zanra;

        $film = new Film();
        $film->film_id = $rez->film_id;
        $film->naziv_filma = $rez->naziv_filma;
        $film->reziser = $rez->reziser;
        $film->ocena = $rez->ocena;
        $film->link_imdb = $rez->link_imdb;
        $film->zanr = $zanr;

        $niz[] = $film;
      }
    }

    return $niz;
  }

    function sortirajFilmove($sort){
      $upit = 'SELECT * FROM filmovi f join zanr z on f.zanr_id = z.zanr_id order by f.ocena '. $sort;
      $rezultat = $this->mysqli->query($upit);
      $niz = [];

      while($rez = $rezultat->fetch_object()){
          $zanr = new Zanr();
          $zanr->zanr_id = $rez->zanr_id;
          $zanr->naziv_zanra = $rez->naziv_zanra;

          $film = new Film();
          $film->film_id = $rez->film_id;
          $film->naziv_filma = $rez->naziv_filma;
          $film->reziser = $rez->reziser;
          $film->ocena = $rez->ocena;
          $film->link_imdb = $rez->link_imdb;
          $film->zanr = $zanr;

          $niz[] = $film;
      }

      return $niz;
    }

    public function unesiFilm($film){
      $upit = "INSERT INTO filmovi VALUES (null,'$film->naziv_filma','$film->reziser',$film->ocena,'$film->link_imdb',$film->zanr)";
      return $this->mysqli->query($upit);
    }

    function vratiFilm($id){
      $upit = 'SELECT * FROM filmovi f join zanr z on f.zanr_id = z.zanr_id where f.film_id = '. $id;
      $rezultat = $this->mysqli->query($upit);

      while($rez = $rezultat->fetch_object()){
          $zanr = new Zanr();
          $zanr->zanr_id = $rez->zanr_id;
          $zanr->naziv_zanra = $rez->naziv_zanra;

          $film = new Film();
          $film->film_id = $rez->film_id;
          $film->naziv_filma = $rez->naziv_filma;
          $film->reziser = $rez->reziser;
          $film->ocena = $rez->ocena;
          $film->link_imdb = $rez->link_imdb;
          $film->zanr = $zanr;

          return $film;

      }

      return null;
    }

    public function izmeniFilm($film){
      $upit = "UPDATE filmovi SET naziv_filma = '$film->naziv_filma', reziser = '$film->reziser',ocena = $film->ocena, link_imdb = '$film->link_imdb', zanr_id = $film->zanr WHERE film_id = $film->film_id";
      return $this->mysqli->query($upit);
    }

    public function obrisiFilm($film){
      $upit = "DELETE FROM filmovi WHERE film_id = $film->film_id";
      return $this->mysqli->query($upit);
    }


    function podaciChart(){
      $upit = 'SELECT z.naziv_zanra, count(*) as brojFilmova FROM filmovi f join zanr z on f.zanr_id = z.zanr_id group by f.zanr_id';
      $rezultat = $this->mysqli->query($upit);
      $niz = [];

      while($rez = $rezultat->fetch_object()){
          $niz[] = $rez;
      }

      return $niz;
    }
}

?>
