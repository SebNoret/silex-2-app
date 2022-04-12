<?php
/*
 * routes file used to declare silex application routes
 */


//homepage
$app->get('/', function() use ($app){
   $authorDAO=$app['author.DAO'];
   $app['book.DAO']->setAuthorDAO($authorDAO);
   $books=$app['book.DAO']->findAllBooks(); 
   
           
   return $app['twig']->render('home.html.twig',array("books"=>$books));
   
})->bind('home');


//details of a book
$app->get('/details/{id}',function($id) use ($app){
   
    $authorDAO=$app['author.DAO'];  
    $app['book.DAO']->setAuthorDAO($authorDAO); 
    
      
    
    $book=$app['book.DAO']->showOneBook($id);
    $total=$app['book.DAO']->countBooks();
    
    $prev=$book->getId();
    $prev--;
    $next=$book->getId();
    $next++;
   
    if($prev<1){
        $prev=$book->getId();
        
    }
    if($next>$total){
       $next=$book->getId(); 
    }
    
    
    
    return $app['twig']->render('details.html.twig',array("book"=>$book,'previous'=>$prev,'next'=>$next));
    
    
    
    
})->bind('details');



