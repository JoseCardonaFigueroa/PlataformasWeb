<?php
class IndexController extends Zend_Controller_Action {

    public function init() {
		$this->_model = new DbTable_Model();
    }

    public function indexAction() {
		
    }

}