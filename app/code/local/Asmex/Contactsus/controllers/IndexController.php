<?php
/**
 * Asmex
 *
 * @category   Asmex
 * @package    Asmex_Contactsus
 * @author     Anil Prajapati <anilprz3@gmail.com>
 * @copyright  Copyright (c) 2015 Asmex. (http://www.asmex.com.au)
 */

require_once Mage::getModuleDir('controllers', "Mage_Contacts").DS."IndexController.php";

class Asmex_Contactsus_IndexController extends Mage_Contacts_IndexController
{
    public function preDispatch()
    {
        parent::preDispatch();
        if( !Mage::getStoreConfigFlag(self::XML_PATH_ENABLED) ) {
            $this->norouteAction();
        }
    }

    public function indexAction()
    {
       parent::indexAction();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ( $post ) {
            $translate = Mage::getSingleton('core/translate');
            /* @var $translate Mage_Core_Model_Translate */
            $translate->setTranslateInline(false);
            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);
                
                
                
                $model = Mage::getModel('contactsus/contactsus');
                
                $contact_form_data = $model->setDataTemplateForStoring($post);
                
                $isSaveEnabled = Mage::getStoreConfig('contactsus/general/enable_save');
                
                if($isSaveEnabled){
                    try {
                        $model->setData( array( 'email' => $contact_form_data['customer_email'], 'message' => $contact_form_data['message'] ) );
                        $model->setCreatedTime(now());
                        $model->save();
                    } catch (Exception $e) {
                        Mage::log(json_encode($post), null, 'contactus.log');
                        Mage::log($e->getMessage(), null, 'contactus.log');
                    }
                }

                $error = false;

                if (!Zend_Validate::is(trim($post['name']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['comment']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    $error = true;
                }

                if (Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                    $error = true;
                }

                if ($error) {
                    Mage::log('Form data Error', null, 'contactus.log');
                    throw new Exception();
                }

		if( !empty( trim($post['email_template'])) ) {
                        $templateId = $post['email_template'];
                } else {
                        $templateId = Mage::getStoreConfig(self::XML_PATH_EMAIL_TEMPLATE);
                }

                $mailTemplate = Mage::getModel('core/email_template');
                /* @var $mailTemplate Mage_Core_Model_Email_Template */
                $mailTemplate->setDesignConfig(array('area' => 'frontend'))
                    ->setReplyTo($post['email'])
                    ->sendTransactional(
                        $templateId,
                        Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER),
                        explode(',', Mage::getStoreConfig(self::XML_PATH_EMAIL_RECIPIENT)),
                        null,
                        array('data' => $postObject)
                    );

                if (!$mailTemplate->getSentSuccess()) {
                    Mage::log('Form Sent not Success', null, 'contactus.log');
                    throw new Exception();
                }

                $translate->setTranslateInline(true);

                Mage::getSingleton('customer/session')->addSuccess(Mage::helper('contacts')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
                //$this->_redirect('*/*/');
		header("Location: " . $_SERVER["HTTP_REFERER"]); exit;
                return;
            } catch (Exception $e) {
                
                Mage::log($e->getMessage(), null, 'contactus.log');
                
                $translate->setTranslateInline(true);

                Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('Unable to submit your request. Please, try again later'));
                //$this->_redirect('*/*/');
		header("Location: " . $_SERVER["HTTP_REFERER"]); exit;
                return;
            }

        } else {
            //$this->_redirect('*/*/');
	    header("Location: " . $_SERVER["HTTP_REFERER"]); exit;
        }
    }
    

}

