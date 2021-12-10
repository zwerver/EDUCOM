<?php
include_once("functions.php");
getRequestedPage();

$key = "page";
function getRequestedPage()
{
    $requested_type = $_SERVER['REQUEST_METHOD'];
    if ($requested_type == 'POST')
    {
        echo 'post';
        doPost($_POST["page"]);
    }
    else
    {
        echo'get';
        getContent($_GET["page"]);
    }

}

