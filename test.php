<?php
use Word\action;

require 'vendor/autoload.php';
$class = new action();
$class->setLoadPath('./test.docx');
$res = $class->getHtml();
print_r($res);

