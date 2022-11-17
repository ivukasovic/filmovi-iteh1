<?php include 'load.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Filmovi &mdash; Ocene najboljih filmova</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

  <?php include 'meni.php'; ?>
  <?php include 'slider.php'; ?>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Pretraga filmova</h2>
          </div>
          <div class="col-md-12 mx-auto text-center mb-5 section-heading">
            <label for="pretraga">Pretraga po zanru:</label>
            <select id="pretraga" onchange="izvrsiPretragu(this.value)" class="form-control">
              <option value="SVI">Svi Zanrovi</option>

              <?php
                $zanrovi = $db->vratiZanrove();

                foreach ($zanrovi as $zanr ) {
                  ?>
                    <option value="<?= $zanr->zanr_id ?>"><?= $zanr->naziv_zanra ?></option>
                  <?php
                }

               ?>
            </select>
          </div>
          <div class="col-md-12 mx-auto text-center mb-5 section-heading">
            <div id="rezultatPretrage"></div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>

  <script>

    function izvrsiPretragu(pretraga){
        $.ajax({
          url: 'tabelaPretraga.php',
          data: {pretraga : pretraga},
          success: function(data){
            $("#rezultatPretrage").html(data);
          }
        });
    }

    izvrsiPretragu('SVI');

  </script>
  </body>
</html>
