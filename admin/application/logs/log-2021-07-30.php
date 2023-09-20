<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-30 10:46:10 --> Query error: Unknown column 'is_online' in 'field list' - Invalid query: SELECT `id` as `hospital_id`, `name` as `hospital_name`, `address`, `phone`, `location`, `img_url`, `gallery`, `video_url`, `is_online`
FROM `hospital`
WHERE `id` IS NULL
ERROR - 2021-07-30 10:50:48 --> Severity: Notice --> Undefined index: distance C:\xampp\htdocs\multi_hos_api\application\helpers\site_helper.php 49
ERROR - 2021-07-30 10:50:48 --> Severity: Notice --> Undefined index: duration C:\xampp\htdocs\multi_hos_api\application\helpers\site_helper.php 50
ERROR - 2021-07-30 10:50:48 --> Severity: Notice --> Undefined index: distance C:\xampp\htdocs\multi_hos_api\application\helpers\site_helper.php 49
ERROR - 2021-07-30 10:50:48 --> Severity: Notice --> Undefined index: duration C:\xampp\htdocs\multi_hos_api\application\helpers\site_helper.php 50
ERROR - 2021-07-30 10:50:48 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\multi_hos_api\system\core\Exceptions.php:271) C:\xampp\htdocs\multi_hos_api\system\core\Common.php 570
ERROR - 2021-07-30 11:23:35 --> Query error: Unknown column 'doctor_id' in 'field list' - Invalid query: INSERT INTO `covid_vaccine` (`user_id`, `doctor_id`, `hospital_id`) VALUES ('1', '3', '10')
ERROR - 2021-07-30 11:42:01 --> Query error: Table 'multi_hos.wishlist' doesn't exist - Invalid query: INSERT INTO `wishlist` (`user_id`, `doctor_id`, `hospital_id`) VALUES ('1', '3', '10')
ERROR - 2021-07-30 11:59:59 --> Query error: Unknown column 'doctor_id' in 'field list' - Invalid query: INSERT INTO `wishlist` (`user_id`, `doctor_id`, `hospital_id`) VALUES ('1', '3', '10')
ERROR - 2021-07-30 12:47:51 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 2340
ERROR - 2021-07-30 12:49:16 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 2340
ERROR - 2021-07-30 12:50:26 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 2424
ERROR - 2021-07-30 13:17:11 --> Severity: error --> Exception: Too few arguments to function User::wishlist_user_get(), 0 passed in C:\xampp\htdocs\multi_hos_api\application\libraries\REST_Controller.php on line 793 and exactly 1 expected C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 2453
ERROR - 2021-07-30 13:18:10 --> Severity: Compile Error --> Cannot redeclare User_model::get_covid_user() C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 684
