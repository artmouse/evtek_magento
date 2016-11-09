<?php
/**
 * MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Manage
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Manage extends Mage_Adminhtml_Block_Widget_Grid_Container {

	/**
	 * Construct grid container.
	 */
	function __construct() {
		$this->_blockGroup = 'distribuidor';
		$this->_controller = 'adminhtml_distribuidor_empresa_manage';
		$this->_headerText = Mage::helper('distribuidor')->__('Gestión de Empresas');
		parent::__construct();

	}
}