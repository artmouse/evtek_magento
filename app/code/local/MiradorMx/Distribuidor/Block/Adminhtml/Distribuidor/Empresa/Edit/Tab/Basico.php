<?php
/**
 *
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tab_Basico extends Mage_Adminhtml_Block_Widget_Form {

	/**
	 *
	 */
	protected function _prepareForm() {

		if (Mage::registry('distribuidor_empresa')) {
			$data = Mage::registry('distribuidor_empresa')->getData();
		} else {
			$data = array();
		}

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('empresa_empresa', array('legend' => Mage::helper('distribuidor')->__('Información básica')));

		$fieldset->addField('name', 'text', array(
			'label' => Mage::helper('distribuidor')->__('News Title'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'name',
		));

		$fieldset->addField('phone', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Teléfono'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'phone',
		));

		$fieldset->addField('rfc', 'text', array(
			'label' => Mage::helper('distribuidor')->__('RFC'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'rfc',
		));

		$fieldset->addField('url', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Página Web'),
			'class' => 'required-entry',
			'name' => 'url',
		));
		$fieldset->addField('solicitud_id', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Número de solicitud'),
			'class' => 'required-entry',
			'readonly' => true,
			'name' => 'solicitud_id',
		));

		$form->setValues($data);

		return parent::_prepareForm();
	}
}