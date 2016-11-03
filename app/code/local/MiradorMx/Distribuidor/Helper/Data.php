<?php

/**
 * Class MiradorMx_Distribuidor_Helper_Data
 * @category MiradorMX
 * @package  Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Helper_Data extends Mage_Customer_Helper_Data {

	/**
	 *
	 */
	public function getLoginUrl() {
		return $this->_getUrl('customer/account/login');
	}
}