<?php

/**
 * Class MiradorMx_Distribuidor_Model_Empresa
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Model_Empresa extends Mage_Core_Model_Abstract {

	function __construct() {
		$this->_init('distribuidor/empresa');
	}
	/**
	 * Crea una empresa a partir de una solicitud cuando esta última ha sido aceptada
	 * @param $solicitud id, $name, $phone, $correo, $wholesalerName, $wholesalerLastname
	 * parámetros vienen de solicitud
	 */
	public function creaEmpresa($solicitud, $name, $phone, $correo, $wholesalerName, $wholesalerLastname, $rfc) {

		try {

			$this->setSolicitudId($solicitud)
				->setName($name)
				->setAdminLastname($wholesalerLastname)
				->setAdminName($wholesalerName)
				->setRfc($rfc)
				->setPhone($phone)
				->setAdminCorreo($correo)
				->save();
			Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('distribuidor')->__(
					'Se ha creado la empresa %s', $name));
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			Mage::log($e, null, "empresa.log");

		}
	}

}