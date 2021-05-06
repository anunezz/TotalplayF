<?php

Route::get('sitemap.xml', 'SiteMapController@index');

Route::any('{path?}', function() {
    return view("app");
})->where("path", ".+");
