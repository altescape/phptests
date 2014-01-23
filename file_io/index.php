<?php
/**
 * Created: michaelwatts
 * Date: 11/12/2013
 * Time: 22:38
 */

$file = 'in.json';
// The new person to add to the file

$form_data = array(
  "name" => $_POST['name'],
  "email" => $_POST['email']
);
$data = json_encode($form_data,JSON_PRETTY_PRINT);

//$filename = 'in.json';
//$somecontent = $data;
//
//// Let's make sure the file exists and is writable first.
//if (is_writable($filename)) {
//
//  // In our example we're opening $filename in append mode.
//  // The file pointer is at the bottom of the file hence
//  // that's where $somecontent will go when we fwrite() it.
//  if (!$handle = fopen($filename, 'a')) {
//    echo "Cannot open file ($filename)";
//    exit;
//  }
//
//  // Write $somecontent to our opened file.
//  if (fwrite($handle, $somecontent . ",") === FALSE) {
//    echo "Cannot write to file ($filename)";
//    exit;
//  }
//
//  echo "Success, wrote ($somecontent) to file ($filename)";
//
//  fclose($handle);
//
//} else {
//  echo "The file $filename is not writable";
//}

// Write the contents to the file,
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
