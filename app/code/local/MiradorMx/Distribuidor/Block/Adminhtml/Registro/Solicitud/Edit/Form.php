<?php

/**
 * Class MiradorMx_Distribuidor_Block_Adminhtml_Registro_Solicitud_Edit_Form
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Registro_Solicitud_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

	/**
	 * @return mixed
	 * Form para edit de Solicitud en el admin.
	 */
	function _prepareForm() {
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
			'method' => 'post',
		));
		$fieldset = $form->addFieldset('form_form', array('legend' => Mage::helper('distribuidor')->__('Información de Empresa')));

		$fieldset->addField('name', 'text', array(
			'label' => 'Nombre de la empresa',
			'class' => 'required-entry',
			'required' => true,
			'name' => 'name'));
		$fieldset->addField('url', 'text', array(
			'label' => 'Website',
			'name' => 'url'));
		$fieldset->addField('rfc', 'text', array(
			'label' => 'RFC',
			'class' => 'required-entry',
			'required' => true,
			'name' => 'rfc'));
		$fieldset->addField('correo', 'text', array(
			'label' => 'Correo del solicitante',
			'class' => 'required-entry',
			'required' => true,
			'name' => 'correo'));
		$fieldset->addField('wholesaler_name', 'text', array(
			'label' => 'Nombre del solicitante',
			'class' => 'required-entry',
			'required' => true,
			'name' => 'wholesaler_name'));
		$fieldset->addField('wholesaler_lastname', 'text', array(
			'label' => 'Apellido del solicitante',
			'class' => 'required-entry',
			'required' => true,
			'name' => 'wholesaler_lastname'));
		$fieldset->addField('mensaje', 'textarea', array(
			'label' => 'Mensaje del solicitante',
			'readonly' => true,
			'name' => 'mensaje'));
		$fieldset->addField('phone', 'text', array(
			'label' => 'Teléfono de contacto',
			'class' => 'required-entry',
			'required' => true,
			'name' => 'phone'));
		$fieldset->addField('aceptada', 'select', array(
			'label' => 'Estado de la solicitud',
			'values' => array(
				array(
					'value' => 'No aceptada',
					'label' => 'No aceptada',
				),
				array(
					'value' => 'En revision',
					'label' => 'En revisión',
				),
				array(
					'value' => 'Aceptada',
					'label' => 'Aceptada',
				), array(
					'value' => 'Nueva',
					'label' => 'Nueva',
				),
			),
			'name' => 'aceptada'));
		$form->setUseContainer(true);
		$id = Mage::app()->getRequest()->getParam('id');
		$model = Mage::getModel('distribuidor/solicitud')->load($id);
		$form->setValues($model->getData());
		$this->setForm($form);

		return parent::_prepareForm();

	}
}
