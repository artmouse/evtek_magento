<?php
/**
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade agrega al model solicitud el atributo created_at
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->modifyColumn($this->getTable('distribuidor/solicitud'), 'aceptada', 'varchar(255) NOT NULL default "No aceptada"');
$installer->endSetup();

?>