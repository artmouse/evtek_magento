<?php

/**
 *
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Manage_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	/**
	 * MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Manage_Grid constructor.
	 */
	function __construct() {
		parent::__construct();
		$this->setId('id');
		$this->setDefaultSort('id');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}

	/**
	 * @return mixed
	 */
	protected function _prepareCollection() {
		$collection = Mage::getModel('distribuidor/empresa')->getCollection();
		$collection->getSelect()->group('main_table.empresa_id');
		$this->setCollection($collection);

		return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
	}

	/**
	 * @return $this
	 */
	protected function _prepareColumns() {

		$this->addColumn('empresa_id',
			array(
				'header' => Mage::helper('catalog')->__('ID'),
				'width' => '50px',
				'type' => 'number',
				'index' => 'empresa_id',
				'filter_index' => 'main_table.empresa_id',

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
		$this->addColumn('activo',
			array(
				'header' => 'Estado de la empresa',
				'type' => 'text',
				'index' => 'activo',
				'filter_index' => 'activo',

			));
		$this->addColumn('admin_name',
			array(
				'header' => 'Nombre del administrador',
				'type' => 'text',
				'index' => 'admin_name',
				'filter_index' => 'admin_name',
			));
		$this->addColumn('admin_lastname',
			array(
				'header' => 'Apellido del administrador',
				'type' => 'text',
				'index' => 'admin_lastname',
			));
		$this->addColumn('admin_correo',
			array(
				'header' => 'Correo del administrador',
				'type' => 'text',
				'index' => 'admin_correo',
				'filter_index' => 'admin_correo',
			));
		$this->addColumn('created_at',
			array(
				'header' => 'Fecha de creación',
				'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
				'type' => 'datetime',
				'index' => 'created_at',
			));

		$this->addExportType('*/*/exportCsv', Mage::helper('customer')->__('CSV'));
		return Mage_Adminhtml_Block_Widget_Grid::_prepareColumns();
	}

	/**
	 * Esta función es para que el ajax no recargue la página dos veces dentro del html
	 * @return string
	 */
	public function getGridUrl() {
		return $this->getUrl('*/*/grid', array('_current' => true));
	}

	/**
	 * Url para edit de solicitud
	 * @return string
	 */
	public function getRowUrl($row) {
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}