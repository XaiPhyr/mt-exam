<?php
$results = file_get_contents("http://restcountries.eu/rest/v2/all");

$decoded = json_decode($results, true);
?>

<table width="50%" style="margin: 0 auto;" border="1" cellpadding="2" cellspacing="2">
    <thead>
        <tr>
            <th colspan="5">Countries</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Capital</th>
            <th>Region</th>
            <th>Code</th>
            <th>Population</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($decoded as $item) { ?>
            <tr>
                <td><?php echo $item["name"] ?></td>
                <td><?php echo $item["capital"] ?></td>
                <td><?php echo $item["region"] ?></td>
                <td><?php echo $item["alpha3Code"] ?></td>
                <td><?php echo number_format($item["population"], 0, '', ',') ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>