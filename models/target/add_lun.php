<?php
/**
 * Documentation for the add_lun() function
 *
 * 07.10.2015
 * Added
 *
 */

use phpietadmin\app\models\target;

// require the class
require_once __DIR__ . '/../registry.php';

// Create object
$target = new target\Target('iqn.2014-12.com.example.iscsi:test1');

// @param   string  $type  fileio/blockio
// @param   string  $mode  wt/ro
$target->add_lun('/dev/VG_data01/test2', 'wt', 'fileio');

print_r($target->logging->get_action_result());

// example failure:
/*
Array
(
    [message] => The lun /dev/VG_System/test2 is already in use by target iqn.2014-12.com.example.iscsi:test2
    [code] => 4
    [code_type] => intern
    [method] => phpietadmin\app\models\target\Target::add_lun
)
*/

// example success
/*
Array
(
    [message] => The lun /dev/VG_data01/test2 was successfully added to the target iqn.2014-12.com.example.iscsi:test1
    [code] => 0
    [code_type] => intern
    [method] => phpietadmin\app\models\target\Target::add_lun
)
*/