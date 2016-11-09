<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade cambia el pais a default méxico
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->dropColumn($this->getTable('distribuidor/direccion'), 'empresa_id');
$installer->endSetup();

?>