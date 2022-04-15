<?php

/** @var $router Zend_Controller_Router_Rewrite */
$router->addRoute('person-show', new Zend_Controller_Router_Route(
    '/person/:id',
    array(
        'action'        => 'show',
        'controller'    => 'person'
    ),
    array('id' => '^\d+$')
));

$router->addRoute('person-delete', new Zend_Controller_Router_Route(
    'person/delete/:id',
    array(
        'action'        => 'delete',
        'controller'    => 'person',
    ),
    array('id' => '^\d+$')
));