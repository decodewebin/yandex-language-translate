<?php

Route::get('translate', 'Decodewebin\YandexTranslate\YandexTranslateController@viewTranslatePage');
Route::post('translate-string', 'Decodewebin\YandexTranslate\YandexTranslateController@translateString')->name('translate.string');
