<?php
/**
 *
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tab_Basico extends Mage_Adminhtml_Block_Widget_Form {

	/**
	 *
	 */
	protected function _prepareForm() {

		$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);

		if (Mage::registry('distribuidor_empresa')) {
			$data = Mage::registry('distribuidor_empresa')->getData();
		} else {
			$data = array();
		}

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('empresa_empresa', array('legend' => Mage::helper('distribuidor')->__('Información básica')));

		$fieldset->addField('name', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Nombre de la empresa'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'name',
		));

		$fieldset->addField('rfc', 'text', array(
			'label' => Mage::helper('distribuidor')->__('RFC'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'rfc',
		));

		$fieldset->addField('url', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Página Web'),
			'name' => 'url',
		));
		$fieldset->addField('solicitud_id', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Número de solicitud'),
			'class' => 'required-entry',
			'readonly' => true,
			'name' => 'solicitud_id',
		));
		$fieldset->addField('created_at', 'date', array(
			'name' => 'created_at',
			'label' => Mage::helper('distribuidor')->__('Creada en'),
			'title' => Mage::helper('distribuidor')->__('Creada en'),
			'input_format' => $dateFormatIso,
			'format' => $dateFormatIso,
			'readonly' => true,

		));
		$fieldset->addField('sector', 'text', array(
			'name' => 'sector',
			'label' => Mage::helper('distribuidor')->__('Sector'),
			'title' => Mage::helper('distribuidor')->__('Sector'),

		));

		$form->setValues($data);

		return parent::_prepareForm();
	}
}