<?php
/**
 * @author Mariana Valdivia
 * Setup para distribuidores.
 * Se agrega modelo direccion para empresas.
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('distribuidor/direccion'))
	->addColumn('direccion_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		'unsigned' => true,
	), 'Id de la direccion')
	->addColumn('empresa_id', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
	), 'Id de la empresa')
	->addColumn('calle_avenida', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'calle_avenida de la empresa')
	->addColumn('numero_calle', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'calle_avenida de la empresa')
	->addColumn('numero_interior', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'Número interior de la empresa')
	->addColumn('delegacion_municipio', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'delegacion_municipio de la empresa')
	->addColumn('estado', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'estado de la empresa')
	->addColumn('pais', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
		'default' => 'Mexico',
	), 'pais de la empresa')
	->addColumn('codigo_postal', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
	), 'CP de la empresa')
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		'nullable' => false,
	), 'Creado en')
	->setComment('Tabla de direcciones');
$installer->getConnection()->createTable($table);
$installer->endSetup();

?>