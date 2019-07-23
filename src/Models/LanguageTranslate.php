<?php

namespace Decodewebin\YandexTranslate;

use Illuminate\Database\Eloquent\Model;

class LanguageTranslate extends Model
{
    protected $table = "languages";

    public static function getLanguages()
    {
        return self::get();
    }
}
