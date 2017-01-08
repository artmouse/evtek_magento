<?php
/**
 * MiradorMx_Distribuidor_Adminhtml_Distribuidor_Empresa_EmpresaController
 * @category MiradadorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
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
	 * Edit action para empresas.
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
	/**
	 * Edit action para direcciones de empresa
	 */
	public function editDireccionAction() {
		$id = $this->getRequest()->getParam('id', null); //tomamos el id de la dirección
		$model = Mage::getModel('distribuidor/direccion');
		if ($id) {
			$model->load((int) $id);
			if ($model->getId()) {
				$data = MAge::getSingleton('adminhtml/session')->getFormData(true);
				if ($data) {
					$model->setData($data)->setId($id);
				}
			} else {
				Mage::getSingleton('adminhtml/session')->addrror(Mage::helper('distribuidor')->__('Esta dirección no existe'));
				$this->_redirect('*/*/');
			}
		}
		Mage::register('distribuidor_direccion', $model);
		$this->_title($this->__('Dirección'))->_title($this->__('Editar dirección'));
		$this->loadLayout();
		$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_direccion_edit'));
		$this->renderLayout();
	}

	/**
	 * New Action para empresas
	 */
	public function newAction() {
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit'))
			->_addLeft($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_edit_tabs'));
		$this->renderLayout();
	}
	/**
	 * Tab action de direcciones
	 */
	public function direccionesAction() {
		$this->loadLayout();
		$this->getLayout()->getBlock('direcciones.grid');
		$this->renderLayout();
	}
	/**
	 * Grid action de direcciones
	 */
	public function direccionesGridAction() {
		$this->loadLayout();
		$this->getLayout()->getBlock('direcciones.grid');
		$this->renderLayout();
	}
	/**
	 * Action para agregar direcciones
	 */
	public function agregarDireccionAction() {
		$id = $this->getRequest()->getParam('id_empresa', null);
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('distribuidor/adminhtml_distribuidor_empresa_direccion_edit'));
		$this->renderLayout();
	}

	/**
	 * Save action para empresa
	 */
	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			//init model and set data
			$model = Mage::getModel('distribuidor/empresa');
			if ($id = $this->getRequest()->getParam('id')) {

				//the parameter name may be different
				$model->load($id);
			}
			$model->addData($data);
			try {
				//try to save it
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess('Empresa guardada correctamente');
				//redirect to grid.
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				//if there is an error return to edit
				Mage::getSingleton('adminhtml/session')->addError('La empresa no se ha guardado correctamente. Error:' . $e->getMessage());
				Mage::getSingleton('adminhtml/session')->setExampleFormData($data);
				$this->_redirect('*/*/edit', array('id' => $mode->getId(), '_current' => true));
			}
		}
	}

	/**
	 * Save action para direcciones
	 */
	public function saveDireccionAction() {
		if ($data = $this->getRequest()->getPost()) {
			//init model and set data
			$model = Mage::getModel('distribuidor/direccion');
			if ($id = $this->getRequest()->getParam('id')) {
				//the parameter name may be different
				$model->load($id);
			}
			$model->addData($data);
			try {
				//try to save it
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess('Dirección guardada correctamente');
				//redirect to grid.
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				//if there is an error return to edit
				Mage::getSingleton('adminhtml/session')->addError('La dirección no se ha guardado correctamente. Error:' . $e->getMessage());
				Mage::getSingleton('adminhtml/session')->setExampleFormData($data);
				$this->_redirect('*/*/agregarDireccion', array('id' => $mode->getId(), '_current' => true));
			}
		}
	}

	/**
	 * Activa una empresa
	 */
	public function activateEmpresaAction() {
		$empresaid = $this->getRequest()->getParam('id_empresa');
		try {
			$model = Mage::getModel('distribuidor/empresa');
			$empresa = $model->load($empresaid);
			$empresa->setData('activo', 'Activa');
			$empresa->save();
			$wholesalerName = $empresa->getAdminName();
			$wholesalerLastname = $empresa->getAdminLastname();
			$activo = "Activo";
			$correo = $empresa->getAdminCorreo();
			$wholesaler = Mage::getModel('distribuidor/wholesaler');
			$wholesaler->creaWholesaler($empresaid, $correo, $wholesalerName, $wholesalerLastname, $activo);
			Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('distribuidor')->__('Empresa activada correctamente, se han activado las cuentas asociadas a ésta'));
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

		}
		$this->_redirect('*/*/');
	}

	/**
	 * Desactiva una empresa
	 */
	public function deactivateEmpresaAction() {
		$emrpesaid = $this->getRequest()->getParam('id_empresa');
		try {
			$model = Mage::getModel('distribuidor/empresa');
			$empresa = $model->load($empresaid);
			$empresa->setData('activo', 'No activa');
			$empresa->save();
			Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('distribuidor')->__('Empresa desactivada correctamente'));
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

		}
		$this->_redirect('*/*/');
	}

	/**
	 * Mass action para activar empresas
	 */
	public function massActivateEmpresaAction() {
		$empresaids = $this->getRequest()->getParam('empresa_id');
		if (!is_array($empresaids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Por favor seleccione empresas'));
		} else {
			try {
				$model = Mage::getModel('distribuidor/empresa');
				foreach ($empresaids as $empresaid) {
					$empresa = $model->load($empresaid);
					$empresa->setData('activo', 'Activa');
					$empresa->save();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
					Mage::helper('distribuidor')->__(
						'Total de %d empresa(s) activadas.', count($empresaids)
					)
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/');
	}

	/**
	 * Mass action para desactivar empresas
	 */
	public function massDeactivateEmpresaAction() {
		$empresaids = $this->getRequest()->getParam('empresa_id');
		if (!is_array($empresaids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('distribuidor')->__('Por favor seleccione empresas'));
		} else {
			try {
				$model = Mage::getModel('distribuidor/empresa');
				foreach ($empresaids as $empresaid) {
					$empresa = $model->load($empresaid);
					$empresa->setData('activo', 'No Activa');
					$empresa->save();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
					Mage::helper('distribuidor')->__(
						'Total de %d empresa(s) desactivadas.', count($empresaids)
					)
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/');
	}

}