<?php

/**
 * MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tabs
 * @category MiradadorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

	/**
	 *
	 */
	public function __construct() {

		parent::__construct();
		$this->setId('empresa_tabs');
		$this->setDestElementId('edit_form'); // igual a como lo definimos en el form
		$this->setTitle('Información de empresa');

	}
	/**
	 *
	 */
	protected function _beforeToHtml() {
		/** Básico **/
		$this->addTab('form_section', array(
			'label' => Mage::helper('distribuidor')->__('Información básica'),
			'title' => Mage::helper('distribuidor')->__('Información básica'),
			'content' => $this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tab_basico')->toHtml(),
		));
		/** Contacto **/
		$this->addTab('form_section1', array(
			'label' => Mage::helper('distribuidor')->__('Información de contacto'),
			'title' => Mage::helper('distribuidor')->__('Información de contacto'),
			'content' => $this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tab_contacto')->toHtml(),
		));
		/**Dirección principal**/
		$this->addTab('form_section2', array(
			'label' => Mage::helper('distribuidor')->__('Dirección principal'),
			'title' => Mage::helper('distribuidor')->__('Dirección principal'),
			'content' => $this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tab_direccion')->toHtml(),
		));
		/**Grid de direcciones de la empresa**/
		$this->addTab('form_section3', array(
			'label' => Mage::helper('distribuidor')->__('Direcciones guardadas'),
			'title' => Mage::helper('distribuidor')->__('Direcciones guardadas'),
			'url' => $this->getUrl('*/*/direcciones', array('_current' => true)),
			'class' => 'ajax',
		));

		return parent::_beforeToHtml();
	}
}