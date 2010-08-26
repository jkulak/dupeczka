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
    $frontController = Zend_Controller_Front::getInstance();
    $router = $frontController->getRouter();
    
    // Zend_Controller_Router_Route::setDefaultTranslator($translator);
    
    $routes = new Zend_Config_Xml(APPLICATION_PATH . '/configs/routes.xml', APPLICATION_ENV);
    
    $router->removeDefaultRoutes();
    
    $router->addConfig($routes, 'routes');
    
    $frontController->setBaseUrl('/');
  }
       
  protected function _initView()
  {
    $this->bootstrap('layout');
    $layout = $this->getResource('layout');
    $view = $layout->getView();

    // $view->doctype('XHTML1_STRICT');
    $view->doctype('HTML5');
    $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
    $view->headTitle()->setSeparator(' - ');
    $view->headTitle('Kopytko masakra');
    
    $translator = new Zend_Translate('array', '../lang/en.php', 'en');
    $translator->addTranslation('../lang/pl.php', 'pl');
    
    $translator->setLocale('pl');
    
    $navigation = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
    $container = new Zend_Navigation($navigation);

    // print_r($container);
    
    $view->navigation()->setTranslator($translator);    
    $view->navigation($container);
    
    Zend_Registry::set('Zend_Navigation',$navigation);

  }

}

