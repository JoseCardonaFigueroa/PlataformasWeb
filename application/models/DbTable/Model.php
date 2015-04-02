<?php
class DbTable_Model extends Custom_Db_Table_Abstract
{

	protected $_name = 'materias';
	protected $_primary = 'id';
	
	public function getAll(){
		$select =  $this->_db
					->select()
					->from($this->_name, array(
								'nombre'
							)
					)
					->order('nombre desc')
					->query()
					->fetchAll();
					
		return array('data'=>$select);
	}
	
	public function insertarMateria($name){
		$data = array(
				'nombre' => $name
				);
		
		$this->_db->insert($this->_name, $data);
	}
	
	public function actualizarMateria($value){
		$data = array(
			'nombre' => $value['nombre']
		);
		
		$where['id = ?'] = $value['id'];
		$this->_db->update($this->_name, $data, $where);
	}

}
