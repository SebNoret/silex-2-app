<?php
namespace Oc_mybooks\DAO;

use Oc_mybooks\Domain\Book;
use Oc_mybooks\DAO\AuthorDAO;

class BookDAO extends AbstractDAO{
      
    /**
     *
     * @var Oc_mybooks\DAO\ArticleDAO
     */
    private $authorDAO;
    
       
    
    public function setAuthorDAO(AuthorDAO $autorDao){
        $this->authorDAO=$autorDao;
    }
    
    /**
     * 
     * @return Array A list of \DomainBook
     */
    
    public function findAllBooks(array $index=null){
        
        if(isset($index)){
                   
            if(!is_array($index)){           
                throw new \Exception('parameter= '.$index.'must be an array with index=2');                             
            }                
            
            if (count($index) != 2) {                
                throw new \Exception('array index of ' . $index . ' must be  equal to 2');
            }      
        
            $begin=$index['begin'];            
            $end=$index['end'];
        
            
            if(!is_int($begin)||!is_int($end)){                
                throw new \Exception('array '.$index.' must content int values');                            
            }else{    
          
            $sql="select * from book where book_id>='".$begin."' and book_id<='".$end."'order by book_id desc";                        
            }                      
            
        }else{
            $sql="select * from book order by book_id desc";
        }
        
        
        
        
        $results=$this->getDb()->fetchAll($sql);           
        $books= array();
        
        foreach ($results as $row){          
            $bookId= $row['book_id'];                                  
            $books[$bookId]=$this->createDomainEntity($row);                       
        }       
        return $books;                        
    }
    
    
    
    protected function createDomainEntity($row){
        
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setIsbl($row['book_isbn']);
        $book->setTitle($row['book_title']);
        $book->setSummary($row['book_summary']);
        $book->setAuthorId($row['auth_id']);
        $authorDAO=$this->authorDAO;
        $authorDAO->findAndCreate($row['auth_id']);
       
        
        
        return $book;
    }
    /**
     * 
     * @param integer $id 
     * @return Array a list of \domain\book with \Aomain\Author
     */
    public function showOneBook($id){        
        
        $sql= "select * from book where book_id=?";
        $result=$this->db->fetchAssoc($sql, array($id));
        if($result){
        $book= $this->createDomainEntity($result);        
        $authorId=$book->getAuthorId();        
        $author=$this->authorDAO->findAndCreate($authorId);
        $book->setAuthor($author);
        }else{
            throw new \Exception('no book matched for id= '.$id);
           
        }                         
        return $book;                
    }
    public function countBooks(){
        $sql='select count(*) from book';
        $stmt=  $this->db->Query($sql);
        while ($row=$stmt->fetch()){
            $result=$row;
        }
        
        $countBooks=$result['count(*)'];
       
    
        return $countBooks;
    }
    
    
}
                        
    
    
    

