<?php

class DbTable_Alumnos extends Custom_Db_Table_Abstract {

    protected $_name = 'alumnos';
    protected $_primary = 'id_alumno';

    public function getAll() {
        $select = $this->_db
                ->select()
                ->from($this->_name)
                ->query()
                ->fetchAll();
        return array('data' => $select);
    }

    public function getByID($id) {
        $select = $this->_db
                ->select()
                ->from($this->_name)
                ->where('id_alumno =?', $id)
                ->query()
                ->fetchAll();
        return array('data' => $select);
    }

    public function updateByID($id) {
        $data = array(
            'nombre' => 'Gustavo');

        $where['id_alumno = ?'] = $id;
        $this->_db->update($this->_name, $data, $where);
    }
    
    public function deleteByID($id){
        $where['id_alumno = ?'] = $id;
        $this->_db->delete($this->_name,$where);
        
    }
}
