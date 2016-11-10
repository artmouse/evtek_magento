	<?php

/**
 * Class MiradorMx_Distribuidor_Block_Adminhtml_Empresa_Direccion_Edit
 * Form container para agregar direcciones
 * @category MiradadorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Direccion_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	/**
	 *
	 */
	function _construct() {
		$this->_blockGroup = 'distribuidor';
		$this->_controller = 'adminhtml_distribuidor_empresa_direccion';

		parent::_construct();
	}

	/**
	 * @return mixed
	 * Ponemos el text del header
	 */
	public function getHeaderText() {

		return Mage::helper('distribuidor')->__('Agregar direcciones a empresa');

	}

	/**
	 * @return mixed
	 */
	protected function _prepareLayout() {
		if ($this->_blockGroup && $this->_controller && $this->_mode) {
			$this->setChild('form', $this->getLayout()->createBlock($this->_blockGroup . '/' . $this->_controller . '_' . $this->_mode . '_form'));
		}
		return parent::_prepareLayout();
	}

}