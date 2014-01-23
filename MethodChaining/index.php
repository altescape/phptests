<?php

namespace MethodChaining;
use MethodChaining\Email\Email;
require 'Email/Email.php';

/**
 * Shorter class but no indication of methods we can use
 * This method does not allow auto-completion by IDE
 */
$my_email = new Email();
$my_email
    ->set_from('my@email.com')
    ->add_to('programming@gmail.com')
    ->add_to('is@gmail.com')
    ->add_to('fun@gmail.com')
    ->set_subject('Methods Chained')
    ->set_body('Some long message')
    ->send();


namespace MethodChaining;
use MethodChaining\Email2\Email as Email2;
require 'Email2/Email.php';

/**
 * Longer class but at least we have an idea of what methods we can use
 * and IDE provides us with auto-complete
 */
$my_email2 = new Email2();
$my_email2::connection()
    ->from('from@gmail.com')
    ->to('to1@gmail.com')
    ->to('to2@gmail.com')
    ->to('to3@gmail.com')
    ->subject('Methods chaining with traditional way')
    ->body('A long message')
    ->send();