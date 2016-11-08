<?php

/**
 * adminhtml_distribuidor_empresa_edit_tabs
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

	public function __construct() {

		parent::__construct();
		$this->setId('empresa_tabs');
		$this->setDestElementId('edit_form'); // this should be same as the form id define above
		$this->setTitle('Información de empresa');

	}
	protected function _beforeToHtml() {
		$this->addTab('form_section', array(
			'label' => Mage::helper('distribuidor')->__('Información básica'),
			'title' => Mage::helper('distribuidor')->__('Información básica'),
			'content' => $this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tab_basico')->toHtml(),
		));
		$this->addTab('form_section1', array(
			'label' => Mage::helper('distribuidor')->__('Información de contacto'),
			'title' => Mage::helper('distribuidor')->__('Información de contacto'),
			'content' => $this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tab_contacto')->toHtml(),
		));
		$this->addTab('form_section2', array(
			'label' => Mage::helper('distribuidor')->__('Direcciones'),
			'title' => Mage::helper('distribuidor')->__('Direcciones'),
			'content' => $this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tab_direcciones')->toHtml(),
		));

		return parent::_beforeToHtml();
	}
}