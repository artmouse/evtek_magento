<?php
/**
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade agrega al model empresa el atributo created_at y activo
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addColumn($this->getTable('distribuidor/empresa'), 'created_at', 'datetime');
$installer->getConnection()->addColumn($this->getTable('distribuidor/empresa'), 'activo', 'varchar(55) NOT NULL DEFAULT "No activa"');
$installer->endSetup();

?>