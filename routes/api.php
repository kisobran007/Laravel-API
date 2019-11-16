<?php

Use App\Website;

Route::post('all-websites', 'WebsiteController@allwebsites');
Route::post('get-website/{id}', 'WebsiteController@getwebsite');
Route::post('add-website', 'WebsiteController@addwebsite');
Route::post('update-website/{id}', 'WebsiteController@updatewebsite');
Route::post('delete-website/{id}', 'WebsiteController@deletewebsite');
Route::post('get-website-by-domain-id', 'WebsiteController@getWebsiteByDomainId');
Route::post('get-website-builder-users', 'WebsiteController@getWebsiteBuilderUsers');
Route::post('get-user-by-username-and-password', 'WebsiteController@getUserByUsernameAndPassword');
