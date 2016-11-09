<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade agregra la columna de tipo de dirección.
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addColumn($this->getTable('distribuidor/direccion'), 'tipo', 'VARCHAR(255) NOT NULL DEFAULT "Ninguna"');
$installer->endSetup();

?>