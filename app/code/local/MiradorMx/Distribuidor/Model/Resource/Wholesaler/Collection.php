<?php

/**
 * Class MiradorMx_Distribuidor_Model_Resource_Wholesaler_Collection
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 * Collection de wholesaler
 */
class MiradorMx_Distribuidor_Model_Resource_Wholesaler_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
	/**
	 * Init collection de wholesaler
	 */
	public function _construct() {
		$this->_init('distribuidor/wholesaler');
	}
}