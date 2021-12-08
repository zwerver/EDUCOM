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
        default:
            break;
    }
    getFooter();
}



/**
 * @return void
 */
function login()
{

    $users = getUsers();
    if(empty($_POST["email"])||empty($_POST["password"])){
        echo 'Fill in both email and password';
        return;
    }
    if(isset($_SESSION['loggedinuser']) && !empty($_SESSION['loggedinuser'] )){
        getContent("loginFailedAlreadyLogin");
        return;
    }

    foreach ($users as $val){

        $temppassword= $val['password'];
        $tempusername= $val['email'];

        if($_POST["email"]==$tempusername&& $_POST["password"]==$temppassword){
            $_SESSION['loggedinuser'] = $val;
            getContent("Home");
            return;
        }
    }
    getContent("loginFailWrongInfo");


}



/**
 * This function will check if the to register is valid if not it will throw back to the same page with an error.
 * @return void
 */
function register()
{
    $users = getUsers();

    if(empty($_POST["name"] || empty($_POST["email"]) || empty($_POST["password"]))) {
        return;
    }
    foreach ($users as $val){
        $tempusername= $val['email'];
        if($_POST["email"]==$tempusername){
            getContent('registerFailEmailDub');
            return;
        }
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