<?php
header('Content-Type: application/json');

$results = file_get_contents("http://restcountries.eu/rest/v2/all");

echo $results;
