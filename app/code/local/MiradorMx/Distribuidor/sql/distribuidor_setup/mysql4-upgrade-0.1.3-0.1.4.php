<?php
/**
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade agrega modifica el default del atributo aceptada
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->modifyColumn($this->getTable('distribuidor/solicitud'), 'aceptada', 'varchar(255) NOT NULL default "Nueva"');
$installer->endSetup();
 
?>