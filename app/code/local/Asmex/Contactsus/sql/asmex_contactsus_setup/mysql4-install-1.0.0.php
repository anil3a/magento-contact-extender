<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2013 Asmex. (http://www.asmex.com.au)
 */

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('contactsusemail')};
CREATE TABLE {$this->getTable('contactsusemail')} (
                   `qc_id` bigint(20) NOT NULL AUTO_INCREMENT,                   
                   `name` varchar(100) DEFAULT NULL,                             
                   `email` varchar(100) NOT NULL,                                
                   `subject` varchar(255) DEFAULT NULL,                          
                   `phone` varchar(20) DEFAULT NULL,                             
                   `message` text NOT NULL,                                      
                   `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  
                   PRIMARY KEY (`qc_id`)                                         
                 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;   
    ");

$installer->endSetup(); 