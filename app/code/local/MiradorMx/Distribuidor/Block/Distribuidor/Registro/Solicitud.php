<?php

/**
 *
 */
class MiradorMx_Distribuidor_Block_Distribuidor_Registro_Solicitud extends Mage_Core_Block_Template {
	/**
	 *
	 */
	public function __construct() {
		parent::__construct();
		Mage::app()->getFrontController()->getAction()->getLayout()->getBlock('root')->setHeaderTitle(Mage::helper('distribuidor')->__('Registro para distribuidor'));
	}
}