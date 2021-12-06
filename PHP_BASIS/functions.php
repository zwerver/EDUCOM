<?php
/**
 * @echo current year.
 */
function getYear(){

    return date("Y");
}
function getHead(){
    echo "<!DOCTYPE html><html lang=\"en\">";
    echo "<head></head><link rel=\"stylesheet\" href=\"css/basis.css\">";
    echo "  <meta charset=\"UTF-8\">";
    echo " <title>Website_Tjidde</title></head><body>";
    echo "<header class=\"header\"><a href=\"home.php\">Home</a> <a href=\"about.php\">About</a> <a href=\"contact.php\">Contact</a> </header>";
    }


function getContent($PageName){
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
}
    getFooter();
}
function getFooter(){
    echo "<footer class=\"footer\">&copy; Tjidde.nl".getYear()."<a href=\"https://github.com/tjidde-nl/EDUCOM\">GITHUB</a> </footer></body></html>";
}
function getContentHome(){
    echo "<div class=\"body\"><h1>Homepage for educom PHP Basic!</h1><p><p>    This will be the project that will guide me to a software job!</p></div>";
}
function getContentAbout(){
    echo"<div class=\"body\"><h1>About Tjidde!</h1>
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

function getContentContact(){
    echo "<div class=\"body\"><h1>Contact me!</h1>
<p>
     <form action=\"contactResponse.php\" method=\"post\">
    <label for=\"nameField\">Name:</label><input required=required type=\"text\" id=\"nameField\"name=\"nameField\" placeholder=\"Name\">
    <label for=\"emailField\">Email:</label><input  required=required type=\"text\" id=\"emailField\" name=\"emailField\" placeholder=\"email\">
    <label for=\"messageField\">Message:</label> <input required=required type=\"text\" id=\"messageField\"name=\"messageField\" placeholder=\"Message\">
        <input type=\"submit\" value=\"Click!\">
    </form>
</p>
</div>";
}
function getContentContacted($postdata){
echo "Welcome&nbsp;&nbsp;" . $postdata["nameField"]."<br />";
echo "Email&nbsp;&nbsp;" . $postdata["emailField"]."<br />";
echo "Message&nbsp;&nbsp;" . $postdata["messageField"]."<br />";

}