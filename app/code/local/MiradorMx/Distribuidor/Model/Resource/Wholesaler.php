<?php

/**
 * Class MiradorMx_Distribuidor_Model_Resource_Wholesaler
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Model_Resource_Wholesaler extends Mage_Core_Model_Resource_Db_Abstract {

	/**
	 * Iniciamos resource de empresa.
	 */
	public function _construct() {

		$this->_init('distribuidor/wholesaler', 'wholesaler_id');
	}
}