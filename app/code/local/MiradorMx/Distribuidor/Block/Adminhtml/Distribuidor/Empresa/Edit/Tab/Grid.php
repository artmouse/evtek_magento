<?php

/**
 * MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tab_Grid
 * @category MiradadorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Tab_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	/**
	 *
	 */
	function __construct() {
		parent::__construct();
		$this->setId('direccionGrid');
		$this->setUseAjax(true); // Using ajax grid is important
		$this->setDefaultSort('direccion_id');
		$this->setSaveParametersInSession(false);

	}

	/**
	 *
	 */
	protected function _prepareCollection() {
		$id = $this->getRequest()->getParam('id');
		$collection = Mage::getModel('distribuidor/direccion')->getCollection();
		$collection->addFieldToSelect('*')
			->addFieldToFilter('empresa', $id);
		$this->setCollection($collection);

		return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
	}

	/**
	 *
	 */
	protected function _prepareColumns() {

		$this->addColumn('direccion_id',
			array(
				'header' => Mage::helper('catalog')->__('ID'),
				'width' => '50px',
				'type' => 'number',
				'index' => 'direccion_id',
				'filter_index' => 'main_table.direccion_id',

			));
		$this->addColumn('calle_avenida',
			array(
				'header' => 'Calle/avenida',
				'type' => 'text',
				'index' => 'calle_avenida',
				'filter_index' => 'main_table.calle_avenida',

			));
		$this->addColumn('numero_calle',
			array(
				'header' => 'Número calle',
				'type' => 'text',
				'index' => 'numero_calle',
				'filter_index' => 'main_table.numero_calle',

			));
		$this->addColumn('numero_interior',
			array(
				'header' => 'Númerp interior',
				'type' => 'text',
				'index' => 'numero_interior',
				'filter_index' => 'main_table.numero_interior',

			));
		$this->addColumn('delegacion_municipio',
			array(
				'header' => 'Delegación/Municipio',
				'type' => 'text',
				'index' => 'delegacion_municipio',
				'filter_index' => 'main_table.delegacion_municipio',

			));
		$this->addColumn('estado',
			array(
				'header' => 'Estado',
				'type' => 'text',
				'index' => 'estado',
				'filter_index' => 'main_table.estado',

			));
		$this->addColumn('pais',
			array(
				'header' => 'País',
				'type' => 'text',
				'index' => 'pais',
				'filter_index' => 'main_table.pais',

			));
		$this->addColumn('codigo_postal',
			array(
				'header' => 'Código Postal',
				'type' => 'text',
				'index' => 'codigo_postal',
				'filter_index' => 'main_table.codigo_postal',

			));
		$this->addColumn('tipo',
			array(
				'header' => 'Tipo',
				'type' => 'text',
				'index' => 'tipo',
				'filter_index' => 'main_table.tipo',

			));

		return Mage_Adminhtml_Block_Widget_Grid::_prepareColumns();

	}

	/**
	 * Esta función es para que el ajax no recargue la página dos veces dentro del html
	 * @return string
	 */
	public function getGridUrl() {
		return $this->_getData('grid_url') ? $this->_getData('grid_url') : $this->getUrl('*/*/direccionesGrid', array('_current' => true));
	}
	/**
	 * NO hace ni madres
	 */
	public function direcciones() {
		//esta pinche funcion no hace ni madres. Pero si la quito no funciona.
	}

	public function getRowUrl($row) {
		return $this->getUrl('*/*/editDireccion', array(
			'empresa_id' => $this->getRequest()->getParam('id'),
			'id' => $row->getId())
		);
	}

}