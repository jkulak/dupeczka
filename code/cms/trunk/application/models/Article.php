<?php

class Model_Article
{

  protected $_id;
  protected $_title;
  protected $_lead;
  protected $_body;
  protected $_author;
  
  
  function __construct() {
    
  }
  
  public function __set($name, $value)
  {
    $method = 'set' . $name;
    if (('mapper' == $name) || !method_exists($this, $method)) {
        throw new Exception('Invalid article property');
    }
    $this->$method($value);
  }
  
  public function __get($name)
  {
    $method = 'get' . $name;
    if (('mapper' == $name) || !method_exists($this, $method)) {
       throw new Exception('Invalid article property');
    }
    return $this->$method();
  }
  
  public function setTitle($title)
  {
    $this->_title = (string) $title;
    return $this;
  }

  public function getTitle()
  {
    return $this->_title;
  }

  public function setId($id)
  {
    $this->_id = (int) $id;
    return $this;
  }

  public function getId()
  {
    return $this->_id;
  }
  
  public function setLead($lead)
  {
    $this->_lead = (string) $lead;
    return $this;
  }

  public function getLead()
  {
    return $this->_lead;
  }
  
  public function setBody($body)
  {
    $this->_body = (string) $body;
    return $this;
  }

  public function getBody()
  {
    return $this->_body;
  }
  
  public function setAuthor($author)
  {
    $this->_author = (string) $author;
    return $this;
  }

  public function getAuthor()
  {
    return $this->_author;
  }
}