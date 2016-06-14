<?php

include_once "vendor/autoload.php";

$class = 'diversen\markdownDocs';
include_once "./markdownDocs.php";
$t = new \diversen\markdownDocs();
$t->classToMD($class);
echo $t->getOutput();
