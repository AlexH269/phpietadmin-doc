<?php
/**
 * Documentation for the delete_lun() function
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

// @param string $path path to the block device
$target->detach_lun('/dev/VG_data01/test2', true);

print_r($target->logging->get_action_result());

// example output failure
/*
You can override this error by setting the $force option to true
ietd allows you to delete a lun no matter if it has open sessions
For security reasons phpietadmin informs the user
Array
(
    [message] => The target iqn.2014-12.com.example.iscsi:test2 has 1 initiators connected
    [code] => 4
    [code_type] => intern
    [method] => phpietadmin\app\models\target\Target::delete_lun
)

Array
(
    [message] => The lun /dev/VG_data01/test7 is not mapped on this target
    [code] => 3
    [code_type] => intern
    [method] => phpietadmin\app\models\target\Target::delete_lun
)

*/

// example output success
/*
Array
(
    [message] => The lun /dev/VG_data01/test7 was successfully deleted from the target iqn.2014-12.com.example.iscsi:test2
    [code] => 0
    [code_type] => intern
    [method] => phpietadmin\app\models\target\Target::delete_lun
)
*/