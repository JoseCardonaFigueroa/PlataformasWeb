<?php

class ErrorController extends Zend_Controller_Action {

	private $_model = null;
	
    public function init() {
		//$this->_model = new DbTable_Model();
    }

    public function errorAction() {
		$error = $this->_getParam('error_handler');
		
		if(!$error || !$error instanceof ArrayObject){
			$this->vie->message = 'You have reached the error page';
			return;
		}
		
		switch (!$error->type){
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
				$this->getResponse()->setHttpResponseCode(404);
				$priority = Zend_Log::NOTICE;
				$this->view->message = 'Page not found';
				break;
			default:
				$this->getResponse()->setHttpResponseCode(500);
				$priority = Zend_Log::CRIT;
				$this->view->message = 'Application error';
				break;
		}
		
		if($log = $this->getLog()){
			$log->log($this->view->message, $priority, $error->exception);
			$log->log('Request Paramaters', $priority, $error->request->getParams());
		}
		
		if($this->getInvokeArg('displayExceptions') == true){
			$this->view->exception = $error->exception;
		}
		
		$this->view->request = $error->request;
    }
	
	public function getLog()
	{
		$bootstrap = $this->getInvokeArg('bootstrap');
		if(!$bootstrap->hasResource('Log')){
			return false;
		}
		$log = $bootstrap->getResource('Log');
		return $log;
	}

}