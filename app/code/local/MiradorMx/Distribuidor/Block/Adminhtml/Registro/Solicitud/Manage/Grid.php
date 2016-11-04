<?php

/**
 *
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Registro_Solicitud_Manage_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	/**
	 * MiradorMx_Distribuidor_Block_Adminhtml_Registro_Solicidud_Manage_Grid constructor.
	 */
	function __construct() {
		parent::__construct();
		$this->setId('solicitud_id');
		$this->setDefaultSort('solicitud_id');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}

	/**
	 * @return mixed
	 */
	protected function _prepareCollection() {
		$collection = Mage::getModel('distribuidor/solicitud')->getCollection();
		$collection->getSelect()->group('main_table.solicitud_id');
		$this->setCollection($collection);

		return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
	}

	/**
	 * @return $this
	 */
	protected function _prepareColumns() {

		$this->addColumn('solicitud_id',
			array(
				'header' => Mage::helper('catalog')->__('ID'),
				'width' => '50px',
				'type' => 'number',
				'index' => 'solicitud_id',
				'filter_index' => 'main_table.solicitud_id',

			));
		$this->addColumn('name',
			array(
				'header' => Mage::helper('catalog')->__('Nombre de la empresa'),
				'width' => '50px',
				'type' => 'text',
				'index' => 'name',
				'filter_index' => 'name',
			));
		$this->addColumn('rfc',
			array(
				'header' => 'RFC',
				'index' => 'rfc',
				'filter_index' => 'rfc',
				'type' => 'text',
			));
		$this->addColumn('phone',
			array(
				'header' => Mage::helper('catalog')->__('Telephone'),
				'type' => 'number',
				'index' => 'phone',
				'filter_index' => 'phone',

			));
		$this->addColumn('aceptada',
			array(
				'header' => 'Estado de solicitud',
				'type' => 'text',
				'index' => 'aceptada',
				'filter_index' => 'aceptada',

			));
		$this->addColumn('wholesaler_name',
			array(
				'header' => 'Nombre del solicitante',
				'type' => 'text',
				'index' => 'wholesaler_name',
				'filter_index' => 'wholesaler_name',
			));
		$this->addColumn('wholesaler_lastname',
			array(
				'header' => 'Apellido del solicitante',
				'type' => 'text',
				'index' => 'wholesaler_lastname',
			));
		$this->addColumn('correo',
			array(
				'header' => 'Correo del solicitante',
				'type' => 'text',
				'index' => 'correo',
				'filter_index' => 'correo',
			));
		$this->addColumn('created_at',
			array(
				'header' => 'Fecha de la solicitud',
				'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
				'type' => 'datetime',
				'index' => 'created_at',
			));

		$this->addExportType('*/*/exportCsv', Mage::helper('customer')->__('CSV'));
		return Mage_Adminhtml_Block_Widget_Grid::_prepareColumns();
	}

	/**
	 * Esta función es para que el ajax no recargue la página dos veces dentro del html
	 */
	public function getGridUrl() {
		return $this->getUrl('*/*/grid', array('_current' => true));
	}

	protected function _prepareMassaction() {
		$this->setMassactionIdField('solicutd_id');
		$this->getMassactionBlock()->setFormFieldName('solicitud_id');
		$this->getMassactionBlock()->addItem('aceptar', array(
			'label' => 'Aceptar solicitud',
			'url' => $this->getUrl('*/*/massAccept', array('' => '')), // public function massAcceptAction() in SolicitudController.
			'confirm' => Mage::helper('distribuidor')->__('¿Está seguro de borrar estos elementos?'),
		));

		return $this;

	}
	/**
	 *
	 */
	public function getRowUrl($row) {
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}

}