<?php
namespace Oc_mybooks\Domain;

use Oc_mybooks\Domain\Author;

class Book {
    
    /**
     * book identifiant
     * 
     * @var integer
     */
    
    private $id;
   
    /**
    * title of the book
     * @var string
    */
    
    private $title;
    
    /**
     * book isbn reference
     * @var string
     */
    
    private $isbn;
    
   /**
    * book summary
    * @var string
    */
    
    private $summary;
    
    /**
     * book's author id
     * @var integer
     */
    
    private $authorId;
    
    private $author;
    
   
      
        
   public function setId($id){
       $this->id=$id;
   }

   public function setTitle($title){
       $this->title=$title;
   }

   public function setIsbl($isbn){
        $this->isbn=$isbn;
   }
   
   public function setSummary($summary){
       $this->summary=$summary;
   }
   public function setAuthorId($author){
       $this->authorId=$author;
   }
   
   public function getId(){
       return $this->id;
   }
   public function getTitle(){
       return $this->title;
   }
   public function getIsbn(){
       return $this->isbn;
   }
   public function getSummary(){
       return $this->summary;
   }
   
   public function getAuthorId(){
       return $this->authorId;
   }
   
   function getAuthor() {
       return $this->author;
   }

   function setAuthor(Author $author) {
       $this->author = $author;
   }


}
