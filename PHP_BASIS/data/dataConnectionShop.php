<?php
include_once("Database.php");
function getItems()
{
    $items=[];
    $conn = connectDB();
    $result = $conn->query('select * from shopitems');
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    } else {
        echo "0 results";
    }
   $conn->close();
    return $items;
}
