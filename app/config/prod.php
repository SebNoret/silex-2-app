<?php

/* 
 * prod configuration
 */


//doctrine DBAL configuration
$app['db.options']=array(
     'host'=>'localhost',
            'dbname'=>'mybooks',
            'user'=>'mybooks_user',
            'password'=>'secret',
            'charset'=>'utf8'        
);    


