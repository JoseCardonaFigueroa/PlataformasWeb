<?php

class Custom_Db_Table_Abstract extends Zend_Db_Table_Abstract
{
	protected $_schema = '';
	
	protected $_primary = '';
	
	protected $_adapter = 'mysql';
	
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->setSchema();
	}
	
	protected function _setupDatabaseAdapter()
	{
		$this->_db = Zend_Registry::get($this->_adapter);
	}
	
	protected function setSchema(){
		$config = $this->_db->getConfig();
		$this->_schema = $config['dbname'];
	}
}

?>