<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractDAO
 *
 * @author sébastien
 */

namespace Oc_mybooks\DAO;

use Doctrine\DBAL\Connection;

abstract class AbstractDAO {
    
    /**
     *Database connection
     * 
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;
    
    /**
     * Constructor
     * 
     * @param \Doctrine\DBAL\Connection database connection object
     */
    public function __construct(Connection $db) {
        $this->db=$db;
    }
    
    /**
     * 
     * Grants access to the database connection object
     * 
     * @return \Doctrine\DBAL\Connection database connection object
     */
    protected function getDb(){
        return $this->db;
    }
    /**
     * 
     * built a domain ojbject from DB row
     * 
     * must be overridden by child classes
     */
    protected abstract function createDomainEntity($row);
}
