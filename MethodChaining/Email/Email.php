<?php
/**
 * Created by JetBrains PhpStorm.
 * User: michaelwatts
 * Date: 16/09/2013
 * Time: 21:22
 *
 * Method chaining using __call
 */

namespace MethodChaining\Email;

class Email
{
    private $from;
    private $to = array();
    private $subject;
    private $body;

    public function send()
    {
        $toCollection = implode(', ', $this->to);
        echo "Sending email 1...        \n" .
            "To:       {$toCollection}  \n" .
            "From:     {$this->from}    \n" .
            "Subject:  {$this->subject} \n" .
            "Body:     {$this->body}    \n\n";
    }

    function __call($name, $arguments)
    {
        if (substr($name, 0, 4) == "set_") {
            $property = substr($name, 4);
            $this->$property = $arguments[0];
        } elseif (substr($name, 0, 4) == 'add_') {
            $property = substr($name, 4);
            array_push($this->$property, $arguments[0]);
        }
        return $this;
    }

}