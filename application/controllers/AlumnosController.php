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

    public function addAction(){

    }
    public function setAction() {
      //Variables dónde se guardan los datos enviados desde el formulario
      $nombre = $this->getRequest()->getParam("nombre", null);
      $ap_pat = $this->getRequest()->getParam("ap_pat", null);
      $ap_mat = $this->getRequest()->getParam("ap_mat", null);
      $grado = $this->getRequest()->getParam("grado", null);
      $fecha_nacimiento_dia = $this->getRequest()->getParam("fecha_nacimiento_dia", null);
      $fecha_nacimiento_mes = $this->getRequest()->getParam("fecha_nacimiento_mes", null);
      $fecha_nacimiento_año = $this->getRequest()->getParam("fecha_nacimiento_año", null);

      //Variable para estructurar la fecha de nacimiento del alumno y guardarla en la BD
      $fecha_nacimiento = date("Y-m-d", strtotime($fecha_nacimiento_año."-".$fecha_nacimiento_mes."-".$fecha_nacimiento_dia));

      //Array que contiene los datos que van a ser guardados en la BD
      $data = array(
        'nombre' => $nombre,
        'ap_pat' => $ap_pat,
        'ap_mat' => $ap_mat,
        'grado' => $grado,
        'fecha_nacimiento'=> $fecha_nacimiento
      );

      //Método para insertar la información en la BD
      $this->_model->insert($data);
      $out ="Insert Exitoso";

      //Variable que se envía a la vista
      $this->view->out = $out;
    }

    public function deleteAction(){
      $id=3;
      $this->_model->deleteByID($id);
      $out="Delete Exitoso";
      $this->view->out=$out;
    }
}
