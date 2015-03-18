<?php

/**
 *
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    
    /**
     * Session Hardening
     */
    protected function _initSession()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/session.ini', APPLICATION_ENV);
        Zend_Session::setOptions($config->toArray());
        Zend_Session::start();
    }
	
	protected function _initDB(){
		putenv('TNS_ADMIN=' . APPLICATION_PATH . '/configs/');
		$this->bootstrap('multidb');
		$resource = $this->getPluginResource('multidb')->init();
		
		/* MySQL DB */
		$mysql = $resource->getDb('mysql');
		Zend_Registry::set('mysql', $mysql);
	}
}