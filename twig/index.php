<?php

require_once '../vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
  'cache' => false,
  'debug' => true,
));

//$template = $twig->loadTemplate('index.html');

//echo $twig->render('index.html', array('the' => 'variables', 'go' => 'here'));

echo $twig->render('index.html', array(
    'the' => 'Arse',
    'go' => 'Chucj',
  )
);

//echo $twig->display('farts.html', array('the' => 'Arse', 'go' => 'Banger'));