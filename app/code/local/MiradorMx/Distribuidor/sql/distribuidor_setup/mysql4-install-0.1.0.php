<?php
/**
 * @author Mariana Valdivia
 * Setup para distribuidores.
 * Se agrega modelo solicitud
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('distribuidor/solicitud'))
	->addColumn('solicitud_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity' => true,
		'nullable' => false,
		'primary' => true,
		'unsigned' => true,
	), 'Id de la Solicitud')
	->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
	), 'Nombre de la empresa')
	->addColumn('url', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true,
	), 'Url de la empresa')
	->addColumn('phone', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
	), 'Telefono de la empresa')
	->addColumn('rfc', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Rfc de la empresa')
	->addColumn('aceptada', Varien_Db_Ddl_Table::TYPE_INTEGER, 1, array(
		'nullable' => false,
	), 'Si la empresa fue aceptada')
	->addColumn('correo', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Correo del solicitante')
	->addColumn('wholesaler_name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'nombre del solicitante')
	->addColumn('wholesaler_lastname', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'apellido del solicitante')
	->addColumn('mensaje', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'mesaje del solicitante')
	->addColumn('observacion', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'observaciones')
	->addColumn('empresa_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => true,
	), 'Id de la empresa')
	->setComment('Tabla de solicitudes');
$installer->getConnection()->createTable($table);
$installer->endSetup();

?>