<?php
namespace App;
require 'vendor/autoload.php';

use App\TestViajes;

$t = new TestViajes;
$res = $t->run();
