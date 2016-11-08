<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade agrega e empresa número interior
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addColumn($this->getTable('distribuidor/empresa'), 'numero_interior', 'varchar(255)');
$installer->endSetup();

?>