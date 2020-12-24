<?php
/**
 * Volume 1 - Fundamental of FP - Video 3.2
 * Author: @luijar
 * DB helper for video 3.4
 */
declare(strict_types=1);
namespace Vol1\Sect3\Video4;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();

$db->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'rx_samples',
    'username'  => 'root',
    'password'  => 'secret',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$db->setAsGlobal();
$db->bootEloquent();