<?php
require_once __DIR__ . '/../Autoloader.php';
use tvshows\Template;
use tvshows\Series;


$series = new Series();
$data = $series->getAllSeries();

foreach ($data as $serie) {
    echo $serie->titre . "<br>";
}
?>
