<?php

class AlumnosController extends Zend_Controller_Action {

    private $_model = null;

    public function init() {
        $this->_model = new DbTable_Alumnos();
    }

    public function indexAction() {
        $out = $this->_model->getAll();
        $this->view->out = $out;
    }

    public function getAction() {
        $id=1;
        $out= $this->_model->getByID($id);
        $this->view->outs=$out;
    }

    public function updateAction(){
        $id=1;
        $this->_model->updateByID($id);
        $out="Update Exitoso";
        $this->view->out=$out;
    }
    
    public function deleteAction(){
        $id=3;
        $this->_model->deleteByID($id);
        $out="Delete Exitoso";
        $this->view->out=$out;
    }
}
