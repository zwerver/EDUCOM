<?php
/**
 * This PHP file will handle all data connections for content. At the moment this is done hardcoded.. This will be replaced with a database later on.
 * I have done this, so I can later just change the implementation of the functions without a need to change the functions using it.
 */




function getHead()
{
    echo "<!DOCTYPE html><html lang=\"en\">";
    echo "<head></head><link rel=\"stylesheet\" href=\"css/basis.css\">";
    echo "  <meta charset=\"UTF-8\">";
    echo " <title>Website_Tjidde</title></head><body>";
    echo "<header class=\"header\"><a href=\"index.php?page=home\">Home</a> <a href=\"index.php?page=about\">About</a> <a href=\"index.php?page=contact\">Contact</a>";
    if (isset($_SESSION['loggedinuser']) && !empty($_SESSION['loggedinuser'] )) {
        echo "<strong>".$_SESSION['loggedinuser']['NAME']. "</strong> <a href='index.php?page=logout'> logout</a> </header>";
    } else {
        echo "<a href=\"index.php?page=register\">Register</a><a href=\"index.php?page=login\">Login</a></header> ";
    }
    echo '<div class="body">';
}
function getFooter()
{
    echo "</div> <footer class=\"footer\">&copy; Tjidde.nl" . getYear() . "<a href=\"https://github.com/tjidde-nl/EDUCOM\">GITHUB</a> </footer></body></html>";
}

function getContentHome()
{
    echo "<div class=\"body\"><h1>Homepage for educom PHP Basic!</h1><p><p>    This will be the project that will guide me to a software job!</p></div>";
}
function getContentRegistered()
{
    echo "<div class=\"body\"><h1>You have registered</h1><p><p>    You can now login, useing your email and password.</p></div>";
}

function getContentAbout()
{
    echo "<h1>About Tjidde!</h1>
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
";
}

function getContentContact()
{
    echo "<h1>Contact me!</h1>
<p>
     <form action=\"index.php\" method=\"post\">
    <label for=\"nameField\">Name:</label><input required=required type=\"text\" id=\"nameField\" name=\"nameField\" placeholder=\"Name\">
    <label for=\"emailField\">Email:</label><input  required=required type=\"text\" id=\"emailField\" name=\"emailField\" placeholder=\"email\">
    <label for=\"messageField\">Message:</label> <input required=required type=\"text\" id=\"messageField\" name=\"messageField\" placeholder=\"Message\">
        <input type=\"submit\" value=\"Click!\">
    </form>
</p>";
}

function getContentContacted()
{

    if (empty($_POST["nameField"] || empty($_POST["emailField"]) || empty($_POST["messageField"])))getContent("contactFail");
    else {
        echo "Welcome&nbsp;&nbsp;" . $_POST["nameField"] . "<br />";
        echo "Email&nbsp;&nbsp;" . $_POST["emailField"] . "<br />";
        echo "Message&nbsp;&nbsp;" . $_POST["messageField"] . "<br />";
    }

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