<?php

namespace Decodewebin\YandexTranslate\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Decodewebin\YandexTranslate\Yandex;
use GuzzleHttp\Client;

class YandexTranslateController extends Controller
{
    public function viewTranslatePage()
    {
       //fetch languages
        $languages = LanguageTranslate::getLanguages();

        return view('translator::translate', compact('languages'));
    }

    /**
     * Detect original language code and then translate into user provide code.
     *
     * @param Request $request
     * @return string
     */
    public function translateString(Request $request)
    {
        $message = $request->input;
        $to_translate_code = $request->code;


        $encoded_message = str_replace(' ', '+', $message);

        $http = new Client();

        try {
            $response = $http->get(config('yandex_config.yandex_translate_endpoint') . "/detect?key=" . config('yandex_config.yandex_translate_api_key') . "&text=" . $encoded_message);

            $from_translate_code = json_decode($response->getBody())->lang;


            $converted_message = Yandex::translate($message,$from_translate_code, $to_translate_code);

            return json_encode($converted_message);

        } catch (\Exception $e) {
            return json_encode($e);
        }
    }
}
