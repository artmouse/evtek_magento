<?php
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tab_Contacto extends Mage_Adminhtml_Block_Widget_Form {

	protected function _prepareForm() {

		if (Mage::registry('distribuidor_empresa')) {
			$data = Mage::registry('distribuidor_empresa')->getData();
		} else {
			$data = array();
		}

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('empresa_empresa', array('legend' => Mage::helper('distribuidor')->__('More information')));
		$fieldset->addField('description', 'editor', array(
			'name' => 'description',
			'label' => Mage::helper('distribuidor')->__('Description'),
			'title' => Mage::helper('distribuidor')->__('Description'),
			'required' => false,
		));

		$form->setValues($data);
	}
}