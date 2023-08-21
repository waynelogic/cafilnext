<!doctype html>
<html lang="ru" class="scroll-smooth scroll-pt-52">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обращение с сайта</title>
    <meta name="description" content="Обратная связь">
    <meta name="author" content="ФиЛнекст">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
        }
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-width: 600px;
            margin: 0 auto;
        }
        table {
            width: 100%;
        }
        table caption {
            font-weight: bold;
            font-size: 1.2rem;
        }
        table thead th {
            text-align: left;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 0.5rem;
            border-bottom: 1px solid #ddd;
            background-color: #eee;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-family: sans-serif;
        }
        table tbody td {
            padding: 0.5rem;
            border-bottom: 1px solid #ddd;
            background-color: #eee;
            color: #333;
            font-family: sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-size: 1rem;
            text-align: left;
            vertical-align: top;
            word-break: break-word;

        }
    </style>
</head>
<body>
    <main>
        <h2>Обращение с сайта</h2>
        @if($lead->form_data)
            <table>
                <caption>Данные формы</caption>
                <thead>
                    <tr>
                        <th>Поле</th>
                        <th>Значение</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lead->form_data as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>IP</td>
                        <td>{{ $lead->ip }}</td>
                    </tr>
                    @if(isset($lead->city))
                        <tr>
                            <td>IP</td>
                            <td>{{ $lead->city }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif
    </main>
</body>
</html>
