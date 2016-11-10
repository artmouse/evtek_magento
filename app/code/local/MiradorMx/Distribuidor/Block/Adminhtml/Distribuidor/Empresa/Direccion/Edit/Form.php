<?php

/**
 * Class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Direccion_Edit_Form
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Direccion_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

	/**
	 * @return mixed
	 * Form para edit de Direccion en el admin.
	 */
	function _prepareForm() {
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/savedireccion', array('id_empresa' => $this->getRequest()->getParam('id_empresa'))),
			'method' => 'post',
		));
		$this->setForm($form);
		$fieldset = $form->addFieldset('form_form', array('legend' => Mage::helper('distribuidor')->__('Dirección principal de la empresa')));
		$fieldset->addField('calle_avenida', 'text', array(
			'name' => 'calle_avenida',
			'label' => Mage::helper('distribuidor')->__('Calle/avenida'),
			'title' => Mage::helper('distribuidor')->__('Calle/avenida'),
			'required' => true,
			'class' => 'required-entry',

		));
		$fieldset->addField('numero_calle', 'text', array(
			'name' => 'numero_calle',
			'label' => Mage::helper('distribuidor')->__('Número'),
			'title' => Mage::helper('distribuidor')->__('Número'),
			'required' => true,
			'class' => 'required-entry',

		));
		$fieldset->addField('numero_interior', 'text', array(
			'name' => 'numero_interior',
			'label' => Mage::helper('distribuidor')->__('Número interior'),
			'title' => Mage::helper('distribuidor')->__('Número interior'),

		));
		$fieldset->addField('delegacion_municipio', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Delegación/Municipio'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'delegacion_municipio',
		));
		$fieldset->addField('pais', 'text', array(
			'label' => Mage::helper('distribuidor')->__('País'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'pais',
		));
		$fieldset->addField('estado', 'select', array(
			'label' => Mage::helper('distribuidor')->__('Estado'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'title',
			'onclick' => "",
			'onchange' => "",
			'value' => '1',
			'values' => array(
				'-1' => 'Por favor seleccione un estado',
				"Aguascalientes" => "Aguascalientes",
				"Baja California" => "Baja California",
				"Baja California Sur" => "Baja California Sur",
				"Campeche" => "Campeche",
				"Chiapas" => "Chiapas",
				"Chihuahua" => "Chihuahua",
				"Coahuila" => "Coahuila",
				"Colima" => "Colima",
				"Distrito Federal" => "Distrito Federal",
				"Durango" => "Durango",
				"Estado de México" => "Estado de México",
				"Guanajuato" => "Guanajuato",
				"Guerrero" => "Guerrero",
				"Hidalgo" => "Hidalgo",
				"Jalisco" => "Jalisco",
				"Michoacán" => "Michoacán",
				"Morelos" => "Morelos",
				"Nayarit" => "Nayarit",
				"Nuevo León" => "Nuevo León",
				"Oaxaca" => "Oaxaca",
				"Puebla" => "Puebla",
				"Querétaro" => "Querétaro",
				"Quintana Roo" => "Quintana Roo",
				"San Luis Potosí" => "San Luis Potosí",
				"Sinaloa" => "Sinaloa",
				"Sonora" => "Sonora",
				"Tabasco" => "Tabasco",
				"Tamaulipas" => "Tamaulipas",
				"Tlaxcala" => "Tlaxcala",
				"Veracruz" => "Veracruz",
				"Yucatán" => "Yucatán",
				"Zacatecas" => "Zacatecas"),
			'disabled' => false,
			'readonly' => false,
			'tabindex' => 1,
		));
		$form->setUseContainer(true);
		$this->setForm($form);
		//$id_empresa = Mage::app()->getRequest()->getParam('id_empresa');
		//$model = Mage::getModel('distribuidor/direccion')->load($id);
		//$form->setValues($model->getData());

		return parent::_prepareForm();
	}
}
