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
		$fieldset = $form->addFieldset('empresa_empresa', array('legend' => Mage::helper('distribuidor')->__('Información de cuenta del administrador')));
		$fieldset->addField('admin_name', 'text', array(
			'name' => 'admin_name',
			'label' => Mage::helper('distribuidor')->__('Nombre del administrador'),
			'title' => Mage::helper('distribuidor')->__('Nombre del administrador'),
			'required' => true,
			'class' => 'required-entry',

		));
		$fieldset->addField('admin_lastname', 'text', array(
			'name' => 'admin_lastname',
			'label' => Mage::helper('distribuidor')->__('Apellido del administrador'),
			'title' => Mage::helper('distribuidor')->__('Apellido del administrador'),
			'required' => true,
			'class' => 'required-entry',

		));
		$fieldset->addField('admin_correo', 'text', array(
			'name' => 'admin_correo',
			'label' => Mage::helper('distribuidor')->__('Correo del administrador'),
			'title' => Mage::helper('distribuidor')->__('Correo del administrador'),
			'required' => true,
			'class' => 'required-entry',

		));
		$fieldset->addField('phone', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Teléfono'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'phone',
		));

		$form->setValues($data);
	}
}