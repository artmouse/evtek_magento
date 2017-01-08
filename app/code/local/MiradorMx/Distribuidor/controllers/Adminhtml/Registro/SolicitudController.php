<?php

/**
 * Class MiradorMx_Distribuidor_Adminhtml_Registro_SolicitudController
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

	/**
	 * Mass Accept Action
	 * Acepta solicitudes de forma masiva en el grid de solicitudes.
	 */
	public function massAcceptAction() {
		$solicitudesids = $this->getRequest()->getParam('solicitud_id');
		if (!is_array($solicitudesids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Por favor seleccione solicitudes'));
		} else {
			try {
				$solicitudModel = Mage::getModel('distribuidor/solicitud');
				foreach ($solicitudesids as $solicitudid) {
					$solicitud = $solicitudModel->load($solicitudid);
					$aceptada = $solicitud->getAceptada();
					$name = $solicitud->getName();
					$rfc = $solicitud->getRfc();
					if ($aceptada == "Aceptada") {
						Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__(
							'La empresa %s ya ha sido aceptada anteriormente', $name));
					} else {
						$empresaModel = Mage::getModel('distribuidor/empresa');
						$flag = $this->existeEmpresa($rfc); /** checamos si ya existe la empresa **/
						if ($flag == 1) {
							$solicitud->setData('aceptada', 'Aceptada');
							$solicitud->save();
							$wholeName = $solicitud->getWholesalerName();
							$wholeLast = $solicitud->getWholesalerLastname();
							$phone = $solicitud->getPhone();
							$correo = $solicitud->getCorreo();
							/**creaEmpresa en modelo empresa**/
							$empresaModel->creaEmpresa($solicitudid, $name, $phone, $correo, $wholeName, $wholeLast, $rfc);
							Mage::getSingleton('adminhtml/session')->addSuccess(
								Mage::helper('distribuidor')->__(
									'Solicitud de la empresa con RFC %s aceptada.', $rfc));

						} else {
							$solicitud->setData('aceptada', 'Aceptada');
							$solicitud->save();
							Mage::getSingleton('adminhtml/session')->addSuccess(
								Mage::helper('distribuidor')->__(
									'Solicitud de la empresa con RFC %s aceptada.', $rfc));
						}
					}

				}

			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
	/**
	 * Mass Revisión Action
	 * Pone en revisión solicitudes de forma masiva en el grid de solicitudes.
	 */
	public function massRevisionAction() {
		$solicitudesids = $this->getRequest()->getParam('solicitud_id');
		if (!is_array($solicitudesids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Por favor seleccione solicitudes'));
		} else {
			try {
				$solicitudModel = Mage::getModel('distribuidor/solicitud');
				foreach ($solicitudesids as $solicitudid) {
					$solicitud = $solicitudModel->load($solicitudid);
					$solicitud->setData('aceptada', 'En revision');
					$solicitud->save();

				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
					Mage::helper('distribuidor')->__(
						'Total de %d solicitud(es) en revisión.', count($solicitudesids)
					)
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
	/**
	 * Mass Rechazo Action
	 * Rechaza solicitudes de forma masiva en el grid de solicitudes.
	 */
	public function massRechazoAction() {
		$solicitudesids = $this->getRequest()->getParam('solicitud_id');
		if (!is_array($solicitudesids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Por favor seleccione solicitudes'));
		} else {
			try {
				$solicitudModel = Mage::getModel('distribuidor/solicitud');
				foreach ($solicitudesids as $solicitudid) {
					$solicitud = $solicitudModel->load($solicitudid);
					$solicitud->setData('aceptada', 'No aceptada');
					$solicitud->save();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
					Mage::helper('distribuidor')->__(
						'Total de %d solicitud(es) rechazadas.', count($solicitudesids)
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
				Mage::getSingleton('adminhtml/session')->addSuccess('Solicitud guardada correctamente');
				//redirect to grid.
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				//if there is an error return to edit
				Mage::getSingleton('adminhtml/session')->addError('La solicitud no se ha guardado correctamente. Error:' . $e->getMessage());
				Mage::getSingleton('adminhtml/session')->setExampleFormData($data);
				$this->_redirect('*/*/edit', array('id' => $mode->getId(), '_current' => true));
			}
		}
	}
	/**
	 * Checamos si ya existe la empresa cuya solicitud se va a aceptar
	 */
	public function existeEmpresa($rfc) {
		$empresaCollection = Mage::getModel('distribuidor/empresa')->getCollection()
			->addFieldToSelect('*')
			->addFieldToFilter('rfc', $rfc);

		$count = $empresaCollection->getSize();
		$flag = 0;
		if ($count > 0) {

			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('
La empresa con RFC %s tenía una solicitud aceptada con anterioridad, revise sus permisos en la sección de empresas', $rfc));

		} else {

			$flag = 1;
		}
		return $flag;
	}

}