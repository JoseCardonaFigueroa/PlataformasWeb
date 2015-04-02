<?php
class MateriasController extends Zend_Controller_Action {

	private $_model = null;
	
    public function init() {
		//$this->_model = new DbTable_Model();
    }

    public function indexAction() {
		//$result = array();
		
		//$result = $this->_model->getAll();
		
		//die(print_r($result));
		$msg='hola';
		$out= array('msg' =>$msg);
		$this->view->$out;
    }
	
	public function insertAction(){
		$this->_helper->viewRenderer->setNoRender(true);
		$name = 'test 3';
		$this->_model->insertarMateria($name);
	}
	
	public function updateAction(){
		$this->_helper->viewRenderer->setNoRender(true);
		$value = array(
			'id'=>4,
			'nombre'=>'test 4'
		);
		$this->_model->actualizarMateria($value);
		
	}

}