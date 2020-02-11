<?php
header("Content-type: text/xml");

$results = file_get_contents("http://restcountries.eu/rest/v2/all");

$decoded = json_decode($results);

echo "<?xml version='1.0' encoding='UTF-8' ?>
<data>";
foreach ($decoded as $item) {
    echo "<items>";

    echo "<countryname>" . $item->name . "</countryname>";
    echo "<details>";

    echo "<capital>" . $item->capital . "</capital>";
    echo "<region>" . $item->region . "</region>";
    echo "<code>" . $item->alpha3Code . "</code>";
    echo "<population>" . number_format($item->population, 0, '.', ',') . "</population>";

    echo "</details>";
    echo "</items>";
}

echo "</data>";
