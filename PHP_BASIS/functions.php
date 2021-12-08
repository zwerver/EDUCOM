<?php
session_start();
$_SESSION['loggedinuser'];

global $loggedinUser;
function getYear()
{

    return date("Y");
}

function getHead()
{

    echo "<!DOCTYPE html><html lang=\"en\">";
    echo "<head></head><link rel=\"stylesheet\" href=\"css/basis.css\">";
    echo "  <meta charset=\"UTF-8\">";
    echo " <title>Website_Tjidde</title></head><body>";
    echo "<header class=\"header\"><a href=\"index.php?page=home\">Home</a> <a href=\"index.php?page=about\">About</a> <a href=\"index.php?page=contact\">Contact</a>";
    if ($_SESSION['loggedinuser'] != 0) {
        echo "<strong>".$_SESSION['loggedinuser']['name']."</strong> </header>";
    } else {
        echo "<a href=\"index.php?page=register\">Register</a><a href=\"index.php?page=login\">Login</a></header> ";
    }
}


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
        case "contacted":
            getContentContacted();
            break;
        case "login":
            getContentLoginPage();
            break;
        case "register":
            getContentRegister();
            break;
        default:
            break;
    }
    getFooter();
}

function getFooter()
{
    echo "<footer class=\"footer\">&copy; Tjidde.nl" . getYear() . "<a href=\"https://github.com/tjidde-nl/EDUCOM\">GITHUB</a> </footer></body></html>";
}

function getContentHome()
{
    echo "<div class=\"body\"><h1>Homepage for educom PHP Basic!</h1><p><p>    This will be the project that will guide me to a software job!</p></div>";
}

function getContentAbout()
{
    echo "<div class=\"body\"><h1>About Tjidde!</h1>
<p>
    I'm Tjidde 31 years old. I live in Tilburg and just started at EDUCOM.
</p>
<p >Things I want to learn
    <ul class=\"listNoBullet\">
        <li>More strict coding. </li>
        <li> Better testing. </li>
        <li> Everything else! </li>
    </ul>

</p>
</div>";
}

function getContentContact()
{
    echo "<div class=\"body\"><h1>Contact me!</h1>
<p>
     <form action=\"index.php\" method=\"post\">
    <label for=\"nameField\">Name:</label><input required=required type=\"text\" id=\"nameField\" name=\"nameField\" placeholder=\"Name\">
    <label for=\"emailField\">Email:</label><input  required=required type=\"text\" id=\"emailField\" name=\"emailField\" placeholder=\"email\">
    <label for=\"messageField\">Message:</label> <input required=required type=\"text\" id=\"messageField\" name=\"messageField\" placeholder=\"Message\">
        <input type=\"submit\" value=\"Click!\">
    </form>
</p>
</div>";
}

function getContentContacted()
{

    if (empty($_POST["nameField"] || empty($_POST["emailField"]) || empty($_POST["messageField"]))) echo '<h1> Woepsie something went wrong. Please try again!';
    else {
        echo "Welcome&nbsp;&nbsp;" . $_POST["nameField"] . "<br />";
        echo "Email&nbsp;&nbsp;" . $_POST["emailField"] . "<br />";
        echo "Message&nbsp;&nbsp;" . $_POST["messageField"] . "<br />";
    }
    $serialdata = serialize($_POST);
    $fp = fopen('test.txt',"a");
    fwrite($fp,$serialdata);
    fclose($fp);


}

function getContentLoginPage()
{
    echo '<p>
    <form action="login.php" method="post">
    <input id="email" name="email" type="email" placeholder="email">
    <input id="password" name="password" type="password" placeholder="password">
    <input type="submit">
    </form>';

}

function getContentRegister()
{

    echo '<h1> Make an account on this awesome site!</h1>
<form action="register.php" method="post">
    <input type="text" required="required" name="name">
    <input type="email" required="required" name="email">
    <input type="password" required="required" name="password">
    <input type="submit">

</form>';

}

function login()
{

    if(empty($_POST["email"])||empty($_POST["password"])){
        echo 'Fill in both email and password';
        return;
    }
    if($_SESSION['loggedinuser']!=0){
        echo 'you are already logged in!';
        return;
    }
    $filename = 'users.txt';
    $fp = fopen($filename,'r');
    $input = '['.fread($fp,filesize($filename)).']';
    $users[] = json_decode($input,true);
    foreach ($users[0] as $val){

        $temppassword= $val['password'];
        $tempusername= $val['email'];

        if($_POST["email"]==$tempusername&& $_POST["password"]==$temppassword){
            $_SESSION['loggedinuser'] = $val;
            return;
        }

    }
        echo 'either your email/password combination is wrong or not registered. Register here <a href="index.php/register"> click</a>';

}

function register()
{

    if(empty($_POST["name"] || empty($_POST["email"]) || empty($_POST["password"]))) {
        echo '<h1> Woepsie something went wrong. Please try again!';
        return;
    }

    $filename = 'users.txt';
    $fp = fopen($filename,"a");
    fwrite($fp,','.json_encode($_POST));
    fclose($fp);


    $fp = fopen($filename,'r');
    $input = '['.fread($fp,filesize($filename)).']';
    echo $input;
    $users[] = json_decode($input,false);
    echo sizeof($users[0]);




}