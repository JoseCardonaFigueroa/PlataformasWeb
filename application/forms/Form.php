<?php
class Forms_Form extends Zend_Form {

	public function __construct() {
        parent::__construct();

        $this->setName( 'form' );

	}
}