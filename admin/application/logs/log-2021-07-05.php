<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-05 05:54:32 --> Severity: error --> Exception: Call to undefined method User_model::get_user_info() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1665
ERROR - 2021-07-05 06:00:00 --> Severity: Notice --> Undefined variable: patientId C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 23
ERROR - 2021-07-05 06:27:09 --> Query error: Table 'multi_hos.user_info' doesn't exist - Invalid query: UPDATE `user_info` SET `name` = 'mr.snres', `address` = 'bvg', `age` = '01:21', `blood_group` = 'sadnkdsk', `gender` = '466', `img_url` = 'https://localhost/multi_hos_api/assets/images/userprofile/16254664290.png', `dob` = 880588800, `add_img` = 'a:1:{s:7:\"image_0\";s:73:\"https://localhost/multi_hos_api/assets/images/userprofile/16254664290.png\";}'
WHERE `id` = '3'
ERROR - 2021-07-05 06:28:12 --> Severity: error --> Exception: syntax error, unexpected '$date' (T_VARIABLE), expecting function (T_FUNCTION) or const (T_CONST) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 489
ERROR - 2021-07-05 06:28:46 --> Severity: Notice --> Undefined variable: new_picture C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 496
ERROR - 2021-07-05 06:28:46 --> Query error: Table 'multi_hos.user_info' doesn't exist - Invalid query: UPDATE `user_info` SET `name` = 'mr.snres', `address` = 'bvg', `age` = '01:21', `blood_group` = 'sadnkdsk', `gender` = '466', `user_image` = 'https://localhost/multi_hos_api/assets/images/userprofile/20210705062846.jpg', `hide_location` = NULL, `hide_dob` = NULL, `hide_interests` = NULL, `hide_zodiac` = NULL, `add_img` = 'N;'
WHERE `id` = '3'
ERROR - 2021-07-05 06:29:12 --> Query error: Table 'multi_hos.user_info' doesn't exist - Invalid query: UPDATE `user_info` SET `name` = 'mr.snres', `address` = 'bvg', `age` = '01:21', `blood_group` = 'sadnkdsk', `gender` = '466', `user_image` = 'https://localhost/multi_hos_api/assets/images/userprofile/20210705062912.jpg', `hide_location` = NULL, `hide_dob` = NULL, `hide_interests` = NULL, `hide_zodiac` = NULL
WHERE `id` = '3'
ERROR - 2021-07-05 06:29:50 --> Query error: Unknown column 'blood_group' in 'field list' - Invalid query: UPDATE `patient` SET `name` = 'mr.snres', `address` = 'bvg', `age` = '01:21', `blood_group` = 'sadnkdsk', `gender` = '466', `user_image` = 'https://localhost/multi_hos_api/assets/images/userprofile/20210705062950.jpg', `hide_location` = NULL, `hide_dob` = NULL, `hide_interests` = NULL, `hide_zodiac` = NULL
WHERE `id` = '3'
ERROR - 2021-07-05 06:30:21 --> Query error: Unknown column 'gender' in 'field list' - Invalid query: UPDATE `patient` SET `name` = 'mr.snres', `address` = 'bvg', `age` = '01:21', `bloodgroup` = 'sadnkdsk', `gender` = '466', `user_image` = 'https://localhost/multi_hos_api/assets/images/userprofile/20210705063021.jpg'
WHERE `id` = '3'
ERROR - 2021-07-05 06:30:43 --> Query error: Unknown column 'user_image' in 'field list' - Invalid query: UPDATE `patient` SET `name` = 'mr.snres', `address` = 'bvg', `age` = '01:21', `bloodgroup` = 'sadnkdsk', `sex` = '466', `user_image` = 'https://localhost/multi_hos_api/assets/images/userprofile/20210705063043.jpg'
WHERE `id` = '3'
ERROR - 2021-07-05 06:30:55 --> Severity: error --> Exception: Call to undefined method User_model::get_user_info() C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 498
ERROR - 2021-07-05 06:32:16 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) or const (T_CONST) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 512
ERROR - 2021-07-05 06:32:37 --> Severity: Notice --> Undefined index: dob C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 505
ERROR - 2021-07-05 06:32:37 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:32:37 --> Severity: Notice --> Undefined variable: attach C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:33:14 --> Severity: Notice --> Undefined index: dob C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 505
ERROR - 2021-07-05 06:33:14 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:33:14 --> Severity: Notice --> Undefined variable: attach C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:33:27 --> Severity: Notice --> Undefined index: dob C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 505
ERROR - 2021-07-05 06:33:27 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:33:27 --> Severity: Notice --> Undefined variable: attach C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:34:24 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:34:24 --> Severity: Notice --> Undefined variable: attach C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1667
ERROR - 2021-07-05 06:36:27 --> Severity: Notice --> Undefined index: date C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 06:36:44 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 06:58:54 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 06:59:36 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 06:59:45 --> Severity: Notice --> Trying to get property 'birthdate' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 07:10:11 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1670
ERROR - 2021-07-05 07:10:11 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1670
ERROR - 2021-07-05 07:10:11 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1670
ERROR - 2021-07-05 07:36:06 --> Severity: error --> Exception: Call to a member function row() on array C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 499
ERROR - 2021-07-05 07:39:13 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 07:39:21 --> Severity: Notice --> Trying to get property 'birthdate' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 07:40:15 --> Severity: Notice --> Undefined variable: user C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 501
ERROR - 2021-07-05 07:40:53 --> Severity: Notice --> Trying to get property 'birthdate' of non-object C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 07:41:01 --> Severity: Notice --> Undefined index: birthdate C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1668
ERROR - 2021-07-05 07:43:51 --> Severity: Notice --> Undefined variable: sam C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1675
ERROR - 2021-07-05 07:45:31 --> 404 Page Not Found: /index
ERROR - 2021-07-05 07:53:15 --> Severity: error --> Exception: Call to undefined method User_model::edit_patient_check() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 1653
ERROR - 2021-07-05 10:57:45 --> 404 Page Not Found: /index
ERROR - 2021-07-05 11:20:34 --> 404 Page Not Found: /index
ERROR - 2021-07-05 11:26:43 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:26:43 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:26:43 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:26:43 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:26:43 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:26:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\multi_hos_api\system\core\Exceptions.php:271) C:\xampp\htdocs\multi_hos_api\system\core\Common.php 570
ERROR - 2021-07-05 11:27:38 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:27:38 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:27:38 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:27:38 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:27:38 --> Severity: Notice --> Undefined property: stdClass::$img_url C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 706
ERROR - 2021-07-05 11:27:38 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\multi_hos_api\system\core\Exceptions.php:271) C:\xampp\htdocs\multi_hos_api\system\core\Common.php 570
ERROR - 2021-07-05 11:28:19 --> Severity: Notice --> Undefined variable: get_fees C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 705
ERROR - 2021-07-05 12:37:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\multi_hos_api\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2021-07-05 12:37:09 --> Unable to connect to the database
