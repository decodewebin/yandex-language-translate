<?php

Route::group(['namespace'=>'Decodewebin\YandexTranslate\Http\Controllers'], function (){
    Route::get('translate', 'YandexTranslateController@viewTranslatePage');
    Route::post('translate-string', 'YandexTranslateController@translateString')->name('translate.string');
});
