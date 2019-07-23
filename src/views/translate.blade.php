<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Translate Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        textarea#input {
            width: 100%;
            height: 200px;
            border: 0.5px solid;
            border-radius: 0px 15px 15px 0px;
        }
    </style>
</head>
<body>

<div class="row">
    <div class="col-md-6">
        <textarea id="input"></textarea>
        <select class="form-control" id="select-language">
            <option>Select Language</option>
            @foreach($languages as $language)
                <option value="{{$language->code}}">{{$language->language}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <p id="output"></p>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

<script>
    var csrf_token = '{{csrf_token()}}';
</script>

<script>
    $(document).ready(function () {
        $('#select-language').on('change',function () {
            var code = $(this).val();
            var input = $('#input').val();

            $.post('{{route('translate.string')}}',
                {
                    code:code,
                    input:input,
                    _token: csrf_token
                },function(result){
                    var result = JSON.parse(result);
                    $('#output').html('<h4>Translated from <strong>'+result['source_language_code']+'</strong> to <strong>'+code+'</strong></h4><br>'+result['translated']);
                });
        });
    });
</script>

</body>
</html>
