<?php

class IndexController extends Zend_Controller_Action
{
    private $logger;

    public function init()
    {
        $this->logger = Zend_Registry::get('logger');
    }

    public function indexAction()
    {
        $dbTable = new Application_Model_DbTable_Address();

        $this->logger->log($dbTable->info(), Zend_Log::DEBUG);
    }


}

