<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['downloads/(:any)'] = 'auth/downloads/$1';
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['hospital/users/addnew'] = 'hospital/users/addnew';
$route['hospital/users/addnew/(:any)'] = 'error404';
$route['settings/language'] = 'settings/language';
$route['settings/language/(:any)'] = 'error404';
$route['hospital/package/addNewView'] = 'hospital/package/addNewView';
$route['hospital/package/addNewView/(:any)'] = 'error404';
$route['request/addnew'] = 'request/addnew';
$route['request/addnew/(:any)'] = 'error404';
$route['payments/addPaymentView'] = 'payments/addPaymentView';
$route['payments/addPaymentView/(:any)'] = 'error404';
$route['superadmin/addOnboard'] = 'superadmin/addOnboard';
$route['superadmin/addOnboard/(:any)'] = 'error404';
$route['superadmin/addTerms'] = 'superadmin/addTerms';
$route['superadmin/addTerms/(:any)'] = 'error404';
$route['superadmin/appUser'] = 'superadmin/appUser';
$route['superadmin/appUser/(:any)'] = 'error404';
$route['superadmin/add_specialist'] = 'superadmin/add_specialist';
$route['superadmin/add_specialist/(:any)'] = 'error404';
$route['superadmin/add_banner'] = 'superadmin/add_banner';
$route['superadmin/add_banner/(:any)'] = 'error404';
$route['profile'] = 'profile';
/* $route['profile/$1/$2(:any)'] = 'error404'; */
$route['department/addNew'] = 'department/addNew';
$route['department/addNew/(:any)'] = 'error404';
$route['department/add_specialist'] = 'department/add_specialist';
$route['department/add_specialist/(:any)'] = 'error404';
$route['department/add_new_scan_types'] = 'department/add_new_scan_types';
$route['department/add_new_scan_types/(:any)'] = 'error404';
$route['doctor/addNew'] = 'doctor/addNew';
$route['doctor/addNew/(:any)'] = 'error404';
$route['appointment/treatmentReport'] = 'appointment/treatmentReport';
$route['appointment/treatmentReport/(:any)'] = 'error404';
$route['patient/addNew'] = 'patient/addNew';
$route['patient/addNew/(:any)'] = 'error404';
$route['patient/addNewER'] = 'patient/addNewER';
$route['patient/addNewER/(:any)'] = 'error404';
$route['appointment/addNew'] = 'appointment/addNew';
$route['appointment/addNew/(:any)'] = 'error404';
$route['nurse/addNew'] = 'nurse/addNew';
$route['nurse/addNew/(:any)'] = 'error404';
$route['pharmacist/addNew'] = 'pharmacist/addNew';
$route['pharmacist/addNew/(:any)'] = 'error404';
$route['laboratorist/addNew'] = 'laboratorist/addNew';
$route['laboratorist/addNew/(:any)'] = 'error404';
$route['accountant/addNew'] = 'accountant/addNew';
$route['accountant/addNew/(:any)'] = 'error404';
$route['receptionist/addNew'] = 'receptionist/addNew';
$route['receptionist/addNew/(:any)'] = 'error404';
$route['prescription/addPrescriptionView'] = 'prescription/addPrescriptionView';
$route['prescription/addPrescriptionView/(:any)'] = 'error404';
$route['lab/addLabView'] = 'lab/addLabView';
$route['lab/addLabView/(:any)'] = 'error404';
$route['lab/addTemplateView'] = 'lab/addTemplateView';
$route['lab/addTemplateView/(:any)'] = 'error404';
$route['medicine/addNewMedicine'] = 'medicine/addNewMedicine';
$route['medicine/addNewMedicine/(:any)'] = 'error404';
$route['medicine/addNewCategory'] = 'medicine/addNewCategory';
$route['medicine/addNewCategory/(:any)'] = 'error404';
$route['finance/pharmacy/addPaymentView'] = 'finance/pharmacy/addPaymentView';
$route['finance/pharmacy/addPaymentView/(:any)'] = 'error404';
$route['finance/pharmacy/addExpense'] = 'finance/pharmacy/addExpense';
$route['finance/pharmacy/addExpense/(:any)'] = 'error404';
$route['finance/pharmacy/addExpenseCategoryView'] = 'finance/pharmacy/addExpenseCategoryView';
$route['finance/pharmacy/addExpenseCategoryView/(:any)'] = 'error404';
$route['donor/addDonorView'] = 'donor/addDonorView';
$route['donor/addDonorView/(:any)'] = 'error404';
$route['bed/addBedView'] = 'bed/addBedView';
$route['bed/addBedView/(:any)'] = 'error404';
$route['bed/addAllotmentView'] = 'bed/addAllotmentView';
$route['bed/addAllotmentView/(:any)'] = 'error404';
$route['report/addReport'] = 'report/addReport';
$route['report/addReport/(:any)'] = 'error404';
$route['notice/addNewView'] = 'notice/addNewView';
$route['notice/addNewView/(:any)'] = 'error404';
$route['hospital/users/addnew/(:any)'] = 'error404';
$route['image/upload_and_crop'] = 'ImageController/upload_and_crop_image';

