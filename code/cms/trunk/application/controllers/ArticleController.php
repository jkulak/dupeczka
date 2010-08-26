<?php

class ArticleController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $articleApi = new Model_Article_Api();
      $this->view->articleList = $articleApi->fetchAll();
      
      if ( $this->getRequest()->getMethod() == 'POST' ){
        
        $params = $this->getRequest()->getParams();
        
        $articleApi = new Model_Article_Api();
        $articleApi->insert(new Model_Article_Container($params));
        
        
        if ( $article->save() ) {
          $this->view->messageType = "notice";
          $this->view->message = $this->view->translate("Article saved");
        }
        else {
          $this->view->messageType = "error";
          $this->view->message = $this->view->translate("Article save failed");
        }
        // dodacredirect
      }
    }

    public function editAction()
    {
      $articleMapper = new Model_ArticleMapper(); 
      $params = $this->getRequest()->getParams();
      $this->view->article = $articleMapper->find($params['id']);
    }

    public function deleteAction()
    {
        // action body
                // formularz kasowania?
    }

    public function newAction()
    {
      // action body
      // formularz dodawania
     $this->view->article = new Model_Article();
     // print_r($this->view->article);
    }

    public function viewAction()
    {
      // ta czesc jest identyczna jak dla indexAction()
      if ( $this->getRequest()->getMethod() == 'POST' ){
        $params = $this->getRequest()->getParams();        
        $article = new Model_Article($params);
        if ( $article->save() ) {
          $this->view->messageType = "notice";
          $this->view->message = $this->view->translate("Article saved");
        }
        else {
          $this->view->messageType = "error";
          $this->view->message = $this->view->translate("Article save failed");
        }
      }
    }


}