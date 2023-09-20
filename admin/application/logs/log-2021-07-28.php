<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-28 05:30:48 --> Severity: Compile Error --> Cannot redeclare User_model::get_scantypes() C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 594
ERROR - 2021-07-28 06:00:39 --> Query error: Unknown column 'registration_time' in 'field list' - Invalid query: INSERT INTO `app_patient` (`name`, `phone`, `email`, `hospital_id`, `add_date`, `registration_time`) VALUES ('Rajesh', '8072059796', 'raj@gmail.com', 'app_patient', '07/28/21', 1627452039)
ERROR - 2021-07-28 12:41:03 --> Severity: Compile Error --> Cannot redeclare User::scantypes_post() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1999
ERROR - 2021-07-28 12:48:07 --> Query error: Unknown column 'user_id' in 'field list' - Invalid query: INSERT INTO `appointment` (`user_id`, `vaccine_status`, `vaccine_type`, `date`, `time`) VALUES ('1', 'sample', 'dose1', '24-07-2012', '01:10')
ERROR - 2021-07-28 12:49:56 --> Query error: Unknown column 'user_id' in 'field list' - Invalid query: INSERT INTO `appointment` (`user_id`, `vaccine_status`, `vaccine_type`, `date`, `time`) VALUES ('1', 'sample', 'dose1', '24-07-2012', '01:10')
ERROR - 2021-07-28 12:50:09 --> Severity: Warning --> Cannot use a scalar value as an array C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 614
