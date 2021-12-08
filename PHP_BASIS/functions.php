<?php
include_once('data/DataConnectionUsers.php');
include_once('data/DataConnectionContent.php');
session_start();

function getContent($PageName)
{
    getHead();
    switch ($PageName) {
        case "home":
            getContentHome();
            break;
        case "about":
            getContentAbout();
            break;
        case "contact":
            getContentContact();
            break;
        case "contactFail":
            echo '<h1> Woepsie something went wrong. Please try again! </h1>';
            getContentContact();
            break;
        case "contacted":
            getContentContacted();
            break;
        case "login":
            getContentLoginPage();
            break;
        case "loginFailWrongInfo":
            echo 'either your email/password combination is wrong or not registered. Register here <a href="index.php?page=register"> click</a>';
            getContentLoginPage();
            break;
        case "loginFailedAlreadyLogin":
            echo 'you are already logged in!';
            getContentHome();
            break;
        case "register":
            getContentRegister();
            break;
        case "registerFail":
            echo '<h1> Woepsie something went wrong. Please try again!</h1>';
            getContentRegister();
            break;
        case "registerFailEmailDub":
            echo 'Woepsie there is already an account with that email!';
            getContentRegister();
            break;
        case "logout":
            logout();
            getContentHome();
            break;
        case "registered":
            echo getContentRegistered();
            break;
        default:
            break;
    }
    getFooter();
}



/**
 * @return void
 */




/**
 * This function will check if the to register is valid if not it will throw back to the same page with an error.
 * @return void
 */
function register()
{
    if(empty($_POST["name"] || empty($_POST["email"]) || empty($_POST["password"]))) {
        return;
    }
    addUser();
}

/**
 *
 * This function will destroy the session in order to logout.
 * @return void
 */
function logout(){
    session_destroy();
}
function getYear()
{
    return date("Y");
}
function v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

        // 32 bits for "time_low"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}