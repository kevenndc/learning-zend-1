<?php

/** @var $router Zend_Controller_Router_Rewrite */
$router->addRoute('person', new Zend_Controller_Router_Route(
    '/person/:id',
    array(
        'action'        => 'show',
        'controller'    => 'person'
    ),
    array('id' => '^\d+$')
));