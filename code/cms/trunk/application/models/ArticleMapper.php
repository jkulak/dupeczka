<?php


// zakladajac, ze strona i cms to oddzielne mechanizmy
// to tez musi byc wyniesione na zewnatrz jako Dupa_Model_ArticleMaper (Dupa_Model_Article_Api)
class Model_ArticleMapper
{
  
  function __construct() {
    
  }
  
  public function fetchAll()
  {
    $db = new Model_DbTable_Article();
    $resultSet = $db->fetchAll();
    $entries = array();
    foreach ( $resultSet as $row )
    {
      $entries[] = new Model_Article($row);
    }
    return $entries; 
  }
  
  public function find($id = null)
  {
    $db = new Model_DbTable_Article();
    $row = $db->find($id);
    return new Model_Article($row);
  }
}

