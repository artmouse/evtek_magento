<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade cambia el created a tipo timestamp
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->modifyColumn($this->getTable('distribuidor/solicitud'), 'created_at', 'timestamp');
$installer->endSetup();

?>