<?php
namespace Oc_mybooks\Domain;

class Author {
    
    /**
     * author id
     * @var integer
     */
    
    private $authId;
    
    /**
     * first name of the author
     * @var string
     */
    
    private $authFirstName;
    
    /**
     *last nameif the author
     * @var string
     */
    
    private $authLastName;
    
   
    function getAuthId() {
        return $this->authId;
    }

    function getAuthFirstName() {
        return $this->authFirstName;
    }

    function getAuthLastName() {
        return $this->authLastName;
    }

    function setAuthId($authId) {
        $this->authId = $authId;
    }

    function setAuthFirstName($authFirstName) {
        $this->authFirstName = $authFirstName;
    }

    function setAuthLastName($authLastName) {
        $this->authLastName = $authLastName;
    }
    
}
