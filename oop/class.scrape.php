<?php
/**
 * User: michaelwatts
 * Date: 25/05/2013
 * Time: 22:04
 */


class Scrape
{

    private $return_transfer = true;
    private $follow_location = true;
    private $auto_referrer = true;
    private $connect_timeout = 120;
    private $timeout = 120;
    private $max_redirs = 10;
    private $useragent = 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8';
    private $url = 'http://bbc.co.uk/news/';

    /**
     * @param $options
     */
    private function options($options)
    {
        /*
          OPTIONS

          Options are loaded through from json file

          Format for json:
            {
              "CURLOPT_RETURNTRANSFER": true,
              "CURLOPT_CONNECTTIMEOUT": 33,
              "CURLOPT_URL"           : "http://www.itv.com/news/"
            }
        */

        $this->return_transfer = isset($options['CURLOPT_RETURNTRANSFER']) ? true : false;
        $this->follow_location = isset($options['CURLOPT_FOLLOWLOCATION']) ? true : false;
        $this->auto_referrer = isset($options['CURLOPT_AUTOREFERER']) ? true : false;
        if (isset($options['CURLOPT_CONNECTTIMEOUT'])) {
            $this->connect_timeout = $options['CURLOPT_CONNECTTIMEOUT'];
        }
        if (isset($options['CURLOPT_TIMEOUT'])) {
            $this->timeout = $options['CURLOPT_TIMEOUT'];
        }
        if (isset($options['CURLOPT_MAXREDIRS'])) {
            $this->max_redirs = $options['CURLOPT_MAXREDIRS'];
        }
        if (isset($options['CURLOPT_USERAGENT'])) {
            $this->useragent = $options['CURLOPT_USERAGENT'];
        }
        if (isset($options['CURLOPT_URL'])) {
            $this->url = $options['CURLOPT_URL'];
        }
    }

    /**
     * @return mixed
     * Standard curl function
     */
    private function curl()
    {
        $options = Array(
            CURLOPT_RETURNTRANSFER => $this->return_transfer,
            CURLOPT_FOLLOWLOCATION => $this->follow_location,
            CURLOPT_AUTOREFERER => $this->auto_referrer,
            CURLOPT_CONNECTTIMEOUT => $this->connect_timeout,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_MAXREDIRS => $this->max_redirs,
            CURLOPT_USERAGENT => $this->useragent,
            CURLOPT_URL => $this->url
        );
        $a = curl_init();
        curl_setopt_array($a, $options);
        $data = curl_exec($a);
        curl_close($a);
        return $data;
    }

    /**
     *
     * @param $start
     * start of the html you want to scrape between
     *
     * @param $end
     * end of the html you want to scrape between
     *
     * @return string
     * returns all the html between $start, $end
     *
     */
    public function scrape_between($start, $end)
    {
        $data = $this->curl();
        $data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start)); // Stripping $start
        $stop = stripos($data, $end); // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop); // Stripping all data from after and including the $end of the data to scrape
        return $data; // Returning the scraped data from the function
    }

    public function __construct($options)
    {
        // set the options
        $this->options($options);
        $this->curl();
    }

    /*
     THE BELOW FUNCTIONS ARE FOR DEBUGGING PURPOSES ONLY
    */
    // debug function
    public function report_options()
    {
        echo $this->return_transfer;
        echo '<br>';
        echo $this->timeout;
        echo '<br>';
        echo $this->url;
    }

    // debug function
    /**
     * @param $start
     * @param $end
     */
    public function report_url($start, $end)
    {
        echo $this->scrape_between($start, $end);
    }

}