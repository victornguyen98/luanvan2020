<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@getLogin');
Route::post('/', 'UserController@postLogin');
//Route::get('dangnhap')

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('dashboard', 'm_Dashboard@index')->name('dashboard');

Route::get('network', 'm_Network@index')->name('network');
Route::post('network-csv','m_Network@export_csv');

Route::get('alarms', 'm_Alarms@index')->name('alarms');

Route::get('events', 'm_Events@index')->name('events');

Route::get('devices', 'm_Devices@index')->name('devices');
Route::get('config', 'm_Devices@config');
Route::get('config_2', 'm_Devices@config_2');
Route::get('config_3', 'm_Devices@config_3');
Route::get('config_4', 'm_Devices@config_4');
Route::Get('config_real', 'm_Devices@config_real');
Route::get('config_ne', 'm_Devices@config_ne')->name('config_ne');

Route::get('certificates', 'm_Certificates@index')->name('certificates');

Route::get('network_design', 'm_NetworkDesign@index')->name('network_design');

Route::get('templates', 'm_Templates@index')->name('templates');

Route::get('policices', 'm_Policices@index')->name('policices');

Route::get('ssh_terminal', 'm_SshTerminal@index')->name('ssh_terminal');

Route::get('software_repository', 'm_SoftwareRepository@index')->name('software_repository');

Route::get('software_upgrade', 'm_SoftwareUpgrade@index')->name('software_upgrade');

Route::get('device_reboot', 'm_DeviceReboot@index')->name('device_reboot');

Route::get('vsmart_detail', 'm_Dashboard@vsmart_detail');
Route::get('wan_edge_detail', 'm_Dashboard@wan_edge_detail');
Route::get('vbound_detail', 'm_Dashboard@vbound_detail');
Route::get('reboot_detail', 'm_Dashboard@reboot_detail');
Route::get('control_up', 'm_Dashboard@control_up');
Route::get('normal', 'm_Dashboard@normal');

Route::get('we_total', 'm_Dashboard@we_total');
Route::get('we_author', 'm_Dashboard@we_author');
Route::get('we_deloy', 'm_Dashboard@we_deloy');

Route::get('device_report', 'm_DeviceReboot@device_reboot');

//Send Mail
Route::get('send-mail','MailController@send_mail')->name('send_mail');

//Header
Route::get('reboot_active', 'm_DeviceReboot@reboot_active');
Route::get('alarm', 'm_DeviceReboot@alarm');
