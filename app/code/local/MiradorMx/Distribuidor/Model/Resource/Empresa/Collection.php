<?php

/**
 * Class MiradorMx_Distribuidor_Model_Resource_Empresa_Collection
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 * Collection de empresa
 */
class MiradorMx_Distribuidor_Model_Resource_Empresa_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

	/**
	 * Init collection de solicitud
	 */
	public function _construct() {
		$this->_init('distribuidor/empresa');
	}

}