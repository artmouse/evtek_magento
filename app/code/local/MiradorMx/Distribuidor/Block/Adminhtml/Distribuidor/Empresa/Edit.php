<?php

/**
 * MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit
 * @category MiradadorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	/**
	 *
	 */
	public function __construct() {
		parent::__construct();
		$this->_objectId = 'id';
		$this->_blockGroup = 'distribuidor';
		$this->_controller = 'adminhtml_distribuidor_empresa';
		$this->_mode = 'edit';
		$this->_updateButton('save', 'label', Mage::helper('distribuidor')->__('Guardar empresa'));
		$this->_updateButton('delete', 'label', Mage::helper('distribuidor')->__('Borrar'));
		$this->_addButton('saveandcontinue', array(
			'label' => Mage::helper('distribuidor')->__('Guardar y continuar editando'),
			'onclick' => 'saveAndContinueEdit()',
			'class' => 'save',
		), -100);
		/**Lleva'al controller de agregar más direcciones a parte**/
		$this->_addButton('agregar_direccion', array(
			'label' => 'Agregar Dirección',
			'onclick' => 'setLocation(\'' . $this->getUrl('*/*/agregarDireccion') . '\')',
			'class' => 'save',
		), 100);

		$this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
	}
/*
 * This function is responsible for Including TincyMCE in Head.
 */
	protected function _prepareLayout() {
		parent::_prepareLayout();
		if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
			$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
		}
	}

	public function getHeaderText() {
		if (Mage::registry('distribuidor_empresa') && Mage::registry('distribuidor_empresa')->getId()) {
			return Mage::helper('distribuidor')->__('Editar Empresa', $this->htmlEscape(Mage::registry('distribuidor_empresa')->getTitle()));
		} else {
			return Mage::helper('distribuidor')->__('Nueva Empresa');
		}
	}

}