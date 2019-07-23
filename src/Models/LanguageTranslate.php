<?php

namespace Decodewebin\YandexTranslate\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageTranslate extends Model
{
    protected $table = "languages";

    public static function getLanguages()
    {
        return self::get();
    }
}
