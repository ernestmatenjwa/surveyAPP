<?php
    $server = "localhost";
    $username = "root";
    $password = '';
    
    $conn = new mysqli($server, $username,  $password, 'alex');
    
    if (mysqli_connect_errno()) {
    
        echo "<p>Error: Could not connect to database.<br/>
        Please try again later.</p>";
        exit;
    }
?>