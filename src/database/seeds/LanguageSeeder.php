<?php

namespace Decodewebin\YandexTranslate\Database\Seeds;

use Illuminate\Database\Seeder;
use Decodewebin\YandexTranslate\Models\LanguageTranslate;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = array(
            array('id' => '1','language' => 'English','code' => 'en','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','language' => 'Russian','code' => 'ru','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','language' => 'Portuguese','code' => 'pt','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','language' => 'French','code' => 'fr','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','language' => 'Spanish','code' => 'es','created_at' => NULL,'updated_at' => NULL)
        );

        foreach ($languages as $key => $value) {
            LanguageTranslate::create($value);
        }
    }
}
