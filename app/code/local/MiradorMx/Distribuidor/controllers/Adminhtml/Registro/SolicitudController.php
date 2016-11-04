<?php

/**
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Adminhtml_Registro_SolicitudController extends Mage_Adminhtml_Controller_Action {

	/**
	 * Index action para "Gestión de solicitudes"
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
	 * Grid action para solicitudes.
	 */
	public function gridAction() {
		$this->loadLayout();
		$this->getResponse()->setBody($this->getLayout()->createBlock('distribuidor/adminhtml_registro_solicitud_manage_grid')->toHtml());
	}

	public function massDeleteAction() {
		$solicitudesids = $this->getRequest()->getParam('id'); // $this->getMassactionBlock()->setFormFieldName('tax_id'); from Mage_Adminhtml_Block_Empresa_Manage_Grid
		if (!is_array($solicitudesids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Por favor seleccione empresas'));
		} else {
			try {
				$solicitudModel = Mage::getModel('distribuidor/solicitud');
				foreach ($solicitudesids as $solicitudid) {
					$solicitudModel->load($solicitudid)->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
					Mage::helper('distribuidor')->__(
						'Total de %d empresas borrada.', count($solicitudesids)
					)
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');

	}
	/**
	 * Mass Accept Action
	 * Acepta solicitudes de forma masiva en el grid de solicitudes.
	 */
	public function massAcceptAction() {
		$solicitudesids = $this->getRequest()->getParam('id');
		if (!is_array($solicitudesids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('proveedores')->__('Por favor seleccione solicitudes'));
		} else {
			try {
				$solicitudModel = Mage::getModel('distribuidor/solicitud');
				foreach ($solicitudesids as $solictdid) {
					$solicitudModel->load($solicitudid)->setAceptada('Aceptada')->save();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
					Mage::helper('distribuidor')->__(
						'Total de %d solicitudes aceptadas.', count($solicitudesids)
					)
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
	/**
	 * Edit action para solicitudes.
	 */
	public function editAction() {
		//get Id and create model
		$id = $this->getRequest()->getParam('solicitud_id');
		$model = Mage::getModel('distribuidor/solicitud');
		//Check if id exists on database
		if ($id) {
			$model->load($id);
			if (!$model->getId()) {
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Esta página no existe'));
				$this->_redirect('*/*/');
				return;
			}
		}
		//Set entered data if there was an error when we saved.
		$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}
		//Register Model tu use later in blocks.
		Mage::register('distribuidor_solicitud', $model);
		//build edit form:
		$this->_title($this->__('Ver solicitud'));
		$this->loadLayout()
			->_setActiveMenu('distribuidor_options/manage_solicitud')
			->_addBreadcrumb($this->__('Solicitud'), $this->__('Solicitud'))
			->_addBreadcrumb($this->__('Manage'), $this->__('Manage'));
		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_registro_solicitud_edit')->setData('action', $this->getUrl('*/*/save')));
		$this->renderLayout();

	}

	/**
	 * Save action para solicitudes
	 */
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			//init model and set data
			$model = Mage::getModel('distribuidor/solicitud');
			if ($id = $this->getRequest()->getParam('id')) {
				//the parameter name may be different
				$model->load($id);
			}
			$model->addData($data);
			try {
				//try to save it
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess('Saved');
				//redirect to grid.
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				//if there is an error return to edit
				Mage::getSingleton('adminhtml/session')->addError('Not Saved. Error:' . $e->getMessage());
				Mage::getSingleton('adminhtml/session')->setExampleFormData($data);
				$this->_redirect('*/*/edit', array('id' => $mode->getId(), '_current' => true));
			}
		}
	}
}
