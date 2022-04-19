<?php

class Application_Form_Person extends Zend_Form_SubForm
{
    public function init()
    {
        $this->addElement('text', 'name', array(
            'label'         => 'O seu nome',
            'required'      => true,
            'validators'    => array(
                  new Zend_Validate_Alpha(true),
            ),
        ));

        $this->addElement('text', 'email', array(
            'label'         => 'O endereço de e-mail',
            'required'      => true,
            'filters'       => array('StringTrim'),
            'validators'    => array(
                'EmailAddress',
            )
        ));

        $this->addElement('text', 'cpf', array(
            'label'         => 'CPF',
            'required'      => true,
            'filters'       => array('Digits'),
            'validators'    => array(
                new Zend_Validate_StringLength(11),
                new Zend_Validate_Digits(),
            )
        ));

        $this->addElement('text', 'phone', array(
            'label'         => 'Telefone',
            'required'      => true,
            'filters'       => array('Digits'),
            'validators'    => array(
                new Zend_Validate_StringLength(11),
                new Zend_Validate_Digits(),
            )
        ));
    }
    
    
}

