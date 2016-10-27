<?php

require_once Mage::getModuleDir('controllers', 'Mage_Customer') . DS . 'AccountController.php';

/**
 * Class MiradorMx_Distrinbuidor_AccountController
 * @category MiradorMx
 * @package  Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_AccountController extends Mage_Customer_AccountController {

	/**
	 * Customer login Form
	 * @return type
	 */
	public function loginAction() {
		$store = Mage::app()->getStore();
		$nombre = $store->getName();
		$id = $store->getId();
		print($nombre . " ");
		print($id);
		if ($this->_getSession()->isLoggedIn()) {
			$this->_redirect('*/*/');
			return;
		}
		$this->getResponse()->setHeader('Login-Required', 'true');
		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->_initLayoutMessages('catalog/session');
		$this->renderLayout();
	}

	/**
	 * Customer register Form
	 * @return type
	 */
	public function createAction() {
		if ($this->_getSession()->isLoggedIn()) {
			$this->_redirect('*/*');
			return;
		}

		$this->loadLayout();
		$this->_initLayoutMessages('customer/session');
		$this->renderLayout();
	}
	/**
	 * Description
	 * @return type
	 */
	public function createPostAction() {

		$errUrl = $this->_getUrl('*/*/create', array('_secure' => true));

		if (!$this->_validateFormKey()) {
			$this->_redirectError($errUrl);
			return;
		}

		/** @var $session Mage_Customer_Model_Session */
		$session = $this->_getSession();
		if ($session->isLoggedIn()) {
			$this->_redirect('*/*/');
			return;
		}

		if (!$this->getRequest()->isPost()) {
			$this->_redirectError($errUrl);
			return;
		}

		$customer = $this->_getCustomer();

		try {
			$errors = $this->_getCustomerErrors($customer);

			if (empty($errors)) {
				$customer->cleanPasswordsValidationData();
				$customer->save();
				$this->_dispatchRegisterSuccess($customer);
				$this->_successProcessRegistration($customer);
				return;
			} else {
				$this->_addSessionError($errors);
			}
		} catch (Mage_Core_Exception $e) {
			$session->setCustomerFormData($this->getRequest()->getPost());
			if ($e->getCode() === Mage_Customer_Model_Customer::EXCEPTION_EMAIL_EXISTS) {
				$url = $this->_getUrl('customer/account/forgotpassword');
				$message = $this->__('There is already an account with this email address. If you are sure that it is your email address, <a href="%s">click here</a> to get your password and access your account.', $url);
			} else {
				$message = $this->_escapeHtml($e->getMessage());
			}
			$session->addError($message);
		} catch (Exception $e) {
			$session->setCustomerFormData($this->getRequest()->getPost());
			$session->addException($e, $this->__('Cannot save the customer.'));
		}

		$this->_redirectError($errUrl);
	}
	/**
	 * Description
	 * @return type
	 */
	public function distribuidorPostAction() {

		$errUrl = $this->_getUrl('*/*/create', array('_secure' => true));

		if (!$this->_validateFormKey()) {
			$this->_redirectError($errUrl);
			return;
		}

		/** @var $session Mage_Customer_Model_Session */
		$session = $this->_getSession();
		if ($session->isLoggedIn()) {
			$this->_redirect('*/*/');
			return;
		}

		if (!$this->getRequest()->isPost()) {
			$this->_redirectError($errUrl);
			return;
		}

		$customer = $this->_getCustomer();

		try {
			$errors = $this->_getCustomerErrors($customer);

			if (empty($errors)) {
				$customer->cleanPasswordsValidationData();
				$customer->setData('group_id', 2);
				$customer->save();
				$this->_dispatchRegisterSuccess($customer);
				$this->_successProcessRegistration($customer);
				return;
			} else {
				$this->_addSessionError($errors);
			}
		} catch (Mage_Core_Exception $e) {
			$session->setCustomerFormData($this->getRequest()->getPost());
			if ($e->getCode() === Mage_Customer_Model_Customer::EXCEPTION_EMAIL_EXISTS) {
				$url = $this->_getUrl('customer/account/forgotpassword');
				$message = $this->__('There is already an account with this email address. If you are sure that it is your email address, <a href="%s">click here</a> to get your password and access your account.', $url);
			} else {
				$message = $this->_escapeHtml($e->getMessage());
			}
			$session->addError($message);
		} catch (Exception $e) {
			$session->setCustomerFormData($this->getRequest()->getPost());
			$session->addException($e, $this->__('Cannot save the customer.'));
		}

		$this->_redirectError($errUrl);
	}

}