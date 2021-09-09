<?php
use Word\action;

require 'vendor/autoload.php';
$class = new action();
$class->setPath('./test.docx');
$res = $class->handle();
echo '<pre>';
print_r($res);

