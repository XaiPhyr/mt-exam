<?php
$results = file_get_contents("http://restcountries.eu/rest/v2/all");

$decoded = json_decode($results, true);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span class="h3" style="text-align: center">Countries</span>
        </div>
        <div class="card-body">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th width="40%">Name</th>
                        <th width="25%">Capital</th>
                        <th width="15%">Region</th>
                        <th width="10%">Code</th>
                        <th width="5%">Population</th>
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
        </div>
    </div>
</div>