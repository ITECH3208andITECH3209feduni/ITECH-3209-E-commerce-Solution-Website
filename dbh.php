<?php

function Open_Connection()
{
    $server = "fdb29.awardspace.net";
    $username = "3569769_ecom";
    $password = "12345678abc";
    $dbname = "3569769_ecom";

    $conn = mysqli_connect($server, $username, $password, $dbname);
    return $conn;
}