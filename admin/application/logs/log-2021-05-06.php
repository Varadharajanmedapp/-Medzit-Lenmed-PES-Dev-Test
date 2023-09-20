<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-05-06 05:35:58 --> Severity: error --> Exception: Call to undefined method User::auth() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 13
ERROR - 2021-05-06 05:39:23 --> Severity: error --> Exception: Call to undefined method User::auth() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 12
ERROR - 2021-05-06 05:39:58 --> Severity: error --> Exception: Call to undefined method User::auth() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 12
ERROR - 2021-05-06 05:41:05 --> Severity: error --> Exception: Call to undefined method User::auth() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 12
ERROR - 2021-05-06 05:41:30 --> {
    "username": "rajesh",
    "password": "1",
    "app_platform": "android",
    "app_version": "1.0"
}
ERROR - 2021-05-06 05:41:47 --> {
    "username": "rajesh",
    "password": "1",
    "app_platform": "android",
    "app_version": "1.0"
}
ERROR - 2021-05-06 05:41:47 --> {"status":"true","data":{"version":"1.0","force":"0","service_status":"true","maintenance_image_url":"https:\/\/globytex.com\/multi_hos\/assets\/img\/terms_conditions.png","app_logo":"https:\/\/globytex.com\/multi_hos\/assets\/img\/terms_conditions.png","staging_webservice_url":" TESTING_WEBSERVICE_URL","live_webservice_url":"PRODUCTION_WEBSERVICE_URL","dev_webservice_url":"DEVELOPMENT_WEBSERVICE_URL","base_url":"https:\/\/localhost\/multi_hos_api\/","app_store_url":"PRODUCTION_WEBSITE_URL"},"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJ1c2VybmFtZSI6InJhamVzaCIsImlhdCI6MTYyMDI3OTcwNywiZXhwIjoxNjIwMjk3NzA3fQ.P2HxMbgwYGnat2yC4nZA7mlymH_lO_OQf2zDV7b1kbc"}
ERROR - 2021-05-06 05:41:49 --> Severity: error --> Exception: Call to undefined method User::auth() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 12
ERROR - 2021-05-06 08:45:55 --> Severity: Notice --> Undefined property: User::$form_validation C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 22
ERROR - 2021-05-06 08:45:55 --> Severity: error --> Exception: Call to a member function set_data() on null C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 22
ERROR - 2021-05-06 08:47:26 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `mobile`
FROM `patient`
WHERE `mobile` = '9585844855'
 LIMIT 1
ERROR - 2021-05-06 08:53:16 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `mobile`
FROM `patient`
WHERE `mobile` = '9585844855'
 LIMIT 1
ERROR - 2021-05-06 08:54:46 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `mobile`
FROM `patient`
WHERE `mobile` = '9585844855'
 LIMIT 1
ERROR - 2021-05-06 09:02:32 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `mobile`
FROM `patient`
WHERE `mobile` = '9585844855'
 LIMIT 1
ERROR - 2021-05-06 09:02:43 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `mobile`
FROM `patient`
WHERE `mobile` = '9585844855'
 LIMIT 1
ERROR - 2021-05-06 09:03:02 --> Query error: Unknown column 'mobile' in 'field list' - Invalid query: SELECT `mobile`
FROM `patient`
WHERE `mobile` = '9585844855'
 LIMIT 1
ERROR - 2021-05-06 09:03:37 --> Query error: Unknown column 'user_id' in 'field list' - Invalid query: UPDATE `app_user` SET `mobile` = '9585844855', `password` = '94055eeb1aee5d50b1b29caa5d189b66ec12ce2f1044bf7653203ba8d3e25fe2e3070e73e6f3c95959015ade065d9714255e6a9e68a1bf8405e891fb8f7362f5', `user_name` = 'rajesh', `email` = 'raje@gmail.com', `user_id` = 1001
WHERE `id` = 1
ERROR - 2021-05-06 09:10:01 --> Severity: error --> Exception: syntax error, unexpected '=', expecting function (T_FUNCTION) or const (T_CONST) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 3
ERROR - 2021-05-06 11:01:21 --> {
    "username": "rajesh",
    "password": "1",
    "app_platform": "android",
    "app_version": "1.0"
}
ERROR - 2021-05-06 11:01:21 --> {"status":"true","data":{"version":"1.0","force":"0","service_status":"true","maintenance_image_url":"https:\/\/globytex.com\/multi_hos\/assets\/img\/terms_conditions.png","app_logo":"https:\/\/globytex.com\/multi_hos\/assets\/img\/terms_conditions.png","staging_webservice_url":" TESTING_WEBSERVICE_URL","live_webservice_url":"PRODUCTION_WEBSERVICE_URL","dev_webservice_url":"DEVELOPMENT_WEBSERVICE_URL","base_url":"https:\/\/localhost\/multi_hos_api\/","app_store_url":"PRODUCTION_WEBSITE_URL"},"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJ1c2VybmFtZSI6InJhamVzaCIsImlhdCI6MTYyMDI5ODg4MSwiZXhwIjoxNjIwMzE2ODgxfQ.e_gwetcZgLEM0TB3XsoMUlQMA89XonKYNfjChrSZOGc"}
ERROR - 2021-05-06 11:01:37 --> Severity: error --> Exception: Call to undefined method User_model::login() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 169
ERROR - 2021-05-06 11:02:14 --> Query error: Table 'multi_hos.user_info' doesn't exist - Invalid query: SELECT *
FROM `user_info`
WHERE `email` = ''
AND `password` = '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a'
AND `roll` = 'doctor'
 LIMIT 1
ERROR - 2021-05-06 11:02:41 --> Query error: Unknown column 'roll' in 'where clause' - Invalid query: SELECT *
FROM `app_user`
WHERE `email` = ''
AND `password` = '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a'
AND `roll` = 'doctor'
 LIMIT 1
ERROR - 2021-05-06 11:05:45 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN), expecting function (T_FUNCTION) or const (T_CONST) C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 65
ERROR - 2021-05-06 11:11:52 --> Severity: Notice --> Undefined variable: updateinfo C:\xampp\htdocs\multi_hos_api\application\modules\v1\models\User_model.php 60
ERROR - 2021-05-06 11:13:22 --> {
    "username": "rajesh",
    "password": "1",
    "app_platform": "android",
    "app_version": "1.0"
}
ERROR - 2021-05-06 11:13:22 --> {"status":"true","data":{"version":"1.0","force":"0","service_status":"true","maintenance_image_url":"https:\/\/globytex.com\/multi_hos\/assets\/img\/terms_conditions.png","app_logo":"https:\/\/globytex.com\/multi_hos\/assets\/img\/terms_conditions.png","staging_webservice_url":" TESTING_WEBSERVICE_URL","live_webservice_url":"PRODUCTION_WEBSERVICE_URL","dev_webservice_url":"DEVELOPMENT_WEBSERVICE_URL","base_url":"https:\/\/localhost\/multi_hos_api\/","app_store_url":"PRODUCTION_WEBSITE_URL"},"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJ1c2VybmFtZSI6InJhamVzaCIsImlhdCI6MTYyMDI5OTYwMiwiZXhwIjoxNjIwMzE3NjAyfQ.Zfn0hoJ0hEis8o6poMA80ClS9NkiEMEa38dfsrkVqa4"}
ERROR - 2021-05-06 12:12:43 --> Severity: error --> Exception: Call to undefined method User_model::on_board() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 186
ERROR - 2021-05-06 12:12:45 --> Severity: error --> Exception: Call to undefined method User_model::on_board() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 186
ERROR - 2021-05-06 12:42:26 --> Severity: error --> Exception: Call to undefined method User_model::on_board() C:\xampp\htdocs\multi_hos_api\application\modules\v1\controllers\User.php 185
ERROR - 2021-05-06 13:00:29 --> Query error: Table 'multi_hos.terms_condition' doesn't exist - Invalid query: SELECT *
FROM `terms_condition`
WHERE `status` = 'active'
