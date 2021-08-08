<?php

Route::get('sitemap.xml', 'SiteMapController@index');

Route::any('{path?}', 'TotalplayController@index')->where("path", ".+");
