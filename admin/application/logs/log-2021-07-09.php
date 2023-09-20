<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-09 05:24:15 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 553
ERROR - 2021-07-09 05:24:15 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 553
ERROR - 2021-07-09 05:24:15 --> Severity: Notice --> Undefined property: User::$Array C:\xampp\htdocs\multi_hos_api\system\core\Model.php 77
ERROR - 2021-07-09 05:24:15 --> Severity: Notice --> Indirect modification of overloaded property User_model::$Array has no effect C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 553
ERROR - 2021-07-09 05:24:15 --> Severity: Notice --> Undefined index: patientname C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 292
ERROR - 2021-07-09 05:24:15 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\multi_hos_api\system\core\Exceptions.php:271) C:\xampp\htdocs\multi_hos_api\system\core\Common.php 570
ERROR - 2021-07-09 05:25:26 --> Severity: Notice --> Undefined variable: doctor C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 552
ERROR - 2021-07-09 05:41:21 --> Severity: Notice --> Undefined property: User::$doctor_model C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 552
ERROR - 2021-07-09 05:41:21 --> Severity: error --> Exception: Call to a member function get_doctor() on null C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 552
ERROR - 2021-07-09 05:42:37 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 597
ERROR - 2021-07-09 07:01:06 --> Severity: error --> Exception: syntax error, unexpected ')' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 327
ERROR - 2021-07-09 07:06:25 --> Query error: Unknown column 'appointment_id' in 'field list' - Invalid query: INSERT INTO `appointment` (`patient`, `hospital_id`, `type`, `amount`, `status`, `patientname`, `date`, `appointment_id`) VALUES ('2', '465', 'MRI', '200', 'payment_pending', 'Raja', 1620259200, 92)
ERROR - 2021-07-09 07:08:53 --> Query error: Duplicate entry '2' for key 'PRIMARY' - Invalid query: INSERT INTO `patient` (`id`, `img_url`, `name`, `email`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`, `ion_user_id`, `patient_id`, `add_date`, `registration_time`, `how_added`, `hospital_id`) VALUES ('2', NULL, 'Raja', 'Raja@4352.com', NULL, '23 Greams road', '4352', 'Male', '14-03-1974', NULL, 'B-', '827', '671256', '06/28/21', '1624856511', NULL, '466')
ERROR - 2021-07-09 08:06:53 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1745
ERROR - 2021-07-09 08:13:43 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1747
ERROR - 2021-07-09 09:19:56 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1746
ERROR - 2021-07-09 09:22:44 --> Severity: Warning --> strtotime() expects parameter 1 to be string, array given C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1747
ERROR - 2021-07-09 09:23:13 --> Severity: Notice --> Undefined index: date C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1747
ERROR - 2021-07-09 09:32:42 --> Severity: error --> Exception: Call to undefined method User_model::reset_query() C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 519
ERROR - 2021-07-09 09:58:31 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `name` as `user_name`, `img_url` as `profile_image`, `email`, `mobile`, `birthdate`, `age`, `sex` as `gender`, `bloodgroup`, `address`, `phone` as `mobile`
FROM `patient`
WHERE `id` = '2'
ERROR - 2021-07-09 10:01:32 --> Severity: Notice --> Undefined index: date_of_birth C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1817
ERROR - 2021-07-09 10:20:15 --> Severity: Notice --> Undefined index: patient_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 338
ERROR - 2021-07-09 10:34:24 --> Severity: Notice --> Undefined variable: query C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 336
ERROR - 2021-07-09 11:00:51 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 351
ERROR - 2021-07-09 11:09:21 --> Query error: Unknown column 'patient' in 'field list' - Invalid query: INSERT INTO `patient` (`patient`, `hospital_id`, `type`, `amount`, `status`, `patientname`, `date`, `appointment_id`) VALUES ('5', '487', 'MRI', '200', 'payment_pending', 'Mr.Rajesh', 1620259200, 135)
ERROR - 2021-07-09 11:40:36 --> Severity: error --> Exception: syntax error, unexpected '=', expecting ')' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 377
ERROR - 2021-07-09 11:40:52 --> Severity: error --> Exception: syntax error, unexpected ')', expecting '(' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 377
ERROR - 2021-07-09 11:50:06 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 347
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:23 --> Severity: Warning --> Illegal string offset 'hospital_id' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 11:50:52 --> Severity: Notice --> Undefined index: patient_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 343
ERROR - 2021-07-09 11:50:52 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 11:53:38 --> Severity: Notice --> Undefined index: patient_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 343
ERROR - 2021-07-09 11:53:38 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 11:53:50 --> Severity: Notice --> Trying to get property 'patient_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 343
ERROR - 2021-07-09 11:53:50 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 11:54:00 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Undefined index: patient_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 343
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:38 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Trying to get property 'patient_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 343
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:49 --> Severity: Notice --> Trying to get property 'hospital_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 11:54:57 --> Severity: Notice --> Trying to get property 'patient_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 343
ERROR - 2021-07-09 11:54:57 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 346
ERROR - 2021-07-09 12:00:33 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 338
ERROR - 2021-07-09 12:00:38 --> Severity: Compile Error --> Cannot use [] for reading C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 338
ERROR - 2021-07-09 12:01:13 --> Severity: Notice --> Trying to get property 'patient_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 344
ERROR - 2021-07-09 12:01:13 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 347
ERROR - 2021-07-09 12:01:27 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 347
ERROR - 2021-07-09 12:03:42 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 358
ERROR - 2021-07-09 12:03:48 --> Severity: Notice --> Trying to get property 'patient_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 352
ERROR - 2021-07-09 12:05:26 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 351
ERROR - 2021-07-09 12:05:26 --> Severity: Notice --> Undefined variable:  C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 351
ERROR - 2021-07-09 12:05:26 --> Severity: Notice --> Trying to get property 'patient_id' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 351
ERROR - 2021-07-09 12:15:33 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\multi_hos_api\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-07-09 12:15:33 --> Unable to connect to the database
ERROR - 2021-07-09 12:16:14 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 359
ERROR - 2021-07-09 12:16:27 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 359
ERROR - 2021-07-09 12:19:46 --> Severity: error --> Exception: syntax error, unexpected 'var_dump' (T_STRING) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 350
ERROR - 2021-07-09 12:28:01 --> Severity: Notice --> Undefined index: patient_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 348
ERROR - 2021-07-09 12:28:01 --> Severity: Notice --> Undefined index: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 349
ERROR - 2021-07-09 12:28:01 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 352
ERROR - 2021-07-09 12:28:01 --> Severity: Notice --> Undefined variable: Array C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 352
ERROR - 2021-07-09 12:28:18 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 352
ERROR - 2021-07-09 12:28:18 --> Severity: Notice --> Undefined variable: Array C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 352
ERROR - 2021-07-09 12:57:05 --> Severity: error --> Exception: syntax error, unexpected ';' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 359
ERROR - 2021-07-09 13:12:11 --> Severity: Notice --> Undefined variable: hospital_id C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 337
ERROR - 2021-07-09 13:12:49 --> Severity: error --> Exception: syntax error, unexpected ';', expecting ')' C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 337
ERROR - 2021-07-09 13:20:56 --> Severity: Warning --> var_dump() expects at least 1 parameter, 0 given C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 345
ERROR - 2021-07-09 13:26:03 --> Severity: Notice --> Undefined variable: sam C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 359
ERROR - 2021-07-09 13:26:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 359
ERROR - 2021-07-09 13:26:03 --> Severity: Notice --> Undefined variable: patient C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 394
