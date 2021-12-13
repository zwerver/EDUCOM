<?php
/**
 * This PHP file will handle all data connections. At the moment it uses a local TXT file. This will be replaced with a database later on.
 * I have done this, so I can later just change the implementation of the functions without a need to change the functions using it.
 */

include_once("Database.php");
include_once("DataConnectionContent.php");


/**
 * This function will get all data from users.txt which is a JSON. This is done in sake of standardisation.
 * @return array of all users
 */
function getUsers()
{
    $conn = connectDB();
    $sql = 'select UUID, EMAIL, NAME from users;';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            print_r($row);
            echo "id: " . $row["UUID"] . " - Name: " . $row["NAME"] . " - Email:" . $row["EMAIL"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

/**
 * This will add a user to that users.txt
 * @return void
 */
function addUser()
{
    $conn = connectDB();
//GW: NOOIT ongefilterde POST-data gebruiken!!!!!    
    $result = $conn->query('select EMAIL from users WHERE EMAIL="' . $_POST["email"] . '"');

    if ($result->num_rows != 0) {

        getContent("registerFailEmailDub");
        return;
    }
    $sql = 'INSERT INTO users(UUID,EMAIL,PASSWORD,NAME) values ' . '("' . v4() . '","' . $_POST["email"] . '","' . $_POST["password"] . '","' . $_POST["name"] . '")';
    if ($conn->query($sql) === TRUE) {

        getContent("registered");
    } else {

        getContent('registerFailEmailDub');
    }
}

function login()
{
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo 'Fill in both email and password';
        return;
    }
    if (isset($_SESSION['loggedinuser']) && !empty($_SESSION['loggedinuser'])) {
        getContent("loginFailedAlreadyLogin");
        return;
    }

    $conn = connectDB();
    $result = $conn->query('select UUID, EMAIL, NAME from users WHERE EMAIL="' . $_POST["email"] . '" AND PASSWORD="' . $_POST["password"] . '" LIMIT 1');

    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["loggedinuser"] = $row;
            getContent("home");
        }
    } else {
        getContent("loginFailWrongInfo");
    }
}
