<?php
/**
 * @category KamikazeLab
 * @package  Proveedores.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade cambia el pais a default méxico
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->modifyColumn($this->getTable('distribuidor/empresa'), 'solicitud_id', 'int(11) DEFAULT NULL ');
$installer->endSetup();

?>