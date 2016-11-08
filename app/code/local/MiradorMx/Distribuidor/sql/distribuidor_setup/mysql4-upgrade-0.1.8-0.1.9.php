<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade cambia el pais a default méxico
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->modifyColumn($this->getTable('distribuidor/empresa'), 'pais', 'varchar(255) NOT NULL DEFAULT "Mexico"');
$installer->endSetup();

?>