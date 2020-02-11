<?php

class MainController
{
    function webpage($body)
    {
        include("views/header.php");
        include("views/" . $body);
        include("views/footer.php");
    }

    function index()
    {
        $this->webpage("home/index.php");
    }

    function main_xml()
    {
        include("views/xml/main_xml.php");
    }

    function main_json()
    {
        include("views/json/main_json.php");
    }
}

$main = new MainController;
