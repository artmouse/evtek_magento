<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade cambia el pais a default méxico
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addColumn($this->getTable('distribuidor/direccion'), 'empresa', 'INT(11) NOT NULL');
$installer->endSetup();

?>