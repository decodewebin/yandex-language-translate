<?php

namespace Decodewebin\YandexTranslate;

class Yandex
{
    /**
     * @param String $message
     * @param $from_language_code ISO-a2 code of language
     * @param $to_language_code ISO-a2 code of language
     * @return \stdClass
     */
    public static function translate($message, $from_language_code, $to_language_code)
    {
        $translated = new \stdClass();

        $encoded_message = str_replace(' ', '+', $message);


        /**
         * Using Yandex translate API here.
         */
        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->get(config('yandex_config.yandex_translate_endpoint') . "/translate?key=" . config('yandex_config.yandex_translate_api_key') . "&text=" . $encoded_message . "&lang=" . $from_language_code . "-" . $to_language_code);

            $translated->translated = json_decode($response->getBody())->text[0];
            $translated->source_language_code = $from_language_code;

        } catch (\Exception $e) {
            $translated->translated = $message;
            $translated->source_language_code = 'en';
        }

        return $translated;
    }

}
