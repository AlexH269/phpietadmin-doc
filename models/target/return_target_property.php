<?php
/**
 * Documentation for the return_target_property() function
 *
 * 08.10.2015
 * Added
 *
 */

use phpietadmin\app\models\target;

// require the class
require_once __DIR__ . '/../registry.php';

// Create object
$target = new target\Target('iqn.2014-12.com.example.iscsi:test2');

$tid = $target->return_target_property('tid');

// example success:
/*
string(1) "1"
*/

$session = $target->return_target_property('session');

// example success:
/*
Array
(
    [0] => Array
        (
            [sid] => 562950876233792
            [initiator] => iqn.1991-05.com.microsoft:edv-03-neu.lra.local
            [cid] => 1
            [ip] => 10.126.78.177
            [state] => active
            [hd] => none
            [dd] => none
        )

)
*/