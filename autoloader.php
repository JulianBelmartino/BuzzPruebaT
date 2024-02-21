<?php
function my_autoloader($class)
{
    include './app/models/' . $class . '.php';
}

spl_autoload_register('my_autoloader');
