<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "bold_members";
    
    // $servername = "localhost";
    // $username = "boldorg_vote";
    // $password = "TaNVIR@@114";
    // $db = "boldorg_bold_members";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }  

?>