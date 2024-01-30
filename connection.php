<?php 
    $host = "localhost";
    $port = "5432";
    $dbname = "Company";
    $user = "postgres";
    $password = "9191"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string);     

    if (!$dbconn){
        $error = error_get_last();
        echo "Connection failed. Error was: ". $error['message']. "\n";
    }

    else {
        echo "Connection succesful.\n";
    }
    ?>
