<?php

/**
 *@category MiradorMx
 *@package  MiradorMx_Distribuidor
 *@author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Form_Register extends Mage_Customer_Block_Form_Register {

	/**
	 * Address instance with data
	 *
	 * @var Mage_Customer_Model_Address
	 */
	protected $_address;

	protected function _prepareLayout() {
		$this->getLayout()->getBlock('head')->setTitle(Mage::helper('customer')->__('Create New Customer Account'));
		return parent::_prepareLayout();
	}
}