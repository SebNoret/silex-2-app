<?php

namespace Oc_mybooks\DAO;


use Oc_mybooks\Domain\Author;


class AuthorDAO extends AbstractDao{
   
    /**
     * create a book entity for a given id
     * 
     * @param integer $id
     * @return \Domain\Author
     */
    public function findAndCreate($id){
        
        $sql="select * from author where auth_id=?";
        $result=$this->db->fetchAssoc($sql,array($id));
        
        return $this->createDomainEntity($result);
    }
    
    /**
     * create a book entity
     * @param Array $row
     * @return \domain\Author
     */   
    protected function createDomainEntity($row) {
        
        $author= new Author();
        $author->setAuthId($row['auth_id']);
        $author->setAuthFirstName($row['auth_first_name']);
        $author->setAuthLastName($row['auth_last_name']);
        return $author;
    }

    

}
