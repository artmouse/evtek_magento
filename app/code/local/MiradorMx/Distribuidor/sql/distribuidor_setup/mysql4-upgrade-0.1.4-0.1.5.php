<?php
/**
 * @author Mariana Valdivia
 * Setup para distribuidores.
 * Se agrega modelo empresa
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('distribuidor/empresa'))
	->addColumn('empresa_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
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
	->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Telefono de la empresa')
	->addColumn('rfc', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Rfc de la empresa')
	->addColumn('admin_correo', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'Correo del admin de la empresa')
	->addColumn('admin_name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'nombre del admin de la empresa')
	->addColumn('admin_lastname', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => false,
	), 'apellido del admin de la empresa')
	->addColumn('solicitud_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => false,
	), 'Id de la empresa')
	->addColumn('calle_avenida', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'calle_avenida de la empresa')
	->addColumn('numero_calle', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'calle_avenida de la empresa')
	->addColumn('delegacion_municipio', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'delegacion_municipio de la empresa')
	->addColumn('estado', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'estado de la empresa')
	->addColumn('pais', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'pais de la empresa')
	->addColumn('codigo_postal', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable' => true,
	), 'CP de la empresa')
	->addColumn('sector', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
	), 'sector de la empresa')
	->setComment('Tabla de empresas');
$installer->getConnection()->createTable($table);
$installer->endSetup();

?>