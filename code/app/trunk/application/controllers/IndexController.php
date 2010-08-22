<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        fb('$ram');
        fb::log('jestem tutaj!');
        fb::warn('jestem tutaj!');
        //fb::error('jestem tutaj!');
    }


}

