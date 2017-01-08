<?php
/**
 * @author Mariana Valdivia
 * Setup para distribuidores.
 * Se agrega modelo direccion para empresas.
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('distribuidor/wholesaler'))
	->addColumn('wholesaler_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		'unsigned' => true,
	), 'Id de la direccion')
	->addColumn('empresa_id', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
	), 'Id de la empresa a la que pertenece el wholesaler')
	->addColumn('wholesaler_firstname', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Firstname de wholesaler')
	->addColumn('wholesaler_lastname', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Lastname de wholesaler')
	->addColumn('wholesaler_correo', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'Número interior de la empresa')
	->addColumn('wholesaler_gender', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'Gender del wholesaler')
	->addColumn('wholesaler_password', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'Password del wholesaler')
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		'nullable' => false,
	), 'Creado en')
	->addColumn('activo', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Estado del wholesaler')
	->setComment('Tabla de wholesaler');
$installer->getConnection()->createTable($table);
$installer->endSetup();

?>