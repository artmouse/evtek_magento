<?php

/**
 *
 */
class MiradorMx_Distribuidor_Adminhtml_Registro_SolicitudController extends Mage_Adminhtml_Controller_Action {
	/**
	 *
	 */
	public function indexAction() {
		$this->_title($this->__('Gestión de Solicitudes'));
		$this->loadLayout()
			->_setActiveMenu('distribuidor_options/manage_solicitud') //pintamos bontón :)
			->_addBreadcrumb($this->__('Solicitud'), $this->__('Solicitud'))
			->_addBreadcrumb($this->__('Manage'), $this->__('Manage'));

		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_registro_solicitud_manage'));
		$this->renderLayout();
	}

	/**
	 *
	 */
	public function gridAction() {
		$this->loadLayout();
		$this->getResponse()->setBody($this->getLayout()->createBlock('distribuidor/adminhtml_registro_solicitud_manage_grid')->toHtml());
	}
}
