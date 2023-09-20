<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-07 07:51:58 --> Severity: error --> Exception: Call to undefined method User_model::get_specailist() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 607
ERROR - 2021-07-07 07:52:05 --> Query error: Unknown column 'name' in 'group statement' - Invalid query: SELECT *
FROM `specialist`
GROUP BY `name`
ERROR - 2021-07-07 08:08:30 --> Severity: Notice --> Undefined variable: sam C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 671
ERROR - 2021-07-07 08:10:08 --> Query error: Unknown column 'amount' in 'field list' - Invalid query: SELECT `id`, `name`, `amount`
FROM `department`
WHERE `hospital_id` = '466'
