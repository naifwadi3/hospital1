<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/2', function () {

return view('layout.dashboard');

});
Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get( '/login', 'HomeController@login' )->name( 'login' );

        Route::group(['middleware' => ['auth']], function() {
            Route::resource('roles','RoleController');
            Route::resource('users','UserController');

        Route::group(['namespace'=>'fee'],function(){
        Route::resource('fee','fees');
        Route::resource('receipt','reciptController');
        Route::get('invoices','newfee@create');
        Route::post('invoices/store','newfee@store')->name('st_invoice');
        Route::get('invoices/show/{id}','newfee@show')->name('sh_invoice');
        Route::get('invoices/print/{id}','newfee@print')->name('pr_invoice');
        Route::get('invoices/pdf/{id}','newfee@pdf')->name('pd_invoice');
        // Route::get('/get_fee/{id}', 'studantso@Get_fees');

        });


        Route::get('/1', function () {
        return view('pages.hospital_seaction');
        });
        Route::group(['namespace'=>'section'],function(){
        Route::resource('section','section');
        Route::post('section/update','section@update')->name('up');

        });
        Route::group(['namespace'=>'room'],function(){
        Route::resource('room','rooms');
        Route::resource('room_reservations','room_reservations');


        });
        Route::group(['namespace'=>'Specialties'],function(){
        Route::resource('Specialties','Specialties');

        });
        Route::group(['namespace'=>'nurs'],function(){
        Route::resource('nurs','nurs');

        });

        Route::group(['namespace'=>'Receptions'],function(){
        Route::resource('Reception','Reception');
        });

        Route::group(['namespace'=>'Patient'],function(){
        Route::resource('Patient','Patient');
        });

        Route::group(['namespace'=>'doctor'],function(){
        Route::resource('date','date');
        Route::resource('doctor','doctor');
        Route::resource('book_an_appointment','book_an_appointment');
        Route::post('update','doctor@update')->name('naif.update');
        });
        Route::group(['namespace'=>'pharmacy'],function(){
        Route::resource('pharmacy','pharmacys');
        Route::resource('patients_medicines','patients_medicines');
        });

        Route::group(['namespace'=>'rays'],function(){
        Route::resource('rays','ray');
        });

        Route::group(['namespace'=>'store'],function(){
            Route::resource('stores','storecontroller');
            });

        Route::view('add_operating','livewire.operating.show_form');

        Route::get('send_masseg', function () {
        return view('pages.doctors.Appointment_reminder');
        });


        Route::post('sms','sendsms@sms')->name('sms');
        Route::post('/sendmail', 'MailController@index')->name('sendmail');

        Route::get('mass','chat@index')->name('chat');


        Route::group(['namespace'=>'dashboard'],function(){
            Route::get('Doctor_Work','doctor_day_table@index')->name('day_work');
            Route::post('Doctor_Work','doctor_day_table@store')->name('day_work_store');

        });
        Route::get('Dashboard','DashboardController@index')->name('dashboard');


    });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
