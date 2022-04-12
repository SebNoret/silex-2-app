<?php
/*
 * App file used to register providers and services in Silex application
 */

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;


// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register()
        ;
// register services providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(),array(    
    'twig.path'=>__DIR__."/../views",    
));
$app->register(new Silex\Provider\AssetServiceProvider(), array()); 


//register services
$app['author.DAO']=function($app){
    return new Oc_mybooks\DAO\AuthorDAO($app['db']);
};

$app['book.DAO']=function($app){    
    return new Oc_mybooks\DAO\BookDAO($app['db']);
};


