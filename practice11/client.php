<?php

require_once 'index11.php';

$m = new Index11(new Model11());
echo '<pre>';
print_r($m->execute());
echo '</pre>';