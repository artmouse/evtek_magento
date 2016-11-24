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

		if (Mage::registry('distribuidor_direccion')) {
			$data = Mage::registry('distribuidor_direccion')->getData();
		} else {
			$data = array();
		}
		$id = $this->getRequest()->getParam('id_empresa');
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/saveDireccion', array('id' => $this->getRequest()->getParam('id'))),
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
		$fieldset->addField('codigo_postal', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Código postal'),
			'name' => 'codigo_postal',
			'required' => true,
			'class' => 'required-entry',
		));
		$fieldset->addField('estado', 'select', array(
			'label' => Mage::helper('distribuidor')->__('Estado'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'estado',
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
		));
		$fieldset->addField('empresa', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Id de la empresa'),
			'name' => 'empresa',
			'value' => $id,
			'readonly' => true,
		));
		$fieldset->addField('tipo', 'select', array(
			'label' => Mage::helper('distribuidor')->__('Tipo de dirección'),
			'name' => 'tipo',
			'value' => '1',
			'values' => array(
				'Ninguna' => 'Por favor seleccione un tipo de dirección',
				"Ninguna" => "Ninguna",
				"Facturación" => "Facturacion",
				"Envío" => "Envio",
				"Facturacion/envio" => "Facturacion/envio",
			))
		);
		$form->setUseContainer(true);
		$form->setValues($data);
		//$this->setForm($form);
		//$id_empresa = Mage::app()->getRequest()->getParam('id_empresa');
		//$model = Mage::getModel('distribuidor/direccion')->load($id);
		//$form->setValues($model->getData());

		return parent::_prepareForm();
	}
}
