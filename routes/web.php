<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'middleware' => ['web', 'auth']
], function () {
    Route::get('/', 'ContactController@index')->name('index');
    Route::get('contact/create', 'ContactController@create')->name('create');
    Route::post('contact/store', 'ContactController@store')->name('store');
    Route::get('contact/edit/{contact}', 'ContactController@edit')->name('edit');
    Route::put('contact/update/{contact}', 'ContactController@update')->name('update');

    Route::get('address/list/{contact}', 'AddressController@index')->name('address.index');
    Route::get('address/create/{contact}', 'AddressController@create')->name('address.create');
    Route::post('address/store/{contact}', 'AddressController@store')->name('address.store');
    Route::get('address/edit/{address}', 'AddressController@edit')->name('address.edit');
    Route::put('address/update/{address}', 'AddressController@update')->name('address.update');
});

Route::get('checkmail/{email}', 'Api@checkmail')->name('checkmail');
