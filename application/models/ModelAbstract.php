<?php

abstract class Application_Model_ModelAbstract
{
    public function __construct(array $properties)
    {
        if (is_array($properties)) {
            $this->setProperties($properties);
        }
    }

    protected function setProperties(array $properties)
    {
        $methods = get_class_methods($this);

        foreach ($properties as $name => $value) {
            $setter = 'set' . ucfirst($name);

            if (in_array($setter, $methods)) {
                $this->$setter($value);
            }
        }
    }
}
