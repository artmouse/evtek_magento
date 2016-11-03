<?php

/**
 * Class MiradorMx_Login_Helper_Data
 * @category MiradorMX
 * @package  MiradorMx_Login
 * @author   Mariana Valdivia
 */
class MiradorMx_Login_Helper_Data extends Mage_Customer_Helper_Data {

	/**
	 * Regresa url para el registro de distribuidores.
	 * @return string
	 */
	public function getDistribuidorRegisterUrl() {
		return $this->_getUrl('/customer/account/create');
	}
	/**
	 * Regresa url para el registro de usuarios normales.
	 * @return string
	 */
	public function getRegisterUrl() {
		return $this->_getUrl('customer/account/create');

	}
	/**
	 * Regresa post action para registro de usuarios normales.
	 * @return string
	 */
	public function getRegisterPostUrl() {
		return $this->_getUrl('customer/account/createpost');
	}
	/**
	 * Regresa post action para registro de distribuidores.
	 * @return string
	 */
	public function getDistribuidorRegisterPostUrl() {
		return $this->_getUrl('customer/account/distribuidorpost');

	}

}