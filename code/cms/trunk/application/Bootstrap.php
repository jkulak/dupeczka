<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   
  protected function _initAutoload()
  {
     $moduleLoader = new Zend_Application_Module_Autoloader(array(
       'namespace' => '',
       'basePath' => APPLICATION_PATH)
       );
    return $moduleLoader;
  }

  
  protected function initializeDebug()
  {
    if ($view->appDebug['firePhpEnable'])
           {
             fb::setEnabled(true);
           }
             else
           {
             fb::setEnabled(false);
           }
  }
  
  protected function _initApplication()
  {
    // Pobieranie danych z pliku konfiguracyjnego (zaladowanego przez Bootstrap) i dodanie ich do rejestru
    // $this->config = $this->getOptions();
    // Zend_Registry::set('config', $this->config);

    // Odczytanie opcji z sekcj app
    $appOptions = $this->getOption('app');

    // $view->appIncludes = $appOptions['includes'];
    // $view->appDebug = $appOptions['debug'];


    // debugging
    $writer = new Zend_Log_Writer_Firebug();
    $this->logger = new Zend_Log($writer);

    // // routing
    //    $frontController = Zend_Controller_Front::getInstance();
    //    $router = $frontController->getRouter();
    //    
    //    $routes = new Zend_Config_Xml(APPLICATION_PATH . '/configs/routes.xml', APPLICATION_ENV);
    //    $router->addConfig($routes, 'routes');
    
    // $front = Zend_Controller_Front::getInstance(); 
    // $restRoute = new Zend_Rest_Route($front);
    // $front->getRouter()->addRoute('default', $restRoute);
  }
       
  protected function _initView()
  {
    $this->bootstrap('layout');
    $layout = $this->getResource('layout');
    $view = $layout->getView();

    $view->doctype('XHTML1_STRICT');
    $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
    $view->headTitle()->setSeparator(' - ');
    $view->headTitle('Kopytko masakra');
  }

}

