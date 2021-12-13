<?php
include_once("functions.php");
//GW : kijk naar je naamgeving, doet deze functie enkel wat zijn naam zegt?
getRequestedPage();

$key = "page";
function getRequestedPage()
{
// GW: Zowel in GET als POST rekening houden met ontbrekende parameter!    
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

