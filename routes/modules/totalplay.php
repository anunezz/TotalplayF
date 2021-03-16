<?php use Illuminate\Support\Facades\Route;

    Route::post('setContact', 'TotalplayController@setContact');
    Route::post('setPacks', 'TotalplayController@setPacks');
    Route::get('getCats', 'TotalplayController@getCats');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('getUsers', 'TotalplayController@getUsers');
        Route::get('getCatsUser', 'TotalplayController@getCatsUser');
        Route::post('createUser', 'TotalplayController@createUser');
        Route::post('updateUser', 'TotalplayController@updateUser');
        Route::post('activeUser', 'TotalplayController@activeUser');
        Route::post('updatePassword', 'TotalplayController@updatePassword');
        Route::get('getContacts', 'TotalplayController@getContacts');
        Route::post('exportContacts', 'TotalplayController@exportContacts');
        Route::post('getCatsPacks', 'TotalplayController@getCatsPacks');
        Route::get('getCatsPacksForm', 'TotalplayController@getCatsPacksForm');
        Route::post('filePromotion', 'TotalplayController@filePromotion');
        Route::post('filePromotionModal', 'TotalplayController@filePromotionModal');
        Route::post('createPromotion', 'TotalplayController@createPromotion');
        Route::post('updatePromotion', 'TotalplayController@updatePromotion');
        Route::post('activePack', 'TotalplayController@activePack');
        Route::get('getCatsPromotion', 'TotalplayController@getCatsPromotion');
        Route::post('createCodePromotion', 'TotalplayController@createCodePromotion');
        Route::post('getCodePromotion', 'TotalplayController@getCodePromotion');
        Route::post('activePromotion', 'TotalplayController@activePromotion');
        Route::post('fileWallpaper', 'TotalplayController@fileWallpaper');
        Route::post('saveWallpaper', 'TotalplayController@saveWallpaper');
        Route::get('getWallpaper', 'TotalplayController@getWallpaper');
        Route::get('getBanner', 'TotalplayController@getBanner');
        Route::post('ImgWrallpapersNetflix', 'TotalplayController@ImgWrallpapersNetflix');
        Route::post('ImgWrallpapersAmazon', 'TotalplayController@ImgWrallpapersAmazon');
        Route::post('ImgWrallpapersMain', 'TotalplayController@ImgWrallpapersMain');
        Route::post('ImgSlider', 'TotalplayController@ImgSlider');
    });
