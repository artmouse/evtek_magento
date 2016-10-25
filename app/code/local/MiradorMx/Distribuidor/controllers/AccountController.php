<?php

require_once (Mage::getModuleDir('controllers','Mage_Customer').DS.'AccountController.php');

/**
 * Class MiradorMx_Distrinbuidor_AccountController
 * @category MiradorMx
 * @package  Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_AccountController extends Mage_Customer_AccountController
{
    /**
     * Customer login form page
     */
    public function loginAction()
    {
        print(Mage::getBaseUrl());
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



    public function registerAction()
    {

    }

}