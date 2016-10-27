<?php

/**
 *@category MiradorMx
 *@package  MiradorMx_Distribuidor
 *@author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Form_Register extends Mage_Customer_Block_Form_Register {

	/**
	 * Description
	 * @return algo
	 */
	protected function _prepareLayout() {
		$this->getLayout()->getBlock('head')->setTitle(Mage::helper('customer')->__('Create New Customer Account'));
		return parent::_prepareLayout();
	}
	/**
	 * Description
	 * @return string
	 */
	public function getPostActionUrl() {
		return $this->helper('distribuidor')->getRegisterPostUrl();

	}
	/**
	 * Description
	 * @return string
	 */
	public function getPostDistribuidorActionUrl() {
		return "hola"
	}
}