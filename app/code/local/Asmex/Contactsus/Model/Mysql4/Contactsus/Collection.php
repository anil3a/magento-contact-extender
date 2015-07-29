<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2015 Asmex. (http://www.asmex.com.au)
 */

class Asmex_Contactsus_Model_Mysql4_Contactsus_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('contactsus/contactsus');
    }
}