<?php

require 'class.scrape.php';

/**
 * Options as json string
 * Can be an actual json file perhaps
 */
$options = json_decode('
  {
    "CURLOPT_RETURNTRANSFER": true,
    "CURLOPT_FOLLOWLOCATION": true,
    "CURLOPT_AUTOREFERER": true,
    "CURLOPT_CONNECTTIMEOUT": 120,
    "CURLOPT_TIMEOUT":120,
    "CURLOPT_MAXREDIRS":10,
    "CURLOPT_USERAGENT": "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",
    "CURLOPT_URL": "http://www.teehanlax.com/story/medium/"
  }', true);

/**
 * Create new Curl object and set options parameter from json
 */
$report = new Scrape($options);

/**
 * echo scrape_between member function
 */
echo $report->scrape_between('<div id="page-container">', '<div class="site-width">');


