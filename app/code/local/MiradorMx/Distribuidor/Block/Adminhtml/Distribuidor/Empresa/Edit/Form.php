<?php
/**
 * Class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Form
 * Form widget para form de edit y new en tabs de empresa
 * @category MiradadorMx
 * @package  MiradorMx_Distribuidor
 * @author   Mariana Valdivia
 */
class MiradorMx_Distribuidor_Block_Adminhtml_Distribuidor_Empresa_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

	/**
	 *
	 */
	protected function _prepareForm() {
		if (Mage::registry('distribuidor_empresa')) {
			$data = Mage::registry('distribuidor_empresa')->getData();
		} else {
			$data = array();
		}
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('empresa_id'))),
			'method' => 'post',
			'enctype' => 'multipart/form-data',
		)
		);
		$form->setUseContainer(true);
		$this->setForm($form);
		$form->setValues($data);
		return parent::_prepareForm();
	}
}
