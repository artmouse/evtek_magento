<?php

/**
 *@category MiradorMx
 *@package  MiradorMx_Distribuidor
 *@author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Form_Register extends Mage_Customer_Block_Form_Register {

	/**
	 * Algo
	 * @return algo
	 */
	protected function _prepareLayout() {
		$this->getLayout()->getBlock('head')->setTitle(Mage::helper('customer')->__('Create New Customer Account'));
		return parent::_prepareLayout();
	}
	/**
	 * Get post action para usuario normal.
	 * @return string
	 */
	public function getPostActionUrl() {
		
		return $this->helper('customer')->getRegisterPostUrl();

	}
	/**
	 * Get post action para distribuidor. 
	 * @return string
	 */
	public function getPostDistribuidorActionUrl() {
		
		return $this->helper('customer')->getDistribuidorRegisterPostUrl();
	}
}