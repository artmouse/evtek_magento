<?php
/**
 *
 */
class MiradorMx_Distribuidor_Adminhtml_Distribuidor_Empresa_EmpresaController extends Mage_Adminhtml_Controller_Action {

	/**
	 * Index action para "Gestión de empresas"
	 */
	public function indexAction() {
		$this->_title($this->__('Gestión de Empresas'));
		$this->loadLayout()
			->_setActiveMenu('distribuidor_options/manage_empresa') //pintamos bontón :)
			->_addBreadcrumb($this->__('Empresa'), $this->__('Empresa'))
			->_addBreadcrumb($this->__('Manage'), $this->__('Manage'));

		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_manage'));
		$this->renderLayout();
	}

	/**
	 * Grid action para empresas.
	 */
	public function gridAction() {
		$this->loadLayout();
		$this->getResponse()->setBody($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_manage_grid')->toHtml());
	}

}