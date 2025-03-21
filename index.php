<?php

require_once "Controller/UserController.php";


if(parse_url($_SERVER["REQUEST_URI"])["path"] == "/login"){
    UserController::login();
}

if(parse_url($_SERVER["REQUEST_URI"])["path"] == "/register"){
    UserController::register();
}