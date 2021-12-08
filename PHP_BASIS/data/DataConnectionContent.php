<?php
/**
 * This PHP file will handle all data connections for content. At the moment this is done hardcoded.. This will be replaced with a database later on.
 * I have done this, so I can later just change the implementation of the functions without a need to change the functions using it.
 */




function getHead()
{
    echo "<!DOCTYPE html><html lang=\"en\">";
    echo ">";
    echo "  <meta charset=\"UTF-8\">";
    echo " <title>Website_Tjidde</title></head><body>";
    echo ">Contact</a>";

    if (isset($_SESSION['loggedinuser']) && !empty($_SESSION['loggedinuser'] )) {
        echo "<strong>".$_SESSION['loggedinuser']['name']. "</strong> <a href='../index.php?page=logout'> logout</a> </header>";
    } else {
        echo ">Login</a></header> ";
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
    echo ">
    </form>
</p>
";
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