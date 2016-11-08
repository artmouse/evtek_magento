<?php

/**
 * Class MiradorMx_Distribuidor_Model_Resource_Direccion_Collection
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 * Collection de empresa
 */
class MiradorMx_Distribuidor_Model_Resource_Direccion_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {
	/**
	 * Init collection de solicitud
	 */
	public function _construct() {
		$this->_init('distribuidor/direccion');
	}
	/**
	 * @return int bandera para checar si existe una empresa ya.
	 */

}