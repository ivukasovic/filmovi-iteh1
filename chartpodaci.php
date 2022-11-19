<?php
include 'load.php';

$podaci = $db->podaciChart();

echo json_encode($podaci);