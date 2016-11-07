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

	/**
	 * Edit action para solicitudes.
	 */

	public function editAction() {

		$id = $this->getRequest()->getParam('id', null);

		$model = Mage::getModel('distribuidor/empresa');
		if ($id) {
			$model->load((int) $id);
			if ($model->getId()) {
				$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
				if ($data) {
					$model->setData($data)->setId($id);
				}
			} else {
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Esta empresa no existe'));
				$this->_redirect('*/*/');
			}
		}
		Mage::register('distribuidor_empresa', $model);

		$this->_title($this->__('Empresa'))->_title($this->__('Editar empresa'));
		$this->loadLayout();
		$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit'))
			->_addLeft($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tabs'));
		$this->renderLayout();
	}

}