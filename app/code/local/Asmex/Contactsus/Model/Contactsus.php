<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2013 Asmex. (http://www.asmex.com.au)
 */
class Asmex_Contactsus_Model_Contactsus extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('contactsus/contactsus');
    }
    
    public function setDataTemplateForStoring( $data = array() ){
        
        if( !empty( $data )){
            
            $storing_data = "";
            
            foreach ( $data as $field => $value ){
                if( $field != 'hideit' ){
                    $storing_data .= "".$field."\n";
                    $storing_data .= "".$value."\n\n";
                }
            }
            return $storing_data;
        }
        return false;
        
    }
    
}