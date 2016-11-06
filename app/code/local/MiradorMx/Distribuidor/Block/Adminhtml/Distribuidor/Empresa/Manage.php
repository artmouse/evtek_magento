<?php
/**
 *
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Manage extends Mage_Adminhtml_Block_Widget_Grid_Container {
	/**
	 *
	 */
	function __construct() {
		$this->_blockGroup = 'distribuidor';
		$this->_controller = 'adminhtml_distribuidor_empresa_manage';
		$this->_headerText = Mage::helper('distribuidor')->__('Gestión de Empresas');
		parent::__construct();
		//para quitar el botón y quitamos el return:
		$this->_removeButton('add');
		//return parent::__construct();

	}
	/**
	 *
	 */
	public function gridAction() {
		$this->loadLayout();
		$this->getResponse()->setBody($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_manage_grid')->toHtml());
	}

}