<?php

/**
 * Class MiradorMx_Distribuidor_Helper_Data
 */
class MiradorMx_Distribuidor_Helper_Data extends Mage_Customer_Helper_Data
{
    /**
     * @return string
     */
    public function getDistribuidorRegisterUrl()
    {
        return $this->_getUrl('customer/account/createdistribuidor');
    }
}