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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['user/(:num)'] = 'user/view/$1';
$route['user'] = 'user/index';
$route['default_controller'] = 'user';

$route['default_controller'] = 'user/login'; // Default route points to the login page
$route['login'] = 'user/login';        // Route for login
$route['logout'] = 'user/logout';      // Route for logout
$route['user'] = 'user/index';              // Route for user management index
$route['user/create'] = 'user/create';      // Route for creating a new user
$route['user/edit/(:num)'] = 'user/edit/$1'; // Route for editing a user (requires ID)
$route['user/delete/(:num)'] = 'user/delete/$1'; // Route for deleting a user (requires ID)
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['employee'] = 'employee/index';
$route['employee/create'] = 'employee/create';
$route['employee/edit/(:num)'] = 'employee/edit/$1';
$route['employee/delete/(:num)'] = 'employee/delete/$1';

$route['allowance_deduction_master'] = 'AllowanceDeductionMaster/index';
$route['allowance_deduction_master/create'] = 'AllowanceDeductionMaster/create';
$route['allowance_deduction_master/store'] = 'AllowanceDeductionMaster/store';
$route['allowance_deduction_master/edit/(:num)'] = 'AllowanceDeductionMaster/edit/$1';
$route['allowance_deduction_master/update/(:num)'] = 'AllowanceDeductionMaster/update/$1';
$route['allowance_deduction_master/delete/(:num)'] = 'AllowanceDeductionMaster/delete/$1';
// $route['allowance_deduction_master/delete/(:num)'] = 'allowance_deduction_master/delete/$1';


$route['employee_allowance_deduction'] = 'EmployeeAllowanceDeduction/index';
$route['employee_allowance_deduction/add_allowance/(:num)'] = 'EmployeeAllowanceDeduction/add_allowance/$1';
$route['employee_allowance_deduction/add_deduction/(:num)'] = 'EmployeeAllowanceDeduction/add_deduction/$1';
$route['employee_allowance_deduction/save_allowance'] = 'EmployeeAllowanceDeduction/save_allowance';
$route['employee_allowance_deduction/save_deduction'] = 'EmployeeAllowanceDeduction/save_deduction';
$route['employee_allowance_deduction/edit/(:any)'] = 'EmployeeAllowanceDeduction/edit/$1';
$route['employee_allowance_deduction/update/(:any)'] = 'EmployeeAllowanceDeduction/update/$1';
$route['employee_allowance_deduction/delete/(:any)'] = 'EmployeeAllowanceDeduction/delete/$1';

$route['paysheet'] = 'Paysheet/index'; // View all employee paysheets
$route['paysheet/generate'] = 'Paysheet/generate'; // Generate paysheet
$route['payslip/(:num)'] = 'Paysheet/payslip/$1'; // View pay slip for an employee


$route['payroll_processing'] = 'PayrollProcessing/payrollProcessing';
$route['payroll_processing/create'] = 'PayrollProcessing/create';
$route['payroll_processing/save'] = 'PayrollProcessingController/save';
$route['payroll_processing/process/(:num)'] = 'PayrollProcessing/process/$1';

// $route['test'] = 'test';


