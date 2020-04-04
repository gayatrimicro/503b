<?php
    // $dbhost = 'localhost';
    // $dbuser = 'root';
    // $dbpass = '';
    // $dbdatabase = '503b';
    // $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $dbdatabase);
    // if(! $conn )
    // {
    //  die('Could not connect to instance: ' . mysqli_error($conn));
    // }
    // SPacegm

    // $dbhost = '64.207.177.102';
    $dbhost = 'localhost';
    $dbuser = 'user_503b';
    $dbpass = '$Xd70w4g';
    $dbdatabase = 'db_503b';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $dbdatabase);
    if(! $conn )
    {
     die('Could not connect to instance: ' . mysqli_error($conn));
    }
?>