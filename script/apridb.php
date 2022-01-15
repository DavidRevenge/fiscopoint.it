<?php    

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");

    //$needCreateTables = true;
    require_once('functions/constants.php');
?>
