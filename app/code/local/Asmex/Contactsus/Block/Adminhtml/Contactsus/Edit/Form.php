<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2013 Asmex. (http://www.asmex.com.au)
 */

class Asmex_Contactsus_Block_Adminhtml_Contactsus_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form(array(
                      'id' => 'edit_form',
                      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                      'method' => 'post',
					  'enctype' => 'multipart/form-data'
                   )
      );

      $form->setUseContainer(true);
      $this->setForm($form);
      return parent::_prepareForm();
  }
}