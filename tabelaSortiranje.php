<?php
include 'load.php';

$filmovi = $db->sortirajFilmove($_GET['sort']);

?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Naziv filma</th>
      <th>Zanr</th>
      <th>Reziser</th>
      <th>Ocena</th>
      <th>Link ka IMDB-u</th>
    </tr>
  </thead>
  <tbody>
<?php

foreach ($filmovi as $film ) {
  ?>
  <tr>
    <td><?= $film->naziv_filma ?></td>
    <td><?= $film->zanr->naziv_zanra ?></td>
    <td><?= $film->reziser ?></td>
    <td><?= $film->ocena ?></td>
    <td><a class="btn btn-info" href="<?= $film->link_imdb ?>">Pogledaj vise...</a></td>
  </tr>
  <?php
}

 ?>
</tbody>
</table>
