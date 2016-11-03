<?php

/**
 * @package  MiradorMx
 * @category MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_RegistroController extends Mage_Core_Controller_Front_Action {

	/**
	 * @return mixed
	 */
	protected function _getSession() {
		return Mage::getSingleton('customer/session');
	}
	/**
	 *
	 */
	function preDispatch() {

		parent::preDispatch();
		$action = $this->getRequest()->getActionName();
		$loginUrl = Mage::helper('distribuidor')->getLoginUrl();
		$openActions = array(
			'login',
			'loginvalidate',
			'solicitud',
		);
		$pattern = '/^(' . implode('|', $openActions) . ')/i';

		if (!preg_match($pattern, $action)) {
			if (!Mage::getSingleton('customer/session')->authenticate($this, $loginUrl)) {
				$this->setFlag('', 'no-dispatch', true);
			} else {
				if (!Mage::helper('distribuidor')->getIsWholesale()) {
					Mage::getSingleton('core/session')->addError("No tienes acceso como distribuidor");
					$website = Mage::app()->getWebsite(1);
					$request = $this->_getRequest();
					$response = $this->_getResponse();
					$url = $website->getDefaultStore()->getBaseUrl() . substr($request->getRequestString(), 1);
					$response->setRedirect($url);
				}
			}
		} else {
			$this->_getSession()->setNoReferer(true);
		}
	}
	/**
	 *
	 */
	public function postDispatch() {
		parent::postDispatch();
		$this->_getSession()->unsNoReferer(false);
	}
	/**
	 *
	 */
	public function solicitudAction() {
		$this->loadLayout();
		$this->getLayout()->getBlock('root')->setPageTitle($this->__('Registro para distribuidor'));
		$this->renderLayout();
	}
	/**
	 *
	 */
	public function solicitudpostAction() {
		if ($this->getRequest()->isPost()) {
			$post = $this->getRequest()->getPost();
			$wholesale_name = $post['wholesale_name'];
			$wholesale_lastname = $post['wholesale_lastname'];
			$empresa = $post['company_name'];
			$correo = $post['wholesale_mail'];
			$tel = $post['company_phone'];
			$mensaje = $post['wholesale_message'];
			$rfc = $post['company_rfc'];
			$solicitud = Mage::getModel("distribuidor/solicitud")
				->setName($empresa)
				->setPhone($tel)
				->setRfc($rfc)
				->setCorreo($correo)
				->setWholesalerName($wholesale_name)
				->setWholesalerLastname($wholesale_lastname)
				->setMensaje($mensaje);
			try {

				$solicitud->save();

			} catch (Exception $error) {
				Mage::log($error->getMessage(), null, 'solicitud_save.log');

			}

		}
	}

}