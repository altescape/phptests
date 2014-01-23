<?php
/**
 * Created by: michaelwatts
 * Date: 16/09/2013
 * Time: 21:22
 *
 * Method chaining using using traditional methods
 * but at least we can see the documentation and have autocomplete
 */

namespace MethodChaining\Email2;

class Email
{
    private $from;
    private $to = array();
    private $subject;
    private $body;

    public static function connection()
    {
        echo "Connecting to email system... \n";
        return new self;
    }

    public function send()
    {
        $toCollection = implode(', ', $this->to);
        echo "Sending email 2...            \n" .
             "To:       {$toCollection}     \n" .
             "From:     {$this->from}       \n" .
             "Subject:  {$this->subject}    \n" .
             "Body:     {$this->body}       \n\n";
    }

    /**
     * @param $body
     * @return $this
     */
    public function body($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param $subject
     * @return $this
     */
    public function subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param $to
     * @return $this
     */
    public function to($to)
    {
        array_push($this->to, $to);
        return $this;
    }


}