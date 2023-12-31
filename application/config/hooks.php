<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|      https://codeigniter.com/user_guide/general/hooks.html
|
*/
if(isset($_SERVER['HTTP_X_AUTH']) ||  strpos($_SERVER['QUERY_STRING'], '/v1/') !== false){
       // mobile 
       $hook['post_controller_constructor'] = array(
           'class'    => 'Auth',
           'function' => 'validate_token',
           'filename' => 'Auth.php',
           'filepath' => 'hooks',
           'params'   => $_SERVER['HTTP_X_AUTH']
       );
}else{
       // web
       $hook['pre_controller'] = array(
        'function' => 'required',
        'filename' => 'required.php',
        'filepath' => 'hooks',
       );
}