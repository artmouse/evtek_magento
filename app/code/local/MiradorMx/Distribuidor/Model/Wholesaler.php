<?php

/**
 * Class MiradorMx_Distribuidor_Model_Wholesaler
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Model_Wholesaler extends Mage_Core_Model_Abstract {

	function __construct() {
		$this->_init('distribuidor/wholesaler');
	}

	/**
	 * Crea una empresa
	 */
	public function creaWholesaler($empresa, $correo, $wholesalerName, $wholesalerLastname, $activo) {

		try {

			$this->setEmpresaId($empresa)
				->setWholesalerLastname($wholesalerLastname)
				->setWholesalerFirstname($wholesalerName)
				->setWholesalerCorreo($correo)
				->setActivo($activo)
				->save();
			Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('distribuidor')->__(
					'Se ha creado la cuanta del distribuidor %s', $wholesalerName));
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			Mage::log($e, null, "wholesaler.log");

		}
	}
}