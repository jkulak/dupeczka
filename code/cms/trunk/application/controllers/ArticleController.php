<?php

class ArticleController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      
//      require_once(APPLICATION_PATH . '/models/Article.php');
      $articles = new Model_ArticleMapper();
      $this->view->articleList = $articles->fetchAll();
    }

    public function addAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
        echo 'jestem edit action';
    }

    public function deleteAction()
    {
        // action body
    }

    public function newAction()
    {
        // action body
    }
    
    public function showAction()
    {

    }


}











