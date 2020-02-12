<?php
$domOBJ = new DOMDocument();
$domOBJ->load("https://link.springer.com/search.rss?facet-content-type=%22Article%22&facet-journal-id=11111&sortOrder=newestFirst");
?>

<div class="container col-9">
    <div class="card col-5 mb-2 mx-auto">
        <div class="card-body">
            <div class="h1 text-center">Population & Environment</div>
        </div>
    </div>

    <?php
    $content = $domOBJ->getElementsByTagName("item");

    foreach ($content as $data) {
        $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
        $description = $data->getElementsByTagName("description")->item(0)->nodeValue;
        $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
        $date = $data->getElementsByTagName("pubDate")->item(0)->nodeValue;
    ?>

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h4"><strong><?php echo $title ?></strong></span>
                    </div>
                    <div class="card-body">
                        <span><?php echo $description ?></span>
                        <span style="float:right" class="text-muted">
                            <?php echo $date ?>
                        </span>
                        <span>Link: <a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>