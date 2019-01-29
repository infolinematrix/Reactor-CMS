<?php

// Mailing preview //
Route::get('mailings/{mailing}', [
    'as' => 'reactor.mailings.preview',
    'uses' => 'MailingsController@preview',
    'middleware' => ['set-theme:' . config('themes.active_mailings')]]);

// Installation complete
Route::get('install/complete', [
    'as' => 'install-complete',
    'uses' => 'InstallerController@getComplete',
    'middleware' => ['set-theme:' . config('themes.active_install')]]);

// Change locale
Route::get('locale/{locale}', [
    'as' => 'locale.set',
<<<<<<< HEAD
    'uses' => 'ReactorCMS\Http\Controllers\LocaleController@setLocale']);

Route::get('locale/{locale}/home', [
    'as' => 'locale.set.home',
    'uses' => 'ReactorCMS\Http\Controllers\LocaleController@setLocaleAndRedirectHome']);
=======
    'uses' => 'LocaleController@setLocale']);

Route::get('locale/{locale}/home', [
    'as' => 'locale.set.home',
    'uses' => 'LocaleController@setLocaleAndRedirectHome']);
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
