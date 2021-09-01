<?php
require('Word/action.php');
$class = new \Word\action();
$class->setPath('./test.docx');
$res = $class->handle();
echo $res;
return 123;

