<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2013 Asmex. (http://www.asmex.com.au)
 */

class Asmex_Contactsus_Block_Adminhtml_Contactsus extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_contactsus';
    $this->_blockGroup = 'contactsus';
    $this->_headerText = Mage::helper('contactsus')->__('Messages');
    $this->_addButtonLabel = Mage::helper('contactsus')->__('Add Message');

    parent::__construct();
    $this->_removeButton('add');
  }
}