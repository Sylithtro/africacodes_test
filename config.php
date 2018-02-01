<?php

date_default_timezone_set('Africa/Lagos');
error_reporting(1);

function __autoload($classname) {
    require_once("./classes/".$classname.".php");
}

session_start();
