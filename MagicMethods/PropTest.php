<?php
/**
 * Created: michaelwatts
 * Date: 17/09/2013
 * Time: 21:53
 */

class PropTest {

    private $data = array();

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name, $value)
    {
        echo "setting {$name} to {$value}<br>\n";
        $this->data[$name] = $value;
        return $this;
    }

    public function __get($name)
    {
        echo "Getting {$name}<br>\n";
        if (array_key_exists($name, $this->data))
        {
            return $this->data[$name];
        }
        return null;
    }

}

$obj = new PropTest();

$obj->a('this is a')->b('this is b');

echo $obj->a;
echo $obj->b;