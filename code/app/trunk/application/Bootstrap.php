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
		$view->appIncludes = $appOptions['includes'];

		$debugSettings = $appOptions['debug'];
    if ($debugSettings['firePhpEnable']) {
      fb::setEnabled(true);
    }
    else {
      fb::setEnabled(false);
    }
		
		$routes = new Zend_Config_Xml(APPLICATION_PATH . '/configs/routes.xml', APPLICATION_ENV);

		$frontController = Zend_Controller_Front::getInstance();
		$router = $frontController->getRouter();
		$router->addConfig($routes, 'routes');
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

