<?php
require('vendor/autoload.php');
use Stichoza\GoogleTranslate\GoogleTranslate;

$string = $_POST['string'];
$from = $_POST['from'];
$to = $_POST['to'];


$tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
$tr->setSource($from); // Translate from English
$tr->setSource(); // Detect language automatically
$tr->setTarget($to); //

echo $tr->translate($string);