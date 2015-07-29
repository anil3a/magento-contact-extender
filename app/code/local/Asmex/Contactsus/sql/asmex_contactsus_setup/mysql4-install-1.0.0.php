<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2015 Asmex. (http://www.asmex.com.au)
 */

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('contactsusemail')};

CREATE TABLE IF NOT EXISTS {$this->getTable('contactsusemail')} (
  `contactemails_id` bigint(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

");

$installer->endSetup(); 