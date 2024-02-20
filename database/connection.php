<?php
if (!function_exists('getDBConnection')) {
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'tickets_app');

    function getDBConnection()
    {
        $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if (!$connection) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        return $connection;
    }
}
