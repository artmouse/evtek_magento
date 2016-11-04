<?php
/**
 * @category MiradorMx
 * @package  MiradorMx_Distribuidor.
 * @author   Mariana Valdivia
 * Upgrade. Este upgrade agrega al model solicitud el atributo created_at
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addColumn($this->getTable('distribuidor/solicitud'), 'created_at', 'datetime');
$installer->endSetup();

?>