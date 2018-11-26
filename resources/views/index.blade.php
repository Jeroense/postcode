<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Postcode</title>
</head>
<body>
    <div class="container m-t-30">
        <div>
            {{-- <a href="{{ route('seed') }}" type="button" class="btn">Seed</a> --}}
        </div>
        <div>
            <button type="button" url="{{ route('getpostcode') }}"  id='getCodes' class="btn btn-primary">get province codes</button>
        </div>
        <div class="m-t-30">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Postcode</th>
                        <th scope="col">Provincie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="pc"></td>
                        <td id="pr"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/getcode.js')}}"></script>
</body>
</html>

