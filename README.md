# yandex-language-translate

Package to translate message into different languages.

## SETUP

Install via composer

`composer require decodewebin/yandex-language-translate`

Get Yandex language translate FREE api key from here:


https://tech.yandex.com/translate/

Add variables in ENV file

`YANDEX_TRANSLATE_ENDPOINT=https://translate.yandex.net/api/v1.5/tr.json`

and

`YANDEX_TRANSLATE_API_KEY=YOUR_API_KEY_HERE`

----------------------------------------------


Run Command

`php artisan vendor:publish --tag=yandex_config`

----------------------------------------------

Run Database Migration Command

`php artisan migrate` and 

Run Language Seeder Command

`php artisan db:seed --class="Decodewebin\YandexTranslate\Database\Seeds\LanguageSeeder"`

## Testing on the fly

Open `localhost:8000/translate`

## Testing in your application
You can use translation endpoint in your application too.

Go to web.php and add the following code

`Route::get('/test-translate',function (){
    dd(\Decodewebin\YandexTranslate\Static_Functions\Yandex::translate('Hello World','en','pt'));
});`

or in your controller, add USE the package functions like it

`use Decodewebin\YandexTranslate\Static_Functions\Yandex;
`
`class YourController extends Controller
`
`{`

`    public function your_function()
`    
    `{`
    
`        dd(Yandex::translate("Hello World","en","ru");)
`        
    `}`
    
`}`


### Format

`Yandex::translate(STRING_TO_TRANSLATE ORIGINAL_LANGUAGE_CODE, LANGUAGE_CODE_TO_TRANSLATE_INTO)`

This function returns a json object as follows

`{`

`  "translated": "Olá Mundo",
`  
`  "source_language_code": "en"
`  

`}`


If you liked this package then do follow me on 

- [My personal blog](https://decodeweb.in)
- [Medium](https://medium.com/@decodeweb)
- [Instagram](https://www.instagram.com/decodeweb_in/)
- [Slideshare](https://www.slideshare.net/dineshsuthar92)
- [FreeCodeCamp](https://www.freecodecamp.org/forum/u/decodeweb/summary)
