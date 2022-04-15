<?php

class Application_Form_Person extends Zend_Form
{
    public function init()
    {
        $this->setMethod('POST');

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
                new Zend_Validate_StringLength(array(0, 11)),
                new Zend_Validate_Digits(),
            )
        ));

        $this->addElement('text', 'phone', array(
            'label'         => 'Telefone',
            'required'      => true,
            'filters'       => array('Digits'),
            'validators'    => array(
                new Zend_Validate_StringLength(array(0, 12)),
                new Zend_Validate_Digits(),
            )
        ));

        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Insira as 5 letras mostradas abaixo:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));

        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Register person',
        ));

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}

