<?php

switch ($_GET['page']) {
    default:
        include("controllers/main.php");
        $main->index();
        break;

    case 'xml':
        include("controllers/main.php");
        $main->main_xml();
        break;

    case 'json':
        include("controllers/main.php");
        $main->main_json();
        break;
}
