<?php
/**
 * This PHP file will handle all data connections. At the moment it uses a local TXT file. This will be replaced with a database later on.
 * I have done this, so I can later just change the implementation of the functions without a need to change the functions using it.
 */



/**
 * This function will get all data from users.txt which is a JSON. This is done in sake of standardisation.
 * @return array of all users
 */
function getUsers(){
    $filename = 'users.txt';
    $fp = fopen($filename,'r');
    $input = fread($fp,filesize($filename));
    return json_decode('['.$input.']',true);
}

/**
 * This will add a user to that users.txt
 * @return void
 */
function addUser(){
    $filename = 'users.txt';
    $fp = fopen($filename,"a");
    fwrite($fp,','.json_encode($_POST));
    fclose($fp);
}