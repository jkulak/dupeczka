<?php

class ArticleController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $articleMapper = new Model_ArticleMapper();
      $this->view->articleList = $articleMapper->fetchAll();
      
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

    public function editAction()
    {
        // action body
                // formuarz edycji
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
    }

    public function viewAction()
    {
        // action body
    }


}













