<?php

class MainController
{
    function index()
    {
        include("views/index.php");
    }

    function main_xml()
    {
        include("views/main_xml.php");
    }

    function main_json()
    {
        include("views/main_json.php");
    }
}

$main = new MainController;
