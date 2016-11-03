<?php

/**
 * @package MiradorMx
 * @category Login
 * @author Mariana Valdivia
 */

class MiradorMx_Login_Block_Form_Login extends Mage_Customer_Block_Form_Login{
    /**
     * @return mixed
     */
    public function getCreateDistribuidorAccountUrl(){

        $url=$this->getData('create_account_url');
        if(is_null($url)){
            $url=$this->helper('customer')->getDistribuidorRegisterUrl();

        }
        return $url;
    }

}
