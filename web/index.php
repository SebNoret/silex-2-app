<?php

//include composer's autoloader
require_once __DIR__.'/../vendor/autoload.php';

$app= new Silex\Application;

//config
require_once __DIR__.'/../app/config/dev.php';

//include registered services and provders
require __DIR__."/../app/app.php";

//include application's routes
require __DIR__.'/../app/routes.php';



$app->run();


