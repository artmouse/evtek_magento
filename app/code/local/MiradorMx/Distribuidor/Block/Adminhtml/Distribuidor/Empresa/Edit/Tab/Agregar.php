<?php
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tab_Agregar extends Mage_Adminhtml_Block_Widget_Form {

	protected function _prepareForm() {
		$data = array();
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('empresa_empresa', array('legend' => Mage::helper('distribuidor')->__('Agregar Dirección')));
		$fieldset->addField('calle_avenida', 'text', array(
			'name' => 'calle_avenida',
			'label' => Mage::helper('distribuidor')->__('Calle/avenida'),
			'title' => Mage::helper('distribuidor')->__('Calle/avenida'),
		));
		$fieldset->addField('numero_calle', 'text', array(
			'name' => 'numero_calle',
			'label' => Mage::helper('distribuidor')->__('Número'),
			'title' => Mage::helper('distribuidor')->__('Número'),

		));
		$fieldset->addField('numero_interior', 'text', array(
			'name' => 'numero_interior',
			'label' => Mage::helper('distribuidor')->__('Número interior'),
			'title' => Mage::helper('distribuidor')->__('Número interior'),

		));
		$fieldset->addField('delegacion_municipio', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Delegación/Municipio'),
			'name' => 'delegacion_municipio',
		));
		$fieldset->addField('pais', 'text', array(
			'label' => Mage::helper('distribuidor')->__('País'),
			'name' => 'pais',
		));
		$fieldset->addField('estado', 'select', array(
			'label' => Mage::helper('distribuidor')->__('Estado'),
			'class' => 'required-entry',
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
		$fieldset->addField('codigo_postal', 'text', array(
			'label' => Mage::helper('distribuidor')->__('Código Postal'),
			'name' => 'codigo_postal',
		));
		$fieldset->addField('tipo', 'select', array(
			'label' => Mage::helper('distribuidor')->__('Tipo de dirección'),
			'name' => 'tipo',
			'value' => '1',
			'values' => array(
				'-1' => 'Por favor seleccione un tipo de dirección',
				"Ninguna" => "Ninguna",
				"Facturación y envío" => "Facturación y envío",
				"Envío" => "Envío",
				"Facturación" => "Facturación"),
			'disabled' => false,
			'readonly' => false,
			'tabindex' => 1,
		));
		$customField = $fieldset->addField('test', 'text', array(
			'label' => Mage::helper('modulename')->__('Test'),
			'name' => 'test',
		));
		$customField->setRenderer($this->getLayout()->createBlock('yuormodule/adminhtml_yourform_edit_renderer_button'));

		$form->setValues($data);
	}
}
