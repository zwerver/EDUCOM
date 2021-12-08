<?php
include_once("functions.php");

if (empty(($_GET))) getContent("home"); else getContent($_GET["page"]);

