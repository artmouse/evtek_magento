<?php

/**
 * Class MiradorMx_Distribuidor_Model_Resource_Solicitud
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Model_Resource_Solicitud extends Mage_Core_Model_Resource_Db_Abstract {

	/**
	 * Iniciamos resource de solicitud.
	 */
	public function _construct() {

		$this->_init('distribuidor/solicitud', 'solicitud_id');
	}
}