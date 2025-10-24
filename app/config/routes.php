<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

$router->get('/', 'Welcome::index');

// Payroll system routes
$router->group('/payroll', function() use ($router) {
	$router->get('/', 'Payroll::index');
	$router->get('/list', 'Payroll::list');
	$router->get('/view/{id}', 'Payroll::view');
	$router->post('/process', 'Payroll::process');
});

// Attendance routes
$router->group('/attendance', function() use ($router) {
	$router->get('/', 'Attendance::index');
	$router->post('/clock', 'Attendance::clock');
	$router->get('/history', 'Attendance::history');
});

// Employee management
$router->group('/employees', function() use ($router) {
	$router->get('/', 'Employee::index');
	$router->get('/view/{id}', 'Employee::view');
	$router->get('/create', 'Employee::create');
	$router->post('/store', 'Employee::store');
});

// HR dashboard
$router->get('/hr', 'Hr::dashboard');

// Admin area
$router->group('/admin', function() use ($router) {
	$router->get('/', 'Admin::dashboard');
	$router->get('/users', 'Admin::users');
	$router->get('/settings', 'Admin::settings');
});

// Employee area
$router->group('/employee', function() use ($router) {
	$router->get('/', 'Employee::dashboard');
	$router->get('/dashboard', 'Employee::dashboard');
	$router->get('/attendance', 'Employee::index');
	$router->post('/attendance/clock', 'Attendance::clock');
	$router->get('/attendance/history', 'Attendance::history');
	$router->get('/payslips', 'Payslip::index');
	$router->get('/payslips/latest', 'Payslip::latest');
});

// Authentication routes
$router->get('/login', 'Auth::show');
$router->post('/login', 'Auth::login');
$router->get('/logout', 'Auth::logout');
// Signup
$router->get('/signup', 'Auth::signup');
$router->post('/signup', 'Auth::register');