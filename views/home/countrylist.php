<?php
$results = file_get_contents("http://restcountries.eu/rest/v2/all");

if ($_POST['region']) {
    switch ($_POST['region']) {
        default:
            $results = file_get_contents("http://restcountries.eu/rest/v2/all");
            break;

        case 'asia':
            $results = file_get_contents("http://restcountries.eu/rest/v2/region/asia");
            break;

        case 'americas':
            $results = file_get_contents("http://restcountries.eu/rest/v2/region/americas");
            break;

        case 'europe':
            $results = file_get_contents("http://restcountries.eu/rest/v2/region/europe");
            break;

        case 'oceania':
            $results = file_get_contents("http://restcountries.eu/rest/v2/region/oceania");
            break;

        case 'africa':
            $results = file_get_contents("http://restcountries.eu/rest/v2/region/africa");
            break;
    }
}

$decoded = json_decode($results, true);
$total = 0;

foreach ($decoded as $item) {
    if ($total > $item["population"]) {
        $total = $total;
    } else {
        $total = $item["population"];
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <span class="h3" style="text-align: center">Countries</span>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-12">
                    <form action="" method="post">
                        <button class="btn btn-danger" name="region" value="reset">Reset</button>
                        <button class="btn btn-primary" name="region" value="asia">Asia</button>
                        <button class="btn btn-primary" name="region" value="americas">America</button>
                        <button class="btn btn-primary" name="region" value="europe">Europe</button>
                        <button class="btn btn-primary" name="region" value="oceania">Oceania</button>
                        <button class="btn btn-primary" name="region" value="africa">Africa</button>
                    </form>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-3">
                    <?php foreach ($decoded as $item) {
                        if ($item["population"] == $total) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <span>Highest Population: </span>
                                    <br>
                                    <div><strong><?php echo $item["name"] ?></strong> - <?php echo number_format($item["population"], 0, '', ',') ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%"></th>
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
                                    <td><img src="<?php echo $item["flag"] ?>" alt="" style="width:50px;height:25px;" class="img-thumbnail"></td>
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
    </div>
</div>